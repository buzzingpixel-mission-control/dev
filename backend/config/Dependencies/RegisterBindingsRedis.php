<?php

declare(strict_types=1);

namespace Config\Dependencies;

use Config\RuntimeConfig;
use Config\RuntimeConfigOptions;
use MissionControlBackend\ContainerBindings;
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
