<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackend\Http\ApplyMiddlewareEvent;

class ApplyMiddlewareEventListener
{
    public function onApplyMiddleware(ApplyMiddlewareEvent $event): void
    {
        // TODO: Apply http middleware here
    }
}
