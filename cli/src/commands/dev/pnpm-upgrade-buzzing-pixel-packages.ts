import { Command } from '@oclif/core';
import { execSync } from 'node:child_process';
import * as fs from 'fs-extra';
import RemoveLinkedNodeModules from './remove-linked-node-modules';

export default class PnpmUpgradeBuzzingPixelPackages extends Command {
    // eslint-disable-next-line class-methods-use-this
    public async run (): Promise<void> {
        const rootDir = fs.realpathSync(`${this.config.root}/../`);

        execSync(`
            cd ${rootDir}/frontend;
            pnpm upgrade \
                buzzingpixel-mission-control-frontend-core \
                buzzingpixel-mission-control-pings \
                buzzingpixel-mission-control-servers \
                buzzingpixel-mission-control-tickets \
                buzzingpixel-mission-control-url-monitoring \
             ;
        `, { stdio: 'inherit' });

        const RemoveLinkedNodeModulesInstance = new RemoveLinkedNodeModules(
            this.argv,
            this.config,
        );

        await RemoveLinkedNodeModulesInstance.run();
    }
}
