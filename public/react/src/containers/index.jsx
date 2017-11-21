/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';

import List from '../components/List/index.jsx';

class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
    }

    render() {
        return (
            <div>
                <List/>
            </div>
        )
    }
}

export default Index;
