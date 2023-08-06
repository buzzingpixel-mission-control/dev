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
import PingsMenuItems from 'buzzingpixel-mission-control-pings/dist/PingsMenuItems';
import PingsRoutes from 'buzzingpixel-mission-control-pings/dist/PingsRoutes';
import PingsBoot from 'buzzingpixel-mission-control-pings/dist/PingsBoot';
import HelloWorld from './HelloWorld';

const AppConfigFactory = (appContainer: HTMLElement): AppConfig => ({
    appContainer,
    menuItems: () => [
        ...UrlMonitoringMenuItems(),
        ...PingsMenuItems(),
        {
            name: 'Hello World',
            href: '/hello-world',
        },
    ],
    routes: () => <>
        {UrlMonitoringRoutes()}
        {PingsRoutes()}
        <Route path="/hello-world" element={<HelloWorld />} />
    </>,
    boot: () => {
        UrlMonitoringBoot();
        PingsBoot();
    },
});

export default AppConfigFactory;
