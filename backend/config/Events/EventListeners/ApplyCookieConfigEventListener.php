<?php

declare(strict_types=1);

namespace Config\Events\EventListeners;

use Config\RuntimeConfig;
use Config\RuntimeConfigOptions;
use MissionControlBackend\Cookies\ApplyCookieConfigEvent;
use MissionControlBackend\Cookies\CookieConfig;

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
