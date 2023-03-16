import { Command } from '@oclif/core';
import { execSync } from 'node:child_process';
import chalk from 'chalk';
import * as fs from 'fs-extra';

export default class EnsureDevFiles extends Command {
    public static summary = 'Ensure local environment files exist';

    public static description = `This Docker environment is set up to let you override '.env' settings (which travel with the repo) in ${chalk.cyan('.env.local')} files. However, because it's set up that way, ${chalk.cyan('.env.local')} files must exist for each container or 'docker compose' will throw an error and the environment will not come online. This script ensures that all '.env.local' files exist. It is automatically run as part of ${chalk.cyan('docker up')} so you normally shouldn't need to worry about this command.`;

    public async run (): Promise<void> {
        const rootDir = fs.realpathSync(`${this.config.root}/../`);

        execSync(
            `
                cd ${rootDir};
                touch docker/backend/.bash_history;
                touch docker/backend/.env.local;
            `,
            { stdio: 'inherit' },
        );
    }
}
