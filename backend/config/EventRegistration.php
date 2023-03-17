<?php

declare(strict_types=1);

namespace Config;

use Config\Routing\ApiRouting;
use Crell\Tukio\OrderedProviderInterface;

class EventRegistration
{
    public static function register(OrderedProviderInterface $provider): void
    {
        $provider->addSubscriber(
            ApiRouting::class,
            ApiRouting::class,
        );
    }
}
