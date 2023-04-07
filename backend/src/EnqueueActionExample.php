<?php

declare(strict_types=1);

namespace App;

use BuzzingPixel\Queue\QueueHandler;
use BuzzingPixel\Queue\QueueItem;
use BuzzingPixel\Queue\QueueItemJob;
use BuzzingPixel\Queue\QueueItemJobCollection;
use Config\QueueName;

use function dd;

readonly class EnqueueActionExample
{
    public function __construct(private QueueHandler $queueHandler)
    {
    }

    public function __invoke(): void
    {
        $this->queueHandler->enqueue(
            new QueueItem(
                'enqueueActionExample',
                'Enqueue Action Example',
                new QueueItemJobCollection([
                    new QueueItemJob(
                        EnqueuedRunnerExample::class,
                    ),
                ]),
            ),
            QueueName::email->name,
        );

        dd('here');
    }
}
