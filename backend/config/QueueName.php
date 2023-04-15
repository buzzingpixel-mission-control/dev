<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config;

use function array_column;

enum QueueName
{
    case default;
    case email;

    /** @return string[] */
    public static function allAsStringArray(): array
    {
        return array_column(QueueName::cases(), 'name');
    }
}
