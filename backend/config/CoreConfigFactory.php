<?php

declare(strict_types=1);

namespace Config;

use MissionControlBackend\CoreConfig;

class CoreConfigFactory
{
    public function create(): CoreConfig
    {
        $runtimeConfig = new RuntimeConfig();

        return new CoreConfig(
            appUrl: $runtimeConfig->getString(
                RuntimeConfigOptions::APP_URL,
            ),
            apiUrl: $runtimeConfig->getString(
                RuntimeConfigOptions::API_URL,
            ),
            authUrl: $runtimeConfig->getString(
                RuntimeConfigOptions::AUTH_URL,
            ),
            accountUrl: $runtimeConfig->getString(
                RuntimeConfigOptions::ACCOUNT_URL,
            ),
            authHost: $runtimeConfig->getString(
                RuntimeConfigOptions::AUTH_HOST,
            ),
            accountHost: $runtimeConfig->getString(
                RuntimeConfigOptions::ACCOUNT_HOST,
            ),
            useWhoopsErrorHandling: $runtimeConfig->getBoolean(
                RuntimeConfigOptions::USE_WHOOPS_ERROR_HANDLING,
            ),
        );
    }
}
