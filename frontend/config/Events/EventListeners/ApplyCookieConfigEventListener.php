<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config\Events\EventListeners;

use MissionControlFrontend\Cookies\ApplyCookieConfigEvent;
use MissionControlFrontend\Cookies\CookieConfig;
use MissionControlFrontendApp\Config\RuntimeConfig;
use MissionControlFrontendApp\Config\RuntimeConfigOptions;

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
