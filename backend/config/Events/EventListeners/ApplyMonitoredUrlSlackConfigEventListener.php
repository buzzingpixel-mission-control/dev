<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlUrlMonitoring\MonitoredUrls\Notifications\Adapters\Slack\ApplyMonitoredUrlSlackConfigEvent;

class ApplyMonitoredUrlSlackConfigEventListener
{
    public function onApplyMonitoredUrlSlackConfig(
        ApplyMonitoredUrlSlackConfigEvent $event,
    ): void {
        // $event->addConfig(new MonitoredUrlSlackConfig(
        //     'sitenotifications',
        // ));
    }
}
