<?php

declare(strict_types=1);

namespace Config\Dependencies;

use BuzzingPixel\Queue\QueueHandler;
use BuzzingPixel\Queue\QueueNames as QueueNamesInterface;
use BuzzingPixel\Queue\RedisDriver\RedisQueueHandler;
use Config\QueueNames;
use MissionControlBackend\ContainerBindings;

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
