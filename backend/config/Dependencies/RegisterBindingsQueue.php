<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config\Dependencies;

use BuzzingPixel\Queue\QueueHandler;
use BuzzingPixel\Queue\QueueNames as QueueNamesInterface;
use BuzzingPixel\Queue\RedisDriver\RedisQueueHandler;
use MissionControlBackend\ContainerBindings;
use MissionControlBackendApp\Config\QueueNames;

class RegisterBindingsQueue
{
    public static function register(ContainerBindings $containerBindings): void
    {
        $containerBindings->addBinding(
            QueueNamesInterface::class,
            QueueNames::class,
        );

        $containerBindings->addBinding(
            QueueHandler::class,
            RedisQueueHandler::class,
        );
    }
}
