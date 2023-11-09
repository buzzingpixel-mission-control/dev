<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Events;

use Crell\Tukio\OrderedProviderInterface;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyCliCommandsEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyCookieConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyDbConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyMailerConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyMiddlewareEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyMonitoredUrlConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyMonitoredUrlMailerConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyMonitoredUrlSlackConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyPingConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyPingMailerConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyPipelinesConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyRoutesEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplyScheduleEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\ApplySlackClientConfigEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\CreateMonitoredUrlNotificationAdaptersEventListener;
use MissionControlBackendApp\Config\Events\EventListeners\CreatePingNotificationAdaptersEventListener;
use MissionControlIdp\EventListeners\EventRegistration as EventRegistrationIdp;
use MissionControlPings\EventListeners\EventRegistration as EventRegistrationPings;
use MissionControlServers\EventListeners\EventRegistration as EventRegistrationServers;
use MissionControlTickets\EventListeners\EventRegistration as EventRegistrationTickets;
use MissionControlUrlMonitoring\EventListeners\EventRegistration as EventRegistrationUrlMonitoring;

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

        $provider->addSubscriber(
            ApplyMonitoredUrlConfigEventListener::class,
            ApplyMonitoredUrlConfigEventListener::class,
        );

        $provider->addSubscriber(
            CreateMonitoredUrlNotificationAdaptersEventListener::class,
            CreateMonitoredUrlNotificationAdaptersEventListener::class,
        );

        $provider->addSubscriber(
            ApplySlackClientConfigEventListener::class,
            ApplySlackClientConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyMonitoredUrlSlackConfigEventListener::class,
            ApplyMonitoredUrlSlackConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyMonitoredUrlMailerConfigEventListener::class,
            ApplyMonitoredUrlMailerConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyPingConfigEventListener::class,
            ApplyPingConfigEventListener::class,
        );

        $provider->addSubscriber(
            ApplyPingMailerConfigEventListener::class,
            ApplyPingMailerConfigEventListener::class,
        );

        $provider->addSubscriber(
            CreatePingNotificationAdaptersEventListener::class,
            CreatePingNotificationAdaptersEventListener::class,
        );

        $provider->addSubscriber(
            ApplyPipelinesConfigEventListener::class,
            ApplyPipelinesConfigEventListener::class,
        );

        /*
         * Package bindings
         */
        EventRegistrationIdp::register($provider);
        EventRegistrationPings::register($provider);
        EventRegistrationServers::register($provider);
        EventRegistrationTickets::register($provider);
        EventRegistrationUrlMonitoring::register($provider);
    }
}
