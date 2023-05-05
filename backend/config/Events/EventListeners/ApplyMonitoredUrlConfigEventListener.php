<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackendApp\Config\QueueName;
use MissionControlUrlMonitoring\MonitoredUrls\Config\ApplyMonitoredUrlConfigEvent;
use MissionControlUrlMonitoring\MonitoredUrls\Config\MonitoredUrlConfig;

class ApplyMonitoredUrlConfigEventListener
{
    public function onApplyMonitoredUrlConfig(
        ApplyMonitoredUrlConfigEvent $event,
    ): void {
        $event->addConfig(new MonitoredUrlConfig(
            QueueName::url_monitoring->name,
        ));
    }
}
