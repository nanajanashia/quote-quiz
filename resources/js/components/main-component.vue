<template>
    <div>
        <el-menu
            :default-active="activeIndex"
            class="el-menu-demo"
            mode="horizontal"
            @select="handleSelect"
            background-color="#545c64"
            text-color="#fff"
            active-text-color="#ffd04b">
            <el-menu-item index="1">Main
                <quiz v-if="activeIndex === '1'" :quiz_type="quiz_type"></quiz>
            </el-menu-item>
            <el-menu-item index="2">Settings
                <settings v-if="activeIndex === '2'" v-on:changeQuizType="updateQuizType($event)"></settings>
            </el-menu-item>
            <el-menu-item index="3">Statistics
                <statistics v-if="activeIndex === '3'"></statistics>
            </el-menu-item>
        </el-menu>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                quiz_type: 1,
                activeIndex: '1',
            };
        },
        methods: {
            handleSelect(key) {
                this.activeIndex = key;
            },
            updateQuizType(type){
                this.quiz_type = type;
            }
        }
    }
</script>
