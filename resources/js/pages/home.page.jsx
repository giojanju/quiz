import React from 'react'
import { withRouter } from 'react-router-dom'

import { Layout, Card, Row, Col, Button, Radio } from 'antd';
import axios from 'axios'

class Home extends React.Component {
    state = {
        quizzes: [],
    };

    loadQuizzes = async (data = {}) => {
        try {
            const response = await axios.get('/api/quizzes', {
                params: data
            });

            return response.data.data;
        } catch (error) {
            throw new Error(error)
        }
    };

    componentDidMount = async () => {
        this.setState({quizzes: await this.loadQuizzes()})
    };

    onFilter = async (e) => {
        const { value } = e.target;

        this.setState({quizzes: await this.loadQuizzes({type: value})})
    };

    render () {
        const { Content } = Layout;
        const { quizzes } = this.state;
        const { history } = this.props;

        return (
            <div>
                <Content style={{ marginTop: 30, background: '#ECECEC', padding: '30px' }}>
                    <div>
                        <h4>Settings</h4>
                        <Radio.Group onChange={(e) => this.onFilter(e)} size="medium" style={{marginBottom: 20}}>
                            <Radio.Button value="binary">Binary</Radio.Button>
                            <Radio.Button value="multiple">Multiple</Radio.Button>
                        </Radio.Group>
                    </div>
                    <h3>Quizzes</h3>
                    <Row>
                        {
                            quizzes.map(quiz => {
                                return (
                                    <Col span={8} style={{margin: 4}}>
                                        <Card key={quiz.id} title={quiz.name} bordered={false}>
                                            <p>{`Type: ${quiz.type}`}</p>
                                            <p>{`Questions: ${quiz.question_size}`}</p>
                                            <Button block type="primary" onClick={() => history.push('/quizzes/' + quiz.id)}>Start now</Button>
                                        </Card>
                                    </Col>
                                )
                            })
                        }
                    </Row>
                </Content>
            </div>
        )
    }
}

export default withRouter(Home)
