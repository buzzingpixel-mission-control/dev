<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackendApp\Config\QueueName;
use MissionControlServers\Pipelines\Config\ApplyPipelinesConfigEvent;
use MissionControlServers\Pipelines\Config\PipelineConfig;

class ApplyPipelinesConfigEventListener
{
    public function onApplyPipelinesConfig(
        ApplyPipelinesConfigEvent $event,
    ): void {
        $event->addConfig(new PipelineConfig(
            QueueName::pipelines->name,
        ));
    }
}
