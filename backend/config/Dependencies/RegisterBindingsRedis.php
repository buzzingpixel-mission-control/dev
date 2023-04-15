<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Dependencies;

use MissionControlBackend\ContainerBindings;
use MissionControlBackendApp\Config\RuntimeConfig;
use MissionControlBackendApp\Config\RuntimeConfigOptions;
use Redis;

class RegisterBindingsRedis
{
    public static function register(ContainerBindings $containerBindings): void
    {
        $containerBindings->addBinding(
            Redis::class,
            static function (): Redis {
                $runtimeConfig = new RuntimeConfig();

                $redis = new Redis();

                $redis->connect($runtimeConfig->getString(
                    RuntimeConfigOptions::REDIS_HOST,
                ));

                return $redis;
            },
        );
    }
}
