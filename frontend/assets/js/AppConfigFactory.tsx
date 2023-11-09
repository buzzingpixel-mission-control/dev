import React from 'react';
import {
    AppConfig,
    // addProjectDetailsSection,
} from 'buzzingpixel-mission-control-frontend-core';
import { Route } from 'react-router';
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
import {
    TicketsBoot,
    TicketsMenuItems,
    TicketsRoutes,
} from 'buzzingpixel-mission-control-tickets';
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
        ...PingsMenuItems(),
        ...ServersMenuItems(),
        ...TicketsMenuItems(),
        {
            name: 'Hello World',
            href: '/hello-world',
        },
    ],
    routes: () => <>
        {UrlMonitoringRoutes()}
        {PingsRoutes()}
        {ServersRoutes()}
        {TicketsRoutes()}
        <Route path="/hello-world" element={<HelloWorld />} />
    </>,
    boot: () => {
        UrlMonitoringBoot();
        PingsBoot();
        ServersBoot();
        TicketsBoot();
    },
});

export default AppConfigFactory;
