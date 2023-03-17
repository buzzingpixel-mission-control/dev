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
        RegisterBindingsRedis::register(containerBindings: $containerBindings);

        // Pacakge bindings
        RegisterBindingsIdp::register(containerBindings: $containerBindings);
    }
}
