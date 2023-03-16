<?php

declare(strict_types=1);

use MissionControlBackend\Boot;
use MissionControlBackend\Http\HttpRoutesConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

(new Boot())
    ->start(devMode: true)
    ->registerEvents()
    ->buildContainer()
    ->buildHttpApplication()
    ->applyRoutes(new HttpRoutesConfig(
        authServerUrl: '',
        accountServerUrl: '',
    ))
    ->registerErrorHandling(devMode: false)
    ->registerHttpMiddleware()
    ->emitResponse();
