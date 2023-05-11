<?php

declare(strict_types=1);

namespace MissionControlBackendApp\Config;

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
    case SYSTEM_EMAIL_FROM_ADDRESS;
    case SYSTEM_EMAIL_FROM_NAME;
    case SMTP_USER;
    case SMTP_PASSWORD;
    case SMTP_HOST;
    case SMTP_PORT;
    case COOKIE_DOMAIN;
    case SLACK_TOKEN;
}
