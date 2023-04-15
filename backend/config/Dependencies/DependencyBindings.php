<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Dependencies;

use MissionControlBackend\ContainerBindings;
use MissionControlIdp\Dependencies\RegisterBindings as RegisterBindingsIdp;

class DependencyBindings
{
    public static function register(ContainerBindings $containerBindings): void
    {
        // Local bindings
        RegisterBindingsAuth::register($containerBindings);
        RegisterBindingsCache::register($containerBindings);
        RegisterBindingsQueue::register($containerBindings);
        RegisterBindingsRedis::register($containerBindings);

        // Package bindings
        RegisterBindingsIdp::register($containerBindings);
    }
}
