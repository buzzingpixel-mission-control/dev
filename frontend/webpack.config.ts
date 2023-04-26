// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
import path from 'path';
// eslint-disable-next-line import/no-extraneous-dependencies
import { Configuration } from 'webpack';
// eslint-disable-next-line @typescript-eslint/ban-ts-comment
// @ts-ignore
// eslint-disable-next-line import/no-extraneous-dependencies
import TerserPlugin from 'terser-webpack-plugin';
// eslint-disable-next-line import/no-extraneous-dependencies
import yargs from 'yargs';
// eslint-disable-next-line import/no-extraneous-dependencies
import { hideBin } from 'yargs/helpers';

const { argv } = yargs(hideBin(process.argv));

const mode = argv.mode || 'production';

const config: Configuration = {
    entry: './assets/js/index.tsx',
    module: {
        rules: [
            {
                test: /\.(ts|js)x?$/,
                exclude: /node_modules/,
                use: 'ts-loader',
            },
        ],
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.jsx', '.js'],
    },
    output: {
        path: path.resolve(__dirname, 'public/assets/js'),
        filename: 'index.js',
    },
    optimization: {
        minimizer: [new TerserPlugin({ extractComments: false })],
    },
};

if (mode === 'development') {
    config.devtool = 'eval-source-map';
}

export default config;
