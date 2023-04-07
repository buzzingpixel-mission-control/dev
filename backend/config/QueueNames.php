<?php

declare(strict_types=1);

namespace Config;

use BuzzingPixel\Queue\QueueNames as QueueNamesInterface;
use BuzzingPixel\Queue\QueueNamesDefault;

class QueueNames extends QueueNamesDefault implements QueueNamesInterface
{
    /** @inheritDoc */
    public function getAvailableQueues(): array
    {
        return QueueName::allAsStringArray();
    }
}
