<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config\Events;

use Crell\Tukio\OrderedProviderInterface;
use MissionControlFrontendApp\Config\Events\EventListeners\ApplyHttpConfigEventListener;

class EventRegistration
{
    public static function register(OrderedProviderInterface $provider): void
    {
        $provider->addSubscriber(
            ApplyHttpConfigEventListener::class,
            ApplyHttpConfigEventListener::class,
        );
    }
}
