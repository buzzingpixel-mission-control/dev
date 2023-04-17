import React from 'react';
import { createRoot } from 'react-dom/client';
import { App } from 'buzzingpixel-mission-control-frontend-core';
import AppConfig from './AppConfig';

const appContainer = document.querySelector('[data-react="app"]');

const root = createRoot(appContainer);

root.render(<App appConfig={AppConfig()} />);
