<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackend\Http\ApiApplyRoutesEvent;
use MissionControlBackendApp\App\EnqueueActionExample;

class ApplyRoutesEventListener
{
    public function onApplyRoutes(ApiApplyRoutesEvent $event): void
    {
        // TODO: Apply routes here
        $event->get('/enqueue-action-example', EnqueueActionExample::class);
    }
}
