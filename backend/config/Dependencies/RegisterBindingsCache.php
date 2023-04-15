<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Dependencies;

use MissionControlBackend\ContainerBindings;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;
use Redis;
use Symfony\Component\Cache\Adapter\RedisAdapter;

use function assert;

class RegisterBindingsCache
{
    public static function register(ContainerBindings $containerBindings): void
    {
        $containerBindings->addBinding(
            CacheItemPoolInterface::class,
            RedisAdapter::class,
        );

        $containerBindings->addBinding(
            RedisAdapter::class,
            static function (ContainerInterface $container): RedisAdapter {
                $redis = $container->get(Redis::class);

                assert($redis instanceof Redis);

                return new RedisAdapter($redis);
            },
        );
    }
}
