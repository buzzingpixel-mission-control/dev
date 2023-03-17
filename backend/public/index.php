<?php

declare(strict_types=1);

use Config\EventRegistration;
use Crell\EnvMapper\EnvMapper;
use MissionControlBackend\Boot;
use MissionControlBackend\CoreConfig;
use MissionControlBackend\Http\HttpRoutesConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$mapper = new EnvMapper();

(new Boot())
    ->start(config: $mapper->map(CoreConfig::class))
    ->buildContainer()
    ->registerEvents(register: [EventRegistration::class, 'register'])
    ->buildHttpApplication()
    ->applyRoutes(routesConfig: $mapper->map(HttpRoutesConfig::class))
    ->registerErrorHandling()
    ->registerHttpMiddleware()
    ->emitResponse();
