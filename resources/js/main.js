import React from 'react';
import ReactDOM from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from "react-router-dom";

import { Row, Col, Layout } from 'antd';

import Home from "./pages/home.page";
import QuizRequest from "./pages/quiz-request.page"
import QuizReport from "./pages/quiz-report.page"

import 'antd/dist/antd.css'
import Header from "./components/header.component";

const Main = () => (
    <Router>
        <Row>
            <Col span={20} offset={2}>
                <Header />

                <Switch>
                    <Route exact path="/" component={Home} />
                    <Route exact path="/quizzes/:id" component={QuizRequest} />
                    <Route exact path="/quizzes/reports/:id" component={QuizReport} />
                </Switch>
            </Col>
        </Row>
    </Router>
);

export default Main;

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
