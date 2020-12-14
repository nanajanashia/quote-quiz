<template>
    <el-row>
        <el-card class="box-card">
            <div id="quiz">
                <h4>Change mode</h4>
                <el-row>
                    <el-switch
                        v-model="binary"
                        inactive-text="Binary (Yes/No)"
                        active-color="#13ce66"
                        @change="changeBinaryMode()">
                    </el-switch>
                    <el-switch
                        v-model="multiple"
                        active-color="#13ce66"
                        inactive-text="Multiple choice questions"
                        @change="changeMultipleMode()">
                    </el-switch>
                </el-row>
            </div>
        </el-card>

    </el-row>
</template>
<script>
    export default {
        data() {
            return {
                binary: true,
                multiple: false,
            };
        },
        methods: {
            changeBinaryMode() {
                this.multiple = (!this.binary);
                this.updateQuizType();
            },
            changeMultipleMode() {
                this.binary = (!this.multiple);
                this.updateQuizType();
            },
            updateQuizType() {
                this.$emit('changeQuizType', (this.binary) ? 1 : 2);
            }
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
    #quiz b, .el-radio__label{
        color: #8b8d8b;

    }
    .el-switch{
        display:block;
        margin:10px;
    }
    .el-switch span{
        color: #e6a23c;
    }
</style>
