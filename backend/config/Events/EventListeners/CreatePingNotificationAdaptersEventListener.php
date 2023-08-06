<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlPings\Pings\Notifications\Adapters\CreateNotificationAdaptersEvent;
use MissionControlPings\Pings\Notifications\Adapters\Mailer\SendNotificationWithMailer;
use MissionControlPings\Pings\Notifications\Adapters\Slack\SendNotificationWithSlack;

class CreatePingNotificationAdaptersEventListener
{
    public function onCreateNotificationAdapters(
        CreateNotificationAdaptersEvent $event,
    ): void {
        $event->addAdapterFromContainer(
            SendNotificationWithMailer::class,
        );

        $event->addAdapterFromContainer(
            SendNotificationWithSlack::class,
        );
    }
}
