<?php

declare(strict_types=1);

namespace Config;

use MissionControlBackend\Persistence\ApplyDbConfigEvent;
use MissionControlBackend\Persistence\DbAdapter;
use MissionControlBackend\Persistence\DbConfig as DbConfigObject;

readonly class DbConfig
{
    public function __construct(private RuntimeConfig $runtimeConfig)
    {
    }

    public function onApplyDbConfig(ApplyDbConfigEvent $event): void
    {
        $event->addConfig(new DbConfigObject(
            adapter: DbAdapter::PGSQL,
            host: $this->runtimeConfig->getString(
                RuntimeConfigOptions::DB_HOST,
            ),
            name: $this->runtimeConfig->getString(
                RuntimeConfigOptions::DB_NAME,
            ),
            user: $this->runtimeConfig->getString(
                RuntimeConfigOptions::DB_USER,
            ),
            pass: $this->runtimeConfig->getString(
                RuntimeConfigOptions::DB_PASSWORD,
            ),
            port: $this->runtimeConfig->getInteger(
                RuntimeConfigOptions::DB_PORT,
            ),
        ));
    }
}
