<template>
        <div class="card" v-bind:style="{ width: width }">
            <div class="title">
                <span>{{ title.toUpperCase() }}</span>
            </div>
            <div>
                <slot />
            </div>
        </div>
</template>

<style lang="scss" scoped>
    .card {
        min-height: 10em;
        padding: 15px 20px;
        margin: 10px;
        border-radius: 8px;
        background: #fff;
        // position: initial;
        box-sizing:border-box;
    }
    .title {
        height: 35px;
        padding: 0 0 0 20px;
        margin: 0 0 15px;
        border-bottom: 1px solid #bcbcbc ;
    }
    .title span {
        font-size: 20px;
    }
</style>

<script>
export default {
    props: {
        width: String,
        title: String
    }
}
</script>