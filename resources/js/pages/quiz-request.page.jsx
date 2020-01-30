import React, { Component } from 'react'
import axios from 'axios'
import { withRouter } from "react-router-dom";
import { Layout, Card, Row, Radio, Alert, Button, Modal, notification } from "antd";

class QuizRequest extends Component {
    state = {
        quiz: {
            questions: [],
        },
        results: [],
        send: false,
        errors: [],
    };

    componentDidMount = async () => {
        const { id } = this.props.match.params;

        if (localStorage.getItem(`quiz-${id}`) !== null) {
            this.setState({quiz: JSON.parse(localStorage.getItem(`quiz-${id}`))});

            return ;
        }

        try {
            const response = await axios.get('/api/quizzes/' + id);

            this.setState({quiz: response.data.data})
        } catch (error) {
            console.error(error.message)
        }
    };

    onChange = (e, question) => {
        const newValue = this.state.quiz.questions.map(ans => {
            if (ans.id === question.id) {
                ans.is_right = (e.target.value === question.right_answer);
                ans.answer = e.target.value;
            }

            return ans;
        });

        const quiz = { ...this.state.quiz };
        quiz.question = newValue;

        this.setState({quiz: quiz});

        localStorage.setItem(`quiz-${quiz.id}`, JSON.stringify(quiz));
    };

    renderAlert = (question) => {
        const rightAnswer = question.answers.find(el => el.key === question.right_answer).value;

        if (!question.hasOwnProperty('is_right')) {
            return null;
        }

        if (question.is_right) {
            return <Alert style={{marginTop: 40}} message={`Correct! The right answer is, ${rightAnswer}`} type="success" />;
        }

        return <Alert style={{marginTop: 40}} message={`Sorry, you are wrong! The right answer is, ${rightAnswer}`} type="error" />;
    };

    handleSendApplication = async () => {
        this.setState({send: true});

        const data = this.state.quiz.questions.map(ans => {
            return {
                answer: ans.answer,
                question: ans.id,
            }
        });

        let request = {result: data};
        request.quiz_id = this.state.quiz.id;

        try {
            const response = await axios.post('/api/applicants/create', request);

            if (response.data.success) {
                this.setState({send: true});

                const { history } = this.props;

                const { result, quiz_id, id } = response.data.data.target;
                const total = result.length || 0;
                const rightAnswer = result.filter(res => res.answer === res.question).length || 0;

                localStorage.removeItem(`quiz-${quiz_id}`);

                Modal.confirm({
                    content: `Your score. ${rightAnswer}/${total}`,
                    okText: 'Try again',
                    cancelText: 'Show result',
                    onOk() {
                        history.push('/')
                    },
                    onCancel() {
                        history.push(`/quizzes/reports/${id}`)
                    }
                })
            }
        } catch (error) {
            this.setState({
                send: false,
                errors: error.response.data.errors,
            });

            const key = 'updatable';

            notification.open({
                key,
                message: error.response.data.message,
                description: this.handleErrors(),
            });

            console.error(error.message)
        }
    };

    handleErrors = () => {
        if (!this.state.errors) {
            return null;
        }

        return (
            <div>
                {
                    Object.keys(this.state.errors).map((err, index) => {
                        return <p key={index} style={{color: '#e75f5f', marginBottom: 0}}>{this.state.errors[err][0]}</p>;
                    })
                }
            </div>
        );
    };

    render () {
        const { quiz } = this.state;

        return (
            <div>
                <Layout.Content style={{ marginTop: 30, background: '#ECECEC', padding: '30px' }}>
                    <h3>{quiz.name || ''}</h3>
                    <div>
                        {
                            quiz.questions.map((question) => {
                                return (
                                    <Row key={question.id} style={{ marginBottom: 25 }}>
                                        <Card>
                                            <h4>{`${question.index}. ${question.question}`}</h4>

                                            <div>
                                                <Radio.Group
                                                    style={{display: 'flex', flexDirection: quiz.type === 'binary' ? 'row' : 'column'}}
                                                    onChange={(e) => this.onChange(e, question)}
                                                    disabled={question.hasOwnProperty('is_right')}
                                                >
                                                    {
                                                        question.answers.map((ans, i) => (
                                                            <Radio key={i} checked={ans.key === question.answer} value={ans.key}>{ans.value}</Radio>
                                                        ))
                                                    }
                                                </Radio.Group>
                                            </div>

                                            {this.renderAlert(question)}
                                        </Card>
                                    </Row>
                                )
                            })
                        }
                    </div>

                    <Button disabled={this.state.send} type="primary" onClick={() => this.handleSendApplication()}>Send</Button>
                </Layout.Content>
            </div>
        )
    };
}

export default withRouter(QuizRequest);
