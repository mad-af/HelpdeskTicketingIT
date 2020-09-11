<template>
    <section class="sidebar" id="sidebar">
        <div class="sidebar-items">

            <div v-for="x in sidebar" :key="x.name" >
                <div class="items" v-bind:class="{ active: x.isActive }" v-on:click=" x.dropdown ? dropDown('notif') : to='#'">
                    <span class="material-icons icon">
                        {{ x.icon }}
                    </span>
                    <span v-bind:style="{ 'width': '110px' }">{{ x.name }}</span>
                    <span class="material-icons arrow" v-bind:style="{ 'padding': '0', transform: arrowTransform }" v-show="x.dropdown" >
                        keyboard_arrow_down
                    </span>
                </div>
                <div v-for="y in x.dropdownItems" :key="y" class="items-dropdown" v-show="isOpen && x.dropdown">
                    <span>{{ y }}</span>
                </div>
            </div>

        </div>
    </section>
</template>

<style lang="scss" scoped>
    .sidebar {
        width: 300px;
        height: calc(var(--vh, 1vh) * 100);
        display: flex;
        background: #fff;
    }
    .sidebar-items {
        width: 100%;
        height: 100%;
        padding: 35px 0 0 ;
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
    .items-dropdown {
        padding: 0 0 0 9em;
        display: flex;
        flex-direction: column;
        font-size: 13px;
        border-left: 5px solid #2A5CDE;
        cursor: pointer;
    }
    .items-dropdown span {
        padding: 5px 0;
    }
    .items-dropdown:hover {
        color: #2A5CDE;
    }
</style>


<script>
export default {
    data: function () {
        return {
            isOpen: false,
            arrowTransform: 'none',
            itemActive: '',
            sidebar: [
                {
                    name: 'Pengaturan',
                    icon: 'settings',
                    dropdown: false,
                    
                },
                {
                    name: 'Keluar',
                    icon: 'exit_to_app',
                    dropdown: false,
                    
                }
            ]
        }
    },
    created: function () {
        this.conditionLevel('ADMIN');
        this.sidebarActive(this.itemActive);
    },
    methods: {
        conditionLevel: function (param) {
            switch(param) {
                case 'USER':
                    this.itemActive = 'My Task'
                    this.sidebar.unshift(
                        {
                            name: 'My Task',
                            icon: 'article',
                            dropdown: false,
                            
                        }
                    )
                    break;
                case 'ADMIN':
                    this.itemActive = 'Dashboard'
                    this.sidebar.unshift(
                        {
                            name: 'Dashboard',
                            icon: 'dashboard',
                            dropdown: false,
                            
                        },
                        {
                            name: 'Tugas',
                            icon: 'list',
                            dropdown: true,
                            dropdownItems: ['Daftar Tugas', 'Laporan'],
                            
                        }
                    )
                    break;
            }
        },
        sidebarActive: function (param) {
            let index = this.searchIndexByName(param, this.sidebar);
            this.sidebar[index].isActive = true;
        },
        searchIndexByName: function (key, array) {
            for (var i=0; i < array.length; i++) {
                if (array[i].name === key) {
                    return i;
                }
            }
        },
        dropDown: function (param) {
            if (!this.isOpen || this.isOpen === false){
                this.isOpen = true;
                this.arrowTransform = 'rotate(180deg)';
            } 
            else {
                this.isOpen = false;
                this.arrowTransform = 'none';
            }  
        }
    }
}
</script>