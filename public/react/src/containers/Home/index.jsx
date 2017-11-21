/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';
import {Link} from 'react-router';

import HomeHeader from '../../components/HomeHeader/index.jsx';
import HomeBanner from '../../components/HomeBanner/index.jsx';

class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
    }

    render() {
        return (
            <div>
                <HomeHeader />
                <HomeBanner />
            </div>
        )
    }
}

export default Index;