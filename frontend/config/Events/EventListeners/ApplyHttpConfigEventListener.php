<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config\Events\EventListeners;

use MissionControlFrontend\Http\ApplyHttpConfigEvent;

class ApplyHttpConfigEventListener
{
    public function onApplyHttpConfigEvent(ApplyHttpConfigEvent $event): void
    {
        $event->addCssTagFromNative('/assets/css/main.css');

        $event->addScriptTagFromNative('/assets/js/index.js');
    }
}
