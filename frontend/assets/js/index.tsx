import React from 'react';
import { createRoot } from 'react-dom/client';
import { App } from 'buzzingpixel-mission-control-frontend-core';
import AppConfigFactory from './AppConfigFactory';

const appContainer = document.querySelector(
    '[data-react="app"]',
) as HTMLElement;

const root = createRoot(appContainer);

root.render(<App appConfig={AppConfigFactory(appContainer)} />);
