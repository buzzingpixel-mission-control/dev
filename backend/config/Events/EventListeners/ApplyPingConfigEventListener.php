<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackendApp\Config\QueueName;
use MissionControlPings\Pings\Config\ApplyPingConfigEvent;
use MissionControlPings\Pings\Config\PingConfig;

class ApplyPingConfigEventListener
{
    public function onApplyPingConfig(ApplyPingConfigEvent $event): void
    {
        $event->addConfig(new PingConfig(
            QueueName::pings->name,
        ));
    }
}
