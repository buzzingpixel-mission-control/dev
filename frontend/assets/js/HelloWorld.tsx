import React from 'react';
import { setPageName, useRuntimeContext } from 'buzzingpixel-mission-control-frontend-core';

const HelloWorld = () => {
    setPageName('Hello World');

    const runtimeContext = useRuntimeContext();

    console.log(runtimeContext);

    return <>Hello World</>;
};

export default HelloWorld;
