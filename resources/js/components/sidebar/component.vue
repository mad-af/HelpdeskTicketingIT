<template>
    <section class="sidebar scroll" id="sidebar">
        <div class="sidebar-items">

            <div v-for="x in sidebar" :key="x.name" >
                <div class="items" v-bind:class="{ active: x.isActive }" v-on:click=" x.dropdown.isActive ? dropDown(x.name) : redirect(x.url)">
                    <span class="material-icons icon">
                        {{ x.icon }}
                    </span>
                    <span v-bind:style="{ 'width': '110px' }">{{ x.name }}</span>
                    <span class="material-icons arrow" v-bind:style="{ 'padding': '0', transform: x.dropdown.set.arrow }" v-show="x.dropdown.isActive" >
                        keyboard_arrow_down
                    </span>
                </div>
                <div class="dropdown" v-show="x.dropdown.set.isOpen && x.dropdown.isActive">
                    <div v-for="y in x.dropdown.items" :key="y.name" class="items-dropdown" v-bind:class="{ active: y.isActive }" v-on:click="redirect(y.url)">
                        <span>{{ y.name }}</span>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>

<style lang="scss" scoped>
    .sidebar {
        width: 300px;
        height: calc(100vh - 5em);
        display: flex;
        background: #fff;
    }
    .sidebar-items {
        width: 100%;
        height: 100%;
        padding: 35px 0 50px ;
        display: block;
    }
    .items {
        height: 95px;
        display: flex;
        flex-direction: row;
        align-items: center;
        border-left: 5px solid transparent;
        border-bottom: .5px solid #e3e3e3;
        cursor: pointer;
    }
    .items span {
        padding: 0 0 0 35px;
    }
    .icon {
        font-size: 55px;
    }
    .arrow {
        left: 245px;
        position: absolute;
        color: #e3e3e3;
        font-size: 35px;
    }
    .items .arrow {
        background: transparent !important;
    }
    .items:hover, .items:hover .arrow {
        color: #2A5CDE;
        background: #2a5dde05;
        border-left-color: #2A5CDE;
    }
    
    .active {
        color: #2A5CDE;
        background: #2a5dde05;
        border-left-color: #2A5CDE;
    }
</style>

<style lang="scss">
    .dropdown {
        padding: 5px 0;
        border-left: 5px solid #2A5CDE;
    }
    .items-dropdown {
        padding: 0 0 0 9em;
        display: flex;
        flex-direction: column;
        font-size: 13px;
        background: transparent !important;
        cursor: pointer;
    }
    .items-dropdown span {
        padding: 5px 0;
    }
    .items-dropdown:hover {
        color: #2A5CDE;
    }
    .items-dropdown .active {
        color: #2A5CDE;
    }
</style>

<script>
export default {
    props: { 
        itemActive: {type:Object}
     },
    data: function () {
        return {
            sidebar: [
                {
                    name: 'Profil',
                    icon: 'person_outline',
                    dropdown: {
                        items: [],
                        set: {
                            arrow: 'none',
                            isOpen: false
                        },
                        isActive: false
                    },
                    url: 'Profil',
                    isActive: false
                },
                {
                    name: 'Keluar',
                    icon: 'exit_to_app',
                    dropdown:{
                        items: [],
                        set: {
                            arrow: 'none',
                            isOpen: false
                        },
                        isActive: false
                    },
                    url: 'Keluar',
                    isActive: false
                }
            ]
        }
    },
    created: function () {
        this.conditionLevel('ADMIN');
        this.sidebarActive(this.$props.itemActive);
    },
    methods: {
        conditionLevel: function (param) {
            switch(param) {
                case 'USER':
                    this.sidebar.unshift(
                        {
                            name: 'My Task',
                            icon: 'article',
                            dropdown: {
                                items: [],
                                set: {
                                    arrow: 'none',
                                    isOpen: false
                                },
                                isActive: false
                            },
                            url: 'My Task',
                            isActive: false
                        }
                    )
                    break;
                case 'ADMIN':
                    this.sidebar.unshift(
                        {
                            name: 'Dashboard',
                            icon: 'dashboard',
                            dropdown: {
                                items: [],
                                set: {
                                    arrow: 'none',
                                    isOpen: false,
                                },
                                isActive: false
                            },
                            url: 'Dashboard',
                            isActive: false
                        },
                        {
                            name: 'Tugas',
                            icon: 'list',
                            dropdown:{
                                items: [
                                    { 
                                        name: 'Daftar Tugas',
                                        url: 'Tugas.daftarTugas',
                                        isActive: false
                                    },
                                    { 
                                        name: 'Laporan',
                                        url: 'Tugas.laporan',
                                        isActive: false
                                    },
                                ],
                                set: {
                                    arrow: 'none',
                                    isOpen: false
                                },
                                isActive: true
                            },
                            url: 'Tugas',
                            isActive: false
                        }
                    );
                    break;
            }
        },
        sidebarActive: function (param) {
            const index = this.searchIndexByName(param.item, this.sidebar);
            const dd = this.sidebar[index];
            if (param.dropdown.isActive) {
                const ddIndex = this.searchIndexByName(param.dropdown.item, dd.dropdown.items);
                dd.dropdown.items[ddIndex].isActive= true;
                dd.dropdown.set.isOpen= true;
            }
            return dd.isActive = true;
        },
        searchIndexByName: function (key, array) {
            for (var i=0; i < array.length; i++) {
                if (array[i].name === key) {
                    return i;
                }
            }
        },
        redirect: function (param) {
            return this.$router.push({ name: param }).catch(err => err);          
        },
        resetActive: function () {
            for (var i=0; i < this.sidebar.length; i++) {
                if (this.sidebar[i].isActive = true) {
                    return this.sidebar[i].isActive = false;
                }
                if (this.sidebar[i].dropdown.isActive = true) {
                    for (var x=0; x<this.sidebar[i].dropdown.items.length; x++) {
                        if (this.sidebar[i].dropdown.items[x].isActive = true) {
                            return this.sidebar[i].dropdown.items[x].isActive = false
                        }
                    }
                }
            }
        },
        dropDown: function (param) {
            let index = this.searchIndexByName(param, this.sidebar);
            const dropdown = this.sidebar[index].dropdown.set;
            if (!dropdown.isOpen || dropdown.isOpen === false){
                dropdown.isOpen = true;
                dropdown.arrow = 'rotate(180deg)';
            } 
            else {
                dropdown.isOpen = false;
                dropdown.arrow = 'none';
            }  
        }
    }
}
</script>