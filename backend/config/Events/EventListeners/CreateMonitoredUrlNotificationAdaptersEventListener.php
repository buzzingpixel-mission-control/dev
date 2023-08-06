<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\CreateNotificationAdaptersEvent;
use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\Mailer\SendNotificationWithMailer;
use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\Slack\SendNotificationWithSlack;

class CreateMonitoredUrlNotificationAdaptersEventListener
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
