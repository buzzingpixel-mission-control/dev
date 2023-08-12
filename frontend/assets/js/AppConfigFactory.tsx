import React from 'react';
import {
    AppConfig,
    // addProjectDetailsSection,
} from 'buzzingpixel-mission-control-frontend-core';
import { Route } from 'react-router';
import {
    UrlMonitoringBoot,
    UrlMonitoringMenuItems,
    UrlMonitoringRoutes,
} from 'buzzingpixel-mission-control-url-monitoring';
import {
    PingsBoot,
    PingsMenuItems,
    PingsRoutes,
} from 'buzzingpixel-mission-control-pings';
import {
    ServersBoot,
    ServersMenuItems,
    ServersRoutes,
} from 'buzzingpixel-mission-control-servers';
import HelloWorld from './HelloWorld';

const AppConfigFactory = (appContainer: HTMLElement): AppConfig => ({
    appContainer,
    menuItems: () => [
        ...UrlMonitoringMenuItems(),
        ...PingsMenuItems(),
        ...ServersMenuItems(),
        {
            name: 'Hello World',
            href: '/hello-world',
        },
    ],
    routes: () => <>
        {UrlMonitoringRoutes()}
        {PingsRoutes()}
        {ServersRoutes()}
        <Route path="/hello-world" element={<HelloWorld />} />
    </>,
    boot: () => {
        UrlMonitoringBoot();
        PingsBoot();
        ServersBoot();
    },
});

export default AppConfigFactory;
