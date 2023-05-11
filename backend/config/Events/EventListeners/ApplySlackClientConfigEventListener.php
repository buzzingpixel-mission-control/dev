<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackend\Slack\ApplySlackClientConfigEvent;
use MissionControlBackend\Slack\SlackClientConfig;
use MissionControlBackendApp\Config\RuntimeConfig;
use MissionControlBackendApp\Config\RuntimeConfigOptions;

readonly class ApplySlackClientConfigEventListener
{
    public function __construct(private RuntimeConfig $runtimeConfig)
    {
    }

    public function onApplyJoliCodeSlackClientConfig(
        ApplySlackClientConfigEvent $event,
    ): void {
        $slackToken = $this->runtimeConfig->getString(
            RuntimeConfigOptions::SLACK_TOKEN,
        );

        $event->addConfig(new SlackClientConfig(
            $slackToken,
            'testing',
        ));
    }
}
