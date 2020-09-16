<template>
    <section class="body">
        <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
        <div class="content">
            <span>Tugas Laporan</span>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .body {
        margin: 0;
        display: flex;
    }
    .content {
        padding: 20px;
        width: calc(100vw - 300px);
    }
</style>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Sidebar: components.Sidebar
    },
    props: {
        Active: Object
    },
    data: function () {
        return {
        }
    }
}
</script>