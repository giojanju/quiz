import React, { Component } from 'react'
import axios from 'axios'
import { withRouter } from "react-router-dom";
import {Layout, Card, Row, Radio, Alert} from "antd";

class QuizReport extends Component {
    state = {
        applicant: {},
    };

    componentDidMount = async () => {
        const { id } = this.props.match.params;

        try {
            const response = await axios.get('/api/applicants/' + id);

            this.setState({applicant: response.data.data})
        } catch (error) {
            console.error(error.message)
        }
    };

    setRightOrFailQuestions = (question) => {
        const applicantAnswer = this.state.applicant.result.find(el => el.question === question.id).answer || 0;

        this.state.applicant.quiz.questions.map(ans => {
            if (ans.id === question.id) {
                ans.is_right = (applicantAnswer === question.right_answer);
                ans.answer = applicantAnswer;
            }

            return ans;
        });
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

    render () {
        const { quiz } = this.state.applicant;

        if (!quiz) {
            return null;
        }

        return (
            <div>
                <Layout.Content style={{ marginTop: 30, background: '#ECECEC', padding: '30px' }}>
                    <h3>{quiz.name || ''}</h3>
                    <div>
                        {
                            quiz.questions.map((question) => {
                                this.setRightOrFailQuestions(question);

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
                </Layout.Content>
            </div>
        )
    };
}

export default withRouter(QuizReport);
