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
import HelloWorld from './HelloWorld';

const AppConfigFactory = (appContainer: HTMLElement): AppConfig => ({
    appContainer,
    menuItems: () => [
        ...UrlMonitoringMenuItems(),
        {
            name: 'Hello World',
            href: '/hello-world',
        },
    ],
    routes: () => <>
        {UrlMonitoringRoutes()}
        <Route path="/hello-world" element={<HelloWorld />} />
    </>,
    boot: () => {
        UrlMonitoringBoot();
    },
});

export default AppConfigFactory;
