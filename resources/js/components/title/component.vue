<template>
    <span>
        {{title}}
    </span>
</template>

<style lang="scss" scoped>
    span {
        font-size: 36px;
        line-height: 20px;
    }
</style>

<script>
export default {
    props: {
        title: String
    }
}
</script>