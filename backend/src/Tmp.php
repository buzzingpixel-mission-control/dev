<?php

declare(strict_types=1);

namespace MissionControlBackendApp\App;

use MissionControlUrlMonitoring\MonitoredUrls\CheckUrls\AddUrlsToQueueAction;

use function dd;

readonly class Tmp
{
    public function __construct(private AddUrlsToQueueAction $addUrlsToQueue)
    {
    }

    public function __invoke(): void
    {
        $this->addUrlsToQueue->__invoke();
        dd('here');
    }
}
