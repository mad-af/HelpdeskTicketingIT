<template>
    <section>
        <Navbar />
        <div class="body">
            <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
            <div class="content">
                <Title v-bind="{ title: 'Tugas Laporan' }" />
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .body {
        margin: 0;
        display: flex;
    }
    .content {
        padding: 35px;
        width: calc(100vw - 300px);
    }
</style>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Navbar: components.Navbar,
        Sidebar: components.Sidebar,
        Title: components.Title
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