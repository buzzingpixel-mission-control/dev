<?php

declare(strict_types=1);

namespace Config\Dependencies;

readonly class AuthConfig
{
    public function __construct(
        public string $missionControlWebClientId,
        public string $missionControlWebClientRedirectUris,
        public string $missionControlWebClientSecret,
        public bool $isConfidential = true,
        public string $missionControlWebClientName = 'Mission Control Web Client',
    ) {
    }
}
