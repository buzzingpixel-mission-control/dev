import { Command } from '@oclif/core';
import { execSync } from 'node:child_process';
import * as fs from 'fs-extra';
import chalk from 'chalk';
import EnsureDevFiles from './ensure-dev-files';
import Build from './build';
import BackendPreUpProvisioning from './backend-pre-up-provisioning';
import GenerateSshKey from '../dev/generate-ssh-key';

export default class Up extends Command {
    public static summary = 'Brings Docker environment online and runs provisioning as necessary';

    public async run (): Promise<void> {
        const rootDir = fs.realpathSync(`${this.config.root}/../`);
        const dockerDir = `${rootDir}/docker`;
        const ephemeralStorageDir = `${dockerDir}/_ephemeral-storage`;
        const hasBuiltFile = `${ephemeralStorageDir}/has_built`;

        const EnsureDevFilesC = new EnsureDevFiles(this.argv, this.config);
        await EnsureDevFilesC.run();

        const GenerateSshKeyC = new GenerateSshKey(this.argv, this.config);
        await GenerateSshKeyC.run();

        const hasBuilt = fs.existsSync(hasBuiltFile);

        if (!hasBuilt) {
            this.log(chalk.cyan('Building Docker images…'));

            const BuildC = new Build(this.argv, this.config);
            await BuildC.run();

            this.log(chalk.green('Docker images were built.'));

            fs.writeFileSync(hasBuiltFile, '');
        }

        execSync(
            '(docker network create traefik-dev_default >/dev/null 2>&1) || true;',
            { stdio: 'inherit' },
        );

        const BackendPreUpProvisioningC = new BackendPreUpProvisioning(
            this.argv,
            this.config,
        );
        await BackendPreUpProvisioningC.run();

        execSync(
            `
                cd ${dockerDir};
                docker compose -f docker-compose.yml -f docker-compose.dev.yml -p mission-control-dev up -d;
            `,
            { stdio: 'inherit' },
        );

        this.log(chalk.green('Docker environment is online.'));
    }
}
