<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events\EventListeners;

use MissionControlBackend\Cookies\ApplyCookieConfigEvent;
use MissionControlBackend\Cookies\CookieConfig;
use MissionControlBackendApp\Config\RuntimeConfig;
use MissionControlBackendApp\Config\RuntimeConfigOptions;

readonly class ApplyCookieConfigEventListener
{
    public function __construct(private RuntimeConfig $runtimeConfig)
    {
    }

    public function onApplyCookieConfig(ApplyCookieConfigEvent $event): void
    {
        $event->addConfig(new CookieConfig(
            cookieDomain: $this->runtimeConfig->getString(
                RuntimeConfigOptions::COOKIE_DOMAIN,
            ),
        ));
    }
}
