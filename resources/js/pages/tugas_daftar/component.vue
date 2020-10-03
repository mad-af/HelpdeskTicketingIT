<template>
    <section class="body">
        <Sidebar id="sidebar" v-bind="{ itemActive: Active }" />
        <div class="content scroll">
            <Title v-bind="{ title: 'Daftar Tugas' }" />
            <div class="sub-content">
                <div class="card">
                    <Card v-bind="{ title: 'Tugas', issues: '4' }">
                        <List class="list" v-for="x in list" :key="x.id" v-on:click.native="task(x.id)" v-bind="{ data: x }" v-bind:class="x.id===open.id ? 'active' : '' " />
                    </Card>
                </div>
                <Side v-show="open.isOpen">
                    <Detail v-bind="{ data: data, person: person }" >
                        <Editor v-bind="{ contents: contents }" />
                    </Detail>
                </Side>
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
    .sub-content {
        margin: 15px 0 0;
        display: flex;
        justify-content: space-between;
    }
    .card{
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
    .active {
        background: #2a5dde25;
    }
    .active:hover {
        background: #2a5dde25;
    }
</style>

<script>
import { components } from "../../components/index"

export default {
    components: {
        Sidebar: components.Sidebar,
        Title: components.Title,
        Card: components.Card,
        List: components.List,
        Side: components.Side,
        Detail: components.Detail,
        Editor: components.Editor
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
            open: {
                id: null,
                isOpen: false
            },
            person : {
                selected: 'Tidak Ada',
                login: 'Mochamad Atha',
                data: [
                    {
                        name: 'Mochamad Aufa'
                    },
                    {
                        name: 'Mochamad Atha'
                    },
                    {
                        name: 'Marwidianto'
                    },
                    {
                        name: 'Lis Purwinarti'
                    },
                ]
            },
            contents: "<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by look even slightly believable.</p><ol><li>If you are going to use a passage </li><li>you need to be sure there isn't anything</li><li>embarrassing hidden in the middle of text.</li><li>All the Lorem Ipsum generators </li><li>Internet tend to repeat predefined chunks as necessary, making this the first true generator.</li></ol>",
            data: null
        }
    },
    methods: {
        task: function (param) {
            if(param === this.open.id) {
                return this.open = { id: null, isOpen: false }  
            } 
            const index = this.searchIndexById(param, this.list)
            this.data = this.list[index]
            console.log(this.data);
            return this.open = { id: this.list[index].id, isOpen: true }
        },
        searchIndexById: function (key, array) {
            for (var i=0; i < array.length; i++) {
                if (array[i].id === key) {
                    return i;
                }
            }
        },
    }
}
</script>