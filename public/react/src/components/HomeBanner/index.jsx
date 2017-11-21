/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';
import {Link} from 'react-router';

import ReactSwipe from 'react-swipe';

import testPic from '../../static/images/test.jpg';
import './index.less';

class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
        this.state = {index: 0};
    }

    render() {
        const opt = {
            auto: 2500,
            callback: function (index) {
                this.setState({index: index});
            }.bind(this)
        };
        return (
            <div className="home-banner clearfix">
                <ReactSwipe swipeOptions={opt}>
                    <div className="item"><img src={testPic}/></div>
                    <div className="item"><img src={testPic}/></div>
                    <div className="item"><img src={testPic}/></div>
                </ReactSwipe>
                <div className="index-container">
                    <ul>
                        <li className={this.state.index === 0 ? "selected" : ''}></li>
                        <li className={this.state.index === 1 ? "selected" : ''}></li>
                        <li className={this.state.index === 2 ? "selected" : ''}></li>
                    </ul>
                </div>
            </div>
        )
    }
}

export default Index;