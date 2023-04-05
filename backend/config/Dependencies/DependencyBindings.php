<?php

declare(strict_types=1);

namespace Config\Dependencies;

use MissionControlBackend\ContainerBindings;
use MissionControlIdp\Dependencies\RegisterBindings as RegisterBindingsIdp;

class DependencyBindings
{
    public static function register(ContainerBindings $containerBindings): void
    {
        // Local bindings
        RegisterBindingsAuth::register(containerBindings: $containerBindings);
        RegisterBindingsRedis::register(containerBindings: $containerBindings);

        // Package bindings
        RegisterBindingsIdp::register(containerBindings: $containerBindings);
    }
}
