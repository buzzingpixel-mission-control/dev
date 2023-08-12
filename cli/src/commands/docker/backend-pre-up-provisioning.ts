import { Command } from '@oclif/core';
import { execSync } from 'node:child_process';
import * as fs from 'fs-extra';
import chalk from 'chalk';

export default class BackendPreUpProvisioning extends Command {
    public static summary = 'Runs pre-up provisioning for the backend';

    public async run (): Promise<void> {
        const rootDir = fs.realpathSync(`${this.config.root}/../`);
        const parentDir = fs.realpathSync(`${rootDir}/../`);

        this.log(chalk.cyan('Running backend provisioning…'));

        execSync(
            `
                docker run -it --rm \
                    --entrypoint "" \
                    --name api-provision \
                    -v ${rootDir}/backend:/var/www \
                    -v ${parentDir}/backend-core:/backend-core \
                    -v ${parentDir}/idp:/idp \
                    -v ${parentDir}/url-monitoring:/url-monitoring \
                    -v ${parentDir}/pings:/pings \
                    -v ${parentDir}/servers:/servers \
                    -w /var/www \
                    ghcr.io/buzzingpixel-mission-control/mission-control-backend bash -c "composer install";
            `,
            { stdio: 'inherit' },
        );

        this.log(chalk.green('Backend provisioning finished.'));
    }
}
