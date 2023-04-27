import React from 'react';
import { usePageTitle } from 'buzzingpixel-mission-control-frontend-core';

const HelloWorld = () => {
    usePageTitle('Hello World');

    return <div className="mb-6">Hello World</div>;
};

export default HelloWorld;
