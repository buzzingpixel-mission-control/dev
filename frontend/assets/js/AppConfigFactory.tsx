import React from 'react';
import { AppConfig } from 'buzzingpixel-mission-control-frontend-core';
import { Route } from 'react-router';
import HelloWorld from './HelloWorld';

const AppConfigFactory = (appContainer: HTMLElement): AppConfig => ({
    appContainer,
    menuItems: () => [
        {
            name: 'Hello World',
            href: '/hello-world',
        },
    ],
    routes: () => <>
        <Route path="/hello-world" element={<HelloWorld />} />
    </>,
});

export default AppConfigFactory;
