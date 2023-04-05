<?php

declare(strict_types=1);

namespace Config;

enum RuntimeConfigOptions
{
    case USE_WHOOPS_ERROR_HANDLING;
    case USE_PRODUCTION_ERROR_MIDDLEWARE;
    case AUTH_HOST;
    case ACCOUNT_HOST;
    case APP_URL;
    case API_URL;
    case AUTH_URL;
    case ACCOUNT_URL;
    case REDIS_HOST;
    case MISSION_CONTROL_WEB_CLIENT_ID;
    case MISSION_CONTROL_WEB_CLIENT_REDIRECT_URIS;
    case MISSION_CONTROL_WEB_CLIENT_SECRET;
    case ENCRYPTION_KEY;
    case DB_HOST;
    case DB_NAME;
    case DB_USER;
    case DB_PASSWORD;
    case DB_PORT;
}
