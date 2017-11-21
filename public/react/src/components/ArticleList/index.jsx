/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';

import './index.less';

import Item from './Item/index.jsx';

class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
    }

    render() {
        return (
            <Item />
            <Item />
            <Item />
        );
    }
}

export default Index;