/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import {Router, Route, IndexRoute} from 'react-router';

import App from '../containers/index.jsx';

class Index extends React.Component {
    render() {
        return (
            <Router history={this.props.history}>
                <Route path="/" component={App}></Route>
            </Router>
        );
    }
}

export default Index;