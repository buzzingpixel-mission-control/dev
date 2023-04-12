<?php

declare(strict_types=1);

namespace Config\Events;

use Config\Events\EventListeners\ApplyCliCommandsEventListener;
use Config\Events\EventListeners\ApplyCookieConfigEventListener;
use Config\Events\EventListeners\ApplyDbConfigEventListener;
use Config\Events\EventListeners\ApplyMailerConfigEventListener;
use Config\Events\EventListeners\ApplyMiddlewareEventListener;
use Config\Events\EventListeners\ApplyRoutesEventListener;
use Config\Events\EventListeners\ApplyScheduleEventListener;
use Crell\Tukio\OrderedProviderInterface;
use MissionControlIdp\EventListeners\EventRegistration as EventRegistrationIdp;

class EventRegistration
{
    public static function register(OrderedProviderInterface $provider): void
    {
        /**
         * Local bindings
         */
        $provider->addSubscriber(
            ApplyCliCommandsEventListener::class,
            ApplyCliCommandsEventListener::class,
        );

        $provider->addSubscriber(
            ApplyCookieConfigEventListener::class,
            ApplyCookieConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyDbConfigEventListener::class,
            ApplyDbConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyMailerConfigEventListener::class,
            ApplyMailerConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyMiddlewareEventListener::class,
            ApplyMiddlewareEventListener::class,
        );

        $provider->addSubscriber(
            ApplyRoutesEventListener::class,
            ApplyRoutesEventListener::class,
        );

        $provider->addSubscriber(
            ApplyScheduleEventListener::class,
            ApplyScheduleEventListener::class,
        );

        /*
         * Package bindings
         */
        EventRegistrationIdp::register($provider);
    }
}
