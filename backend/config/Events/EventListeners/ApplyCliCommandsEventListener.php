<?php

declare(strict_types=1);

namespace Config\Events\EventListeners;

use MissionControlBackend\Cli\ApplyCliCommandsEvent;

class ApplyCliCommandsEventListener
{
    public function onApplyCommands(ApplyCliCommandsEvent $event): void
    {
        // TODO: Apply commands here
    }
}
