<?php

declare(strict_types=1);

namespace MissionControlFrontendApp\Config;

enum RuntimeConfigOptions
{
    case USE_WHOOPS_ERROR_HANDLING;
    case USE_PRODUCTION_ERROR_MIDDLEWARE;
    case REDIS_HOST;
    case APP_URL;
    case IDP_OAUTH_URL;
    case WEB_CLIENT_ID;
    case WEB_CLIENT_SECRET;
    case WEB_CLIENT_REDIRECT_URI;
    case COOKIE_DOMAIN;
    case ACCESS_TOKEN_POST_URL;
    case API_URL;
}
