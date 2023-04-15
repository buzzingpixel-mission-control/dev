<?php

declare(strict_types=1);

use MissionControlBackend\Boot;
use MissionControlBackendApp\Config\BootHttpMiddlewareConfigFactory;
use MissionControlBackendApp\Config\CoreConfigFactory;
use MissionControlBackendApp\Config\Dependencies\DependencyBindings;
use MissionControlBackendApp\Config\Events\EventRegistration;

require dirname(__DIR__) . '/vendor/autoload.php';

(new Boot())
    ->start((new CoreConfigFactory())->create())
    ->buildContainer([DependencyBindings::class, 'register'])
    ->registerEvents([EventRegistration::class, 'register'])
    ->buildHttpApplication()
    ->applyRoutes()
    ->applyMiddleware((new BootHttpMiddlewareConfigFactory())->create())
    ->runApplication();
