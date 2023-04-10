<?php

declare(strict_types=1);

namespace Config\Events;

use Config\DbConfig;
use Config\Events\EventListeners\ApplyCliCommandsEventListener;
use Config\Events\EventListeners\ApplyMiddlewareEventListener;
use Config\Events\EventListeners\ApplyRoutesEventListener;
use Config\Events\EventListeners\ApplyScheduleEventListener;
use Config\MailerConfig;
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
            ApplyMiddlewareEventListener::class,
            ApplyMiddlewareEventListener::class,
        );

        $provider->addSubscriber(
            ApplyRoutesEventListener::class,
            ApplyRoutesEventListener::class,
        );

        $provider->addSubscriber(
            DbConfig::class,
            DbConfig::class,
        );

        $provider->addSubscriber(
            MailerConfig::class,
            MailerConfig::class,
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
