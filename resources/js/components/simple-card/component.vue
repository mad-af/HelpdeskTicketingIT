<template>
    <section>
        <div class="card" v-bind:style="{ width: width }">
            <div class="title">
                <span>{{ title }}</span>
            </div>
            <div>
                <slot />
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .card {
        padding: 15px 20px;
        border-radius: 8px;
        background: #fff;
    }
    .title {
        height: 35px;
        padding: 0 0 0 20px;
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