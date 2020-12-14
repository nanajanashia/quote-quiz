<template>
    <el-row>
        <el-card class="box-card">
            <div id="quiz">
                <h4>Statistics view</h4>
                <el-row>
                    Number of users played the game
                    <el-button circle>{{result['number_of_users']}}</el-button><br>
                    % of users finished the game
                    <el-button type="info" circle>{{ Number((result['number_of_users_completed'] / result['number_of_users'] *100).toFixed(0))}} %</el-button><br>
                    % of correct answers
                    <el-button type="success" circle>{{ Number((result['number_of_correct_answers'] / (result['number_of_incorrect_answers'] + result['number_of_correct_answers']) * 100).toFixed(0))}} %</el-button><br>
                    % of incorrect answers
                    <el-button type="warning" circle>{{ Number((result['number_of_incorrect_answers'] / (result['number_of_incorrect_answers'] + result['number_of_correct_answers']) * 100).toFixed(0))}} %</el-button>
                </el-row>

            </div>
        </el-card>

    </el-row>
</template>
<script>
    export default {
        data() {
            return {
                result: {},
            };
        },
        mounted: function () {
            return this.$http.post(`api/statistics`)
                .then((res) => {
                    this.result = res.data;
                });
        }
    }
</script>

<style>
    .box-card {
        width: 600px;
        height: 700px;
    }
    #quiz{
        text-align: left;
    }
</style>
