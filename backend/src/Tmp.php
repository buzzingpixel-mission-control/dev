<?php

declare(strict_types=1);

namespace MissionControlBackendApp\App;

use function dd;

readonly class Tmp
{
    public function __construct()
    {
    }

    public function __invoke(): void
    {
        dd('here');
    }
}
