/**
 * Created by Administrator on 2017/11/21 0021.
 */

import React from 'react';
import {Router, Route, IndexRoute} from 'react-router';

import App from '../containers/index.jsx';
import Home from '../containers/Home/index.jsx';
import ArticleList from '../containers/ArticleList/index.jsx';
import NotFound from '../containers/NotFound/index.jsx';

class Index extends React.Component {
    render() {
        return (
            <Router history={this.props.history}>
                <Route path="/" component={App}>
                    <IndexRoute component={Home}/>
                    <Route path="articlelist" component={ArticleList}/>
                    <Route path="*" component={NotFound}/>
                </Route>
            </Router>
        );
    }
}

export default Index;