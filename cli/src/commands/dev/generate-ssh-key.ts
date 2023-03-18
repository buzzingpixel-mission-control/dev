import { Command } from '@oclif/core';
import * as fs from 'fs-extra';
import { execSync } from 'node:child_process';

export default class GenerateSshKey extends Command {
    public async run (): Promise<void> {
        const rootDir = fs.realpathSync(`${this.config.root}/../`);

        const privKeyPath = `${rootDir}/backend/config/SshKeys/private.key`;

        const pubKeyPath = `${rootDir}/backend/config/SshKeys/public.key`;

        let genPublicKey = false;

        if (!fs.existsSync(privKeyPath)) {
            execSync(
                `openssl genpkey -algorithm RSA -out ${privKeyPath} -pkeyopt rsa_keygen_bits:4096;`,
                { stdio: 'inherit' },
            );

            genPublicKey = true;
        }

        execSync(
            `chmod 600 ${privKeyPath}`,
            { stdio: 'inherit' },
        );

        if (!fs.existsSync(pubKeyPath) || genPublicKey) {
            execSync(
                `openssl rsa -pubout -in ${privKeyPath} -out ${pubKeyPath}`,
                { stdio: 'inherit' },
            );
        }

        execSync(
            `chmod 600 ${pubKeyPath}`,
            { stdio: 'inherit' },
        );
    }
}
