import { Command } from '@oclif/core';
import { execSync } from 'node:child_process';
import * as fs from 'fs-extra';

export default class RemoveLinkedNodeModules extends Command {
    // eslint-disable-next-line class-methods-use-this
    public async run (): Promise<void> {
        const rootDir = fs.realpathSync(`${this.config.root}/../`);

        execSync(`
            cd ${rootDir}/frontend;
            rm -rf node_modules/buzzingpixel-mission-control-frontend-core/node_modules;
            rm -rf node_modules/buzzingpixel-mission-control-pings/node_modules;
            rm -rf node_modules/buzzingpixel-mission-control-url-monitoring/node_modules;
        `, { stdio: 'inherit' });
    }
}
