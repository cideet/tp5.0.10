/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import PureRenderMixin from 'react-addons-pure-render-mixin';
import {Link} from 'react-router';


class Index extends React.Component {
    constructor(props, context) {
        super(props, context);
        this.shouldComponentUpdate = PureRenderMixin.shouldComponentUpdate.bind(this);
        this.state = {initDone: false};
    }

    render() {
        return (
            <div>
                {
                    this.state.initDone
                        ? this.props.children
                        : <div>正在加载...</div>
                }
                <ul>
                    <li><Link to="/">Home</Link></li>
                    <li><Link to="/articlelist">ArticleList</Link></li>
                    <li><Link to="/notFound">NotFound</Link></li>
                </ul>
            </div>
        )
    }

    componentDidMount() {
        setTimeout(()=> {
            this.setState({initDone: true});
        }, 1000);
    }
}

export default Index;
