<template>
    <section>
        <Navbar />
        <div class="body">
            <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
            <div class="content scroll">
                <Title v-bind="{ title: 'Dashboard' }" />
                <div class="sub-content">
                    <div class="column">
                        <SimpleCard v-bind="{ title: 'tugas' }">
                            <TaskInfo />
                        </SimpleCard>
                        <SimpleCard v-bind="{ title: 'tugas ku' }">
                            <ListMyTask class="list" v-for="x in list" :key="x.id" 
                                v-on:click.native="task(x.id)" 
                                v-bind="{ data: x }" 
                            />
                        </SimpleCard>
                    </div>
                    <div class="column">
                        <SimpleCard style="flex: 60%" v-bind="{ title: 'kalender'}">
                            <Calendar />
                        </SimpleCard>
                        <SimpleCard style="flex: 40%" v-bind="{ title: 'Peristiwa'}">
                            nothing
                        </SimpleCard>
                    </div>
                </div>
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
        width: initial;
        display: flex;
        flex-wrap: wrap;
        position: relative;
    }
    .column {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
    }
    .column:nth-child(1) {
        flex: 65%;
    }
    .column:nth-child(2) {
        flex: auto;
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
        Navbar: components.Navbar,
        Sidebar: components.Sidebar,
        Title: components.Title,
        SimpleCard: components.SimpleCard,
        TaskInfo: components.TaskInfo,
        Calendar: components.Calendar,
        ListMyTask: components.ListMyTask
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
            ],
        }
    }
}
</script>