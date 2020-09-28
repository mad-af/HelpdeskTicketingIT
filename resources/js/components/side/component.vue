<template>
    <section class="side">
        <div class="content scroll">
            <slot />
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .side {
        margin: 15px 0 0 21px;
        width: 300px;
        height: calc(100vh - 150px - 27px);
        background: #fff;
        border-radius: 8px;
    }
    .content {
        width: 100%;
        height: 100%;
        padding: 50px 15px 100px;
    }
</style>

<script>
export default {
    
}
</script>