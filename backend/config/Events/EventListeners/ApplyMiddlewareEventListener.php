<?php

declare(strict_types=1);

namespace Config\Events\EventListeners;

use MissionControlBackend\Http\ApplyMiddlewareEvent;

class ApplyMiddlewareEventListener
{
    public function onApplyMiddleware(ApplyMiddlewareEvent $event): void
    {
        // TODO: Apply http middleware here
    }
}
