<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config;

use RuntimeException;

use function getenv;
use function implode;

class RuntimeConfig
{
    public function getString(
        RuntimeConfigOptions $from,
        string|null $default = null,
    ): string {
        return (string) $this->getValue($from, $default);
    }

    public function getBoolean(
        RuntimeConfigOptions $from,
        bool|null $default = null,
    ): bool {
        return (bool) $this->getValue($from, $default);
    }

    public function getInteger(
        RuntimeConfigOptions $from,
        int|null $default = null,
    ): int {
        return (int) $this->getValue($from, $default);
    }

    private function getValue(
        RuntimeConfigOptions $from,
        string|bool|int|null $default = null,
    ): bool|int|string {
        $fromGetEnv = getenv($from->name);

        if ($fromGetEnv !== false) {
            return $fromGetEnv;
        }

        if ($default !== null) {
            return $default;
        }

        throw new RuntimeException(implode(' ', [
            $from->name,
            'could not be found in secrets or environment variables',
            'and no default value was provided',
        ]));
    }
}
