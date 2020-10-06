<template>
    <section class="body">
        <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
        <div class="content">
            <Title v-bind="{ title: 'Dashboard' }" />
            <div class="sub-content">
                <SimpleCard v-bind="{ width: '65%', title: 'TUGAS' }">
                    <Task />
                </SimpleCard>
                <SimpleCard>
                    
                </SimpleCard>
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
    .sub-content {
        margin: 15px 0 0;
    }
</style>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Sidebar: components.Sidebar,
        Title: components.Title,
        SimpleCard: components.SimpleCard,
        Task: components.Task
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