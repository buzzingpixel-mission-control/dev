<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config;

use function array_column;

enum QueueName
{
    case default;
    case email;
    case url_monitoring;
    case pings;
    case pipelines;

    /** @return string[] */
    public static function allAsStringArray(): array
    {
        return array_column(QueueName::cases(), 'name');
    }
}
