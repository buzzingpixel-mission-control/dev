<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config;

use MissionControlBackend\Http\BootHttpMiddlewareConfig;

class BootHttpMiddlewareConfigFactory
{
    public function create(): BootHttpMiddlewareConfig
    {
        $runtimeConfig = new RuntimeConfig();

        return new BootHttpMiddlewareConfig(
            useProductionErrorMiddleware: $runtimeConfig->getBoolean(
                RuntimeConfigOptions::USE_PRODUCTION_ERROR_MIDDLEWARE,
            ),
        );
    }
}
