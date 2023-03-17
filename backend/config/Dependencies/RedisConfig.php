<?php

declare(strict_types=1);

namespace Config\Dependencies;

readonly class RedisConfig
{
    public function __construct(public string $redisHost)
    {
    }
}
