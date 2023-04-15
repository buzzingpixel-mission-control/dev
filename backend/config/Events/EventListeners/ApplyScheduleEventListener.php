<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackend\Scheduler\ApplyScheduleEvent;

class ApplyScheduleEventListener
{
    public function onApplySchedule(ApplyScheduleEvent $event): void
    {
    }
}
