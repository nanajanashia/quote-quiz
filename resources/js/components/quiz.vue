<template>
    <el-row>
        <el-card class="box-card">
            <el-button type="success" @click="startQuiz" v-show="showStartButton">Start quiz</el-button>
            <div id="quiz" v-show="showQuote">
                <h4>Question {{ this.numberOfQuestion + 1 }} of 10: </h4>
                <b>Who said it?</b>
                <div class="quote">“{{ this.question['quote'] }}”</div>
                <div id="multiple-choice-answers" style="display: block" v-if="quiz_type === 2">
                    <el-radio v-model="multipleChoice" v-for="choice in question['choices']" :disabled="multipleChoiceDisabled" :key="choice.random_author_id" :label="choice.random_author_id" @change="multipleChoiceChange">
                        {{ choice.random_author_name }}
                    </el-radio>
                </div>
                <div id="yes-no-answers" v-if="quiz_type === 1">
                    <p>{{ this.question['random_author_name'] }}</p>
                    <el-button type="success" size="mini" :disabled="yesDisabled" @click="yesAnswerClick">Yes</el-button>
                    <el-button type="danger" size="mini" :disabled="noDisabled" @click="noAnswerClick">No</el-button>
                </div>

                <el-alert v-show="success_alert" :title="success_answer_text" type="success"></el-alert>
                <el-alert v-show="error_alert" :title="wrong_answer_text" type="error"></el-alert>

                <el-button v-if="this.numberOfQuestion < 9"  type="primary" v-show="showNextButton" @click="nextQuestionClick">Next question</el-button>
                <el-button v-else type="primary" v-show="showNextButton" @click="showResults" plain>Show results</el-button>

            </div>
            <div id="result">
                <div v-html="resultText"></div><br>
                <el-button type="success" v-show="startAgainButton" @click="resetQuiz" plain>Start again!</el-button>
            </div>

        </el-card>

    </el-row>
</template>
<script>
    export default {
        props: ['quiz_type'],
        data() {
            return {
                multiple_display: "display: none;",
                multipleChoice: 0,
                startAgainButton: false,
                activeIndex: '1',
                value1: true,
                showStartButton: true,
                showQuote: false,
                showNextButton: false,
                result: [],
                question: [],
                success_answer_text: '',
                wrong_answer_text: '',
                numberOfQuestion: 0,
                success_alert: false,
                error_alert: false,
                correct_answers: 0,
                resultText: '',
                yesDisabled: false,
                noDisabled: false,
                multipleChoiceDisabled: false
            };
        },
        watch: {
            quiz_type: function () {
                this.resetQuiz();
            }
        },
        methods: {
            startQuiz() {
                this.showStartButton = false;
                this.showQuote = true;
                this.question = this.result[this.numberOfQuestion];

                this.$http.post(`api/start`).then((res) => {});
            },
            resetQuiz() {
                this.showStartButton = true;
                this.showQuote = false;
                this.success_alert = false;
                this.showNextButton = false;
                this.error_alert = false;
                this.question = [];
                this.resultText = '';
                this.startAgainButton = false;
                this.yesDisabled = false;
                this.noDisabled = false;
                this.multipleChoiceDisabled = false;
                this.numberOfQuestion = 0;
                this.multipleChoice = 0;

                this.fetchAll();
            },
            multipleChoiceChange() {
                this.showNextButton = true;
                if (this.question['author_id'] === this.multipleChoice){
                    this.getSuccessAlert()
                }else{
                    this.getErrorAlert();
                }
                this.multipleChoiceDisabled = true;
            },
            yesAnswerClick() {
                this.showNextButton = true;
                if (this.question['author_id'] === this.question['random_author_id']) {
                    this.getSuccessAlert();
                } else {
                    this.getErrorAlert();
                }
                this.yesDisabled = true;
                this.noDisabled = true;
            },
            noAnswerClick() {
                this.showNextButton = true;
                if (this.question['author_id'] !== this.question['random_author_id']) {
                    this.getSuccessAlert();
                } else {
                    this.getErrorAlert();
                }
                this.yesDisabled = true;
                this.noDisabled = true;
            },
            getSuccessAlert(){
                this.success_alert = true;
                this.success_answer_text = "Correct! The right answer is " + this.question['author_name'] + "!";

                this.correct_answers++;
                this.$http.post(`api/correct-answers`).then((res) => {});
            },
            getErrorAlert(){
                this.error_alert = true;
                this.wrong_answer_text = "Sorry, you are wrong! The right answer is " + this.question['author_name'] + "!";

                this.$http.post(`api/incorrect-answers`).then((res) => {});
            },
            nextQuestionClick() {
                this.success_alert = false;
                this.error_alert = false;
                this.showNextButton = false;
                this.numberOfQuestion++;

                this.multipleChoice = 0;
                this.question = this.result[this.numberOfQuestion];

                this.yesDisabled = false;
                this.noDisabled = false;
                this.multipleChoiceDisabled = false;
            },
            showResults() {
                this.resultText = "<h4>Thanks for completing the quiz!<h4> <br/> <span>" + this.correct_answers + "/10</span> of your answers were correct.";
                this.showQuote = false;
                this.success_alert = false;
                this.showNextButton = false;
                this.error_alert = false;
                this.question = [];
                this.startAgainButton = true;

                this.$http.post(`api/finish`).then((res) => {});
            },
            fetchAll() {

                if (this.quiz_type === 2) {
                    return this.$http.post(`api/multiple-choice-quiz`)
                        .then((res) => {
                            this.result = res.data;
                        });
                } else {
                    return this.$http.post(`api/quotes`)
                        .then((res) => {
                            this.result = res.data;
                        });
                }
            }
        },
        mounted: function () {
            this.fetchAll();
        }
    }
</script>

<style>
    .box-card {
        width: 600px;
        height: 700px;
    }
    .quote{
        text-align: center;
        padding: 15px;
        background-color: #ff048c;
        color: #fff;
        line-height: 42px;
        font-size: 12pt;
    }
    #quiz b, .el-radio__label{
        color: #8b8d8b;
    }

    #quiz h4, #result, p{
        color: #656765;
    }
    .el-menu-item, .el-submenu__title {
        white-space: normal !important;
    }
    .el-button--primary{
        float: right;
        margin: 10px;
    }
    .el-card__body{
        text-align: center;
    }
    #result span{
        color: #e6a23c;
        margin-top: 20px;
    }
</style>
