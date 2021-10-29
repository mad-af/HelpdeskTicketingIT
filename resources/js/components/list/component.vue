<template>
    <section class="list">
        <div class="sub-list">
            <div class="section">
                <div class="squere">
                    <div v-bind="{ class : data.action.toLowerCase() }" />
                </div>
                <span class="title">
                    {{ data.title }}
                </span>
            </div>
            <div class="section">
                <span class="id">
                    {{ data.id }}
                </span>
                <div class="level">
                    <span class="material-icons arrow" v-bind="{ class : data.level.toLowerCase() }">
                        keyboard_arrow_up
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .list {
        width: 100%;
        height: 38px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    .sub-list {
        width: 95%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .section {
        display: flex;
        align-items: center;
        font-size: 14px;
        line-height: 1;
    }
    .section .id {
        color: #828282;
    }
    .list:hover {
        background: #fafafa;
    }
</style>
    
<style lang="scss" scoped>
    .squere {
        width: 19px;
        height: 19px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 15px;
    }
    .squere .nothing {
        width: 15px;
        height: 5px;
        background: #c4c4c4;
    }
    .squere .todo {
        width: 19px;
        height: 19px;
        background: #c4c4c4;
    }
    .squere .progres {
        width: 19px;
        height: 19px;
        background: #378DF1;
    }
    .squere .done {
        width: 19px;
        height: 19px;
        background: #44D953;
    }
    .level {
        margin-left: 15px;
        display: flex;
        align-items: center;
    }
    .level .arrow {
        font-size: 28px;
    }
    .height {
        color: #f23619 !important;
    }
    .medium {
        color: #ffa710 !important;
    }
    .low {
        color: #81dc31 !important;
    }
</style>

<script>
export default {
    props: {
        data: Object
    },
    data: function () {
        return{
        }
    }
}
</script>