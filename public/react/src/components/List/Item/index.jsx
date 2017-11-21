/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';

import './index.less';

import testPic from '../../../static/images/test.jpg';

class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
    }

    render() {
        return (
            <div className="list-item clearfix">
                <div className="left">
                    <img src={testPic} alt="图片"/>
                </div>
                <div className="right">123</div>
            </div>
        );
    }
}

export default Index;