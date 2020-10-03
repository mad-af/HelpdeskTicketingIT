<template>
    <section class="body">
        <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
        <div class="content">
            <Title v-bind="{ title: 'Profil' }" />
            <div class="sub-content">
                <Profil />
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
        padding: 35px 35px 20px;
        width: calc(100vw - 300px);
        height: calc(100vh - 80px);
    }
</style>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Sidebar: components.Sidebar,
        Title: components.Title,
        Profil: components.Profil
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