<?php

declare(strict_types=1);

namespace MissionControlBackendApp\App;

use function file_put_contents;

use const FILE_APPEND;
use const PHP_EOL;

readonly class EnqueuedRunnerExample
{
    public function __invoke(): void
    {
        file_put_contents(
            __DIR__ . '/tmp.txt',
            'run' . PHP_EOL,
            FILE_APPEND,
        );
    }
}
