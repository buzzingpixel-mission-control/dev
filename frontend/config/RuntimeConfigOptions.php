<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config;

enum RuntimeConfigOptions
{
    case USE_WHOOPS_ERROR_HANDLING;
    case USE_PRODUCTION_ERROR_MIDDLEWARE;
    case REDIS_HOST;
}
