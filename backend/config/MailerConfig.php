<?php

declare(strict_types=1);

namespace Config;

use MissionControlBackend\Mailer\ApplyMailerConfigEvent;
use MissionControlBackend\Mailer\MailerConfig as MailerConfigObject;

readonly class MailerConfig
{
    public function __construct(private RuntimeConfig $runtimeConfig)
    {
    }

    public function onApplyMailerConfig(ApplyMailerConfigEvent $event): void
    {
        $event->addConfig(new MailerConfigObject(
            systemFromAddress: $this->runtimeConfig->getString(
                RuntimeConfigOptions::SYSTEM_EMAIL_FROM_ADDRESS,
            ),
            systemFromName: $this->runtimeConfig->getString(
                RuntimeConfigOptions::SYSTEM_EMAIL_FROM_NAME,
            ),
            user: $this->runtimeConfig->getString(
                RuntimeConfigOptions::SMTP_USER,
                '',
            ),
            password: $this->runtimeConfig->getString(
                RuntimeConfigOptions::SMTP_PASSWORD,
                '',
            ),
            host: $this->runtimeConfig->getString(
                RuntimeConfigOptions::SMTP_HOST,
            ),
            port: $this->runtimeConfig->getString(
                RuntimeConfigOptions::SMTP_PORT,
            ),
        ));
    }
}
