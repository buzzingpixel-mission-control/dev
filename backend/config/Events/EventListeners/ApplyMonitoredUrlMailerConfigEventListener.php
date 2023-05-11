<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\Mailer\Addresses;
use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\Mailer\ApplyMonitoredUrlMailerConfigEvent;
use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\Mailer\MonitoredUrlMailerConfig;
use Symfony\Component\Mime\Address;

class ApplyMonitoredUrlMailerConfigEventListener
{
    public function onApplyMonitoredUrlMailerConfig(
        ApplyMonitoredUrlMailerConfigEvent $event,
    ): void {
        $event->addConfig(new MonitoredUrlMailerConfig(
            new Addresses([
                new Address(
                    'tj@buzzingpixel.com',
                    'TJ Draper',
                ),
                new Address(
                    'tjdraper@gmail.com',
                    'TJ Draper Gmail',
                ),
            ]),
        ));
    }
}
