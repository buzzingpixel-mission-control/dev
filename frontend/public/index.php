<?php

declare(strict_types=1);

use MissionControlFrontend\Boot;
use MissionControlFrontendApp\Config\BootHttpMiddlewareConfigFactory;
use MissionControlFrontendApp\Config\CoreConfigFactory;
use MissionControlFrontendApp\Config\Dependencies\DependencyBindings;
use MissionControlFrontendApp\Config\Events\EventRegistration;

require dirname(__DIR__) . '/vendor/autoload.php';

(new Boot())
    ->start((new CoreConfigFactory())->create())
    ->buildContainer([DependencyBindings::class, 'register'])
    ->registerEvents([EventRegistration::class, 'register'])
    ->buildHttpApplication()
    ->applyRoutes()
    ->applyMiddleware((new BootHttpMiddlewareConfigFactory())->create())
    ->runApplication();
