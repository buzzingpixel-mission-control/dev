<?php

declare(strict_types=1);

use Config\BootHttpMiddlewareConfigFactory;
use Config\CoreConfigFactory;
use Config\Dependencies\DependencyBindings;
use Config\Events\EventRegistration;
use MissionControlBackend\Boot;

require dirname(__DIR__) . '/vendor/autoload.php';

(new Boot())
    ->start((new CoreConfigFactory())->create())
    ->buildContainer([DependencyBindings::class, 'register'])
    ->registerEvents([EventRegistration::class, 'register'])
    ->buildHttpApplication()
    ->applyRoutes()
    ->applyMiddleware((new BootHttpMiddlewareConfigFactory())->create())
    ->runApplication();
