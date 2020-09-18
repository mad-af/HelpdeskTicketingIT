<template>
    <section class="body">
        <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
        <div class="content scroll">
            <Title v-bind="{ title: 'Daftar Tugas' }" />
            <Card v-bind="{ title: 'Tugas', issues: '4' }">
                <List class="list" v-for="x in list" :key="x.id" v-bind="{ data: x }" />
            </Card>
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
        height: calc(100vh - 80px);
    }
    .list {
        border-left: .5px solid #e3e3e3;
        border-right: .5px solid #e3e3e3;
        border-bottom: .5px solid #e3e3e3;
    }
    .list:nth-child(1) {
        border-top: .5px solid #e3e3e3;
    }
</style>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Sidebar: components.Sidebar,
        Title: components.Title,
        Card: components.Card,
        List: components.List
    },
    props: {
        Active: Object
    },
    data: function () {
        return {
            list: [
                {
                    id: 'TGS-4312',
                    title: 'Develop - Create Plikasi',
                    action: 'NOTHING',
                    level: 'MEDIUM'
                },
                {
                    id: 'TGS-4313',
                    title: 'Develop - Update Plikasi',
                    action: 'PROGRES',
                    level: 'HEIGHT'
                },
                {
                    id: 'TGS-4314',
                    title: 'Develop - Delete Plikasi',
                    action: 'TODO',
                    level: 'MEDIUM'
                },
                {
                    id: 'TGS-4315',
                    title: 'Develop - Release Plikasi',
                    action: 'DONE',
                    level: 'HEIGHT'
                },
            ]
        }
    }
}
</script>