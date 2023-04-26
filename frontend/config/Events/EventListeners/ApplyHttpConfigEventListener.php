<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config\Events\EventListeners;

use MissionControlFrontend\Http\ApplyHttpConfigEvent;
use MissionControlFrontendApp\Config\RuntimeConfig;
use MissionControlFrontendApp\Config\RuntimeConfigOptions;

readonly class ApplyHttpConfigEventListener
{
    public function __construct(private RuntimeConfig $runtimeConfig)
    {
    }

    public function onApplyHttpConfigEvent(ApplyHttpConfigEvent $event): void
    {
        $event->addCssTagFromNative('/assets/css/main.css');

        $event->addScriptTagFromNative('/assets/js/index.js');

        $event->addAppUrl($this->runtimeConfig->getString(
            RuntimeConfigOptions::APP_URL,
        ));

        $event->addIdpOauthUrl($this->runtimeConfig->getString(
            RuntimeConfigOptions::IDP_OAUTH_URL,
        ));

        $event->addWebClientId($this->runtimeConfig->getString(
            RuntimeConfigOptions::WEB_CLIENT_ID,
        ));

        $event->addWebClientSecret(
            $this->runtimeConfig->getString(
                RuntimeConfigOptions::WEB_CLIENT_SECRET,
            ),
        );

        $event->addWebClientRedirectUri(
            $this->runtimeConfig->getString(
                RuntimeConfigOptions::WEB_CLIENT_REDIRECT_URI,
            ),
        );

        $event->addAccessTokenPostUrl(
            $this->runtimeConfig->getString(
                RuntimeConfigOptions::ACCESS_TOKEN_POST_URL,
            ),
        );

        $event->addApiUrl($this->runtimeConfig->getString(
            RuntimeConfigOptions::API_URL,
        ));
    }
}
