/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import {render} from 'react-dom';
import {hashHistory} from 'react-router';

import RouteMap from './router/index.jsx';

import './static/css/common.less';

render(
    <div>
        <RouteMap history={hashHistory}/>
    </div>,
    document.getElementById('root')
);
