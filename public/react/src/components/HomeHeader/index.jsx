/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';
import {Link} from 'react-router';

import './index.less';

class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
    }

    render() {
        return (
            <div className="home-header clearfix">
                <ul>
                    <li className="pull-left active"><Link to="/"><span>首页</span></Link></li>
                    <li className="pull-left"><Link to="/articlelist"><span>前端</span></Link></li>
                    <li className="pull-left"><Link to="/articlelist"><span>程序</span></Link></li>
                </ul>
            </div>
        )
    }
}

export default Index;