import React from 'react';
import { AppConfig, FrontEndCoreMenuItems } from 'buzzingpixel-mission-control-frontend-core';
import FrontEndCoreRoutes from 'buzzingpixel-mission-control-frontend-core/dist/FrontEndCoreRoutes';

const AppConfig = (): AppConfig => ({
    menuItems: () => [
        ...FrontEndCoreMenuItems(),
    ],
    routes: (setPageName) => <>
        {FrontEndCoreRoutes(setPageName)}
    </>,
});

export default AppConfig;
