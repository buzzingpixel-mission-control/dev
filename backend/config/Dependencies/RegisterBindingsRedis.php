<?php

declare(strict_types=1);

namespace Config\Dependencies;

use Crell\EnvMapper\EnvMapper;
use MissionControlBackend\ContainerBindings;
use Psr\Container\ContainerInterface;
use Redis;

use function assert;

class RegisterBindingsRedis
{
    public static function register(ContainerBindings $containerBindings): void
    {
        $containerBindings->addBinding(
            Redis::class,
            static function (ContainerInterface $container): Redis {
                $envMapper = $container->get(EnvMapper::class);
                assert($envMapper instanceof EnvMapper);

                $redisConfig = $envMapper->map(RedisConfig::class);
                assert($redisConfig instanceof RedisConfig);

                $redis = new Redis();

                $redis->connect($redisConfig->redisHost);

                return $redis;
            },
        );
    }
}
