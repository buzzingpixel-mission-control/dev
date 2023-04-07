<?php

declare(strict_types=1);

namespace Config\Events\EventListeners;

use App\EnqueueActionExample;
use MissionControlBackend\Http\ApiApplyRoutesEvent;

class ApplyRoutesEventListener
{
    public function onApplyRoutes(ApiApplyRoutesEvent $event): void
    {
        // TODO: Apply routes here
        $event->get('/enqueue-action-example', EnqueueActionExample::class);
    }
}
