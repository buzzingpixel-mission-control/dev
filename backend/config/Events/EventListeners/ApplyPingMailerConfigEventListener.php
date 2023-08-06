<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlPings\Pings\Notifications\Adapters\Mailer\Addresses;
use MissionControlPings\Pings\Notifications\Adapters\Mailer\ApplyPingMailerConfigEvent;
use MissionControlPings\Pings\Notifications\Adapters\Mailer\PingMailerConfig;
use Symfony\Component\Mime\Address;

class ApplyPingMailerConfigEventListener
{
    public function onApplyMonitoredUrlMailerConfig(
        ApplyPingMailerConfigEvent $event,
    ): void {
        $event->addConfig(new PingMailerConfig(
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
