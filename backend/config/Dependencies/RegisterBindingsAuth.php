<?php

declare(strict_types=1);

namespace Config\Dependencies;

use Config\SshKeys\SshKeys;
use Crell\EnvMapper\EnvMapper;
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
        $mapper = new EnvMapper();

        $authConfig = $mapper->map(AuthConfig::class);

        $containerBindings->addBinding(
            ClientsConfig::class,
            new ClientsConfig(new ClientCollection(
                clients: [
                    new Client(
                        $authConfig->missionControlWebClientId,
                        $authConfig->missionControlWebClientName,
                        explode(
                            ',',
                            $authConfig->missionControlWebClientRedirectUris,
                        ),
                        $authConfig->isConfidential,
                        $authConfig->missionControlWebClientSecret,
                    ),
                ],
            )),
        );

        $containerBindings->addBinding(
            AuthorizationServerFactoryConfig::class,
            static function () use ($mapper): AuthorizationServerFactoryConfig {
                $authServerFactoryConfig = $mapper->map(
                    AuthorizationServerFactoryConfig::class,
                );

                return new AuthorizationServerFactoryConfig(
                    $authServerFactoryConfig->encryptionKey,
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
