<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config;

use MissionControlFrontend\CoreConfig;

class CoreConfigFactory
{
    public function create(): CoreConfig
    {
        $runtimeConfig = new RuntimeConfig();

        return new CoreConfig(
            useWhoopsErrorHandling: $runtimeConfig->getBoolean(
                RuntimeConfigOptions::USE_WHOOPS_ERROR_HANDLING,
            ),
        );
    }
}
