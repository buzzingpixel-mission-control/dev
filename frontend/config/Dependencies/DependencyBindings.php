<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config\Dependencies;

use MissionControlFrontend\ContainerBindings;

class DependencyBindings
{
    public static function register(ContainerBindings $containerBindings): void
    {
        RegisterBindingsRedis::register($containerBindings);
    }
}
