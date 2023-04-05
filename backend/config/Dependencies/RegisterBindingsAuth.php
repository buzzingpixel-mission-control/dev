<?php

declare(strict_types=1);

namespace Config\Dependencies;

use Config\RuntimeConfig;
use Config\RuntimeConfigOptions;
use Config\SshKeys\SshKeys;
use DateInterval;
use MissionControlBackend\ContainerBindings;
use MissionControlIdp\AuthorizationServerFactoryConfig;
use MissionControlIdp\Client\Client;
use MissionControlIdp\Client\ClientCollection;
use MissionControlIdp\Client\ClientsConfig;

use function explode;

class RegisterBindingsAuth
{
    public static function register(ContainerBindings $containerBindings): void
    {
        $runtimeConfig = new RuntimeConfig();

        $containerBindings->addBinding(
            ClientsConfig::class,
            new ClientsConfig(new ClientCollection(
                clients: [
                    new Client(
                        $runtimeConfig->getString(
                            RuntimeConfigOptions::MISSION_CONTROL_WEB_CLIENT_ID,
                        ),
                        'Mission Control Web Client',
                        explode(
                            ',',
                            $runtimeConfig->getString(
                                RuntimeConfigOptions::MISSION_CONTROL_WEB_CLIENT_REDIRECT_URIS,
                            ),
                        ),
                        true,
                        $runtimeConfig->getString(
                            RuntimeConfigOptions::MISSION_CONTROL_WEB_CLIENT_SECRET,
                        ),
                    ),
                ],
            )),
        );

        $containerBindings->addBinding(
            AuthorizationServerFactoryConfig::class,
            static function () use (
                $runtimeConfig,
            ): AuthorizationServerFactoryConfig {
                return new AuthorizationServerFactoryConfig(
                    $runtimeConfig->getString(
                        RuntimeConfigOptions::ENCRYPTION_KEY,
                    ),
                    SshKeys::PRIVATE_KEY_PATH,
                    SshKeys::PUBLIC_KEY_PATH,
                    new DateInterval('PT10M'),
                    new DateInterval('P1M'),
                    new DateInterval('P1D'),
                );
            },
        );
    }
}
