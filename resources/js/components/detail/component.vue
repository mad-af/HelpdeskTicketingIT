<template>
    <section>
        <div class="sub-title">
            <span class="id">
                {{ data.id }}
            </span>
            <div class="level">
                <span class="material-icons arrow" v-bind:class="data.level.toLowerCase()">
                    keyboard_arrow_up
                </span>
                <span>
                    {{ data.level.charAt(0) + data.level.toLowerCase().slice(1)}}
                </span>
            </div>
        </div>
        <div>
            <div class="title">
                {{ data.title }}
            </div>
        </div>
        <div v-bind:style="{ margin: '20px 0 0', 'user-select': 'none' }">
            <div class="button gray" ref="button" v-bind:class="{ cursor: !button[searchIndex('Tidak Ada', button)].isActive }" v-on:click="isButton = !isButton">
                <span> {{ button[searchIndex('Tidak Ada', button)].selected }} </span>
                <span class="material-icons">
                    keyboard_arrow_down
                </span>
            </div>
            <div>
                <div class="option" v-closable="{ exclude: ['button'], handler: 'closeButton'}" v-show="isButton && button[searchIndex('Tidak Ada', button)].isActive">
                    <div v-for="x in button[searchIndex('Tidak Ada', button)].option" :key="x" class="sub-option">
                        <span class="comon">
                            {{ x }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div  v-bind:style="{ margin: '0 0 5px' }">
                <span>Penerima Tugas</span>
            </div>
            <div>
                <div class="person">
                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <div class="nama">
                        <input type="text" ref="suggest" v-on:click="isSuggest = !isSuggest" v-model="search" placeholder="Tidak Ada" >
                    </div>
                </div>
                <div class="suggest scroll" v-on:click=" $refs.suggest.focus(); " v-show="isSuggest" v-closable="{ exclude: ['suggest'], handler: 'closeSuggest'}">
                    <!-- <div class="recomend">
                        <div class="item">
                            <div class="image">
                                <img src="" alt="">
                            </div>
                            <div class="nama">
                                Hello
                            </div>
                        </div>
                    </div> -->
                    <div class="item" v-for="x in filteredList" :key="x.name" v-on:click="chosePerson(x.name)" >
                        <div class="image">
                            <img src="" alt="">
                        </div>
                        <div class="nama">
                            {{ x.name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div v-bind:style="{ margin: '0 0 5px' }">
                <span>Deskripsi</span>
            </div>
            <div class="description">
                <slot />
            </div>
        </div>
    </section>    
</template>

<style lang="scss" scoped>
    .sub-title {
        display: flex;
        align-items: center;
        font-size: 13px;
        line-height: 1;
        color: #828282;
    }
    .level {
        height: 10px;
        margin-left: 15px;
        display: flex;
        align-items: center;
    }
    .level .arrow {
        font-size: 28px;
    }
    .height {
        color: #f23619 !important;
    }
    .medium {
        color: #ffa710 !important;
    }
    .low {
        color: #81dc31 !important;
    }
    .title {
        font-size: 24px;
    }
</style>

<style lang="scss" scoped>
    .button {
        padding: 10px;
        width: 115px;
        height: 35px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #cdcdcd;
        border-radius: 3px;
        font-size: 12px;
        line-height: 1;
        cursor: pointer;
    }
    .option {
        width: 130px;
        padding: 3px;
        position: absolute;
        border: .5px solid #e3e3e3;
        border-radius: 3px;
        font-size: 13px;
        background: #fff;
        z-index: 1;
    } 
    .sub-option {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-direction: column;
        cursor: pointer;
    }
    .sub-option span {
        padding: 0 0 0 20px;
        width: 100%;
        height: 30px;
        display: flex;
        align-items: center;
    }
    .sub-option span:hover {
        background: #fafafa;
    }
</style>

<style lang="scss" scoped>
    .section {
        width: 95%;
        margin: 20px 0 0;
        position: relative;
    }
    .person {
        width: 100%;
        height: 45px;
        display: flex;
        align-items: center;
        font-size: 12px;
    }
    .image {
        width: 38px;
        height: 38px;
        background-color: #c4c4c4;
        border-radius: 100%;
    }
    .nama {
        width: calc(95% - 38px - 10px);
        margin: 0 0 0 10px;
    }
    .nama input {
        width: 100%;
        padding: 2px;
        border: none;
        font-size: 12px;
        color: #8a8a8a;
        border-bottom: 1px solid transparent;
    }
    .nama input:focus {
        outline: none;
        border-bottom: 1px solid #e3e3e3;
    }
    .nama input:focus::placeholder {
        color: transparent;
    }
    .person:hover, .person:hover input {
        background: #fafafa !important;
    }
</style>

<style lang="scss" scoped>
    .suggest {
        width: 100%;
        height: 150px;
        padding: 3px 0;
        position: absolute;
        background: #fff;
        border: .5px solid #e3e3e3;
        border-radius: 3px;
        z-index: 1;
    }
    .item {
        width: 100%;
        height: 40px;
        padding: 0 0 0 23px;
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    .item .image {
        width: 32px;
        height: 32px;
    }
    .item .nama {
        color: #8a8a8a;
        font-size: 12px;
        line-height: 1;
    }
    .recomend {
        margin: 0 0 3px ;
        padding: 0 0 3px ;
        border-bottom: .5px solid #f4f4f4;
    }
    .item:hover {
        background: #fafafa;
    }
</style>

<style lang="scss" scoped>
    .gray {
        color: #808080;
    }
    .white {
        color: #fff;
    }
    .comon {
        color: #808080;
        font-weight: 500;
    }
    .pross {
        color: #378DF1;
        font-weight: 500;
    }
    .cursor {
        cursor: default;
    }
</style>

<script>
let handleOutsideClick
export default {
    props: { 
        person: Object,
        data: Object
    },
    data: function () {
        return {
            search: '',
            chose: null ,
            isButton : false,
            isSuggest: false,
            button : [
                {
                    selected: 'Tidak Ada',
                    option: [],
                    class: 'common',
                    isActive: false
                },
                {
                    selected: 'To Do',
                    option: ['Process', 'Done'],
                    class: 'common',
                    isActive: true
                },
                {
                    selected: 'Process',
                    option: ['To Do', 'Done'],
                    class: 'process',
                    isActive: true
                },
                {
                    selected: 'Done',
                    option: ['To Do', 'Process'],
                    class: 'Done',
                    isActive: true
                }
            ],
        }
    },
    created: function () {
    },
    methods: {
        searchIndex: function (key, array) {
            for (var i=0; i < array.length; i++) {
                if (array[i].selected === key) {
                    return i;
                }
            }
        },
        chosePerson: function (param) {
            this.search = param
            this.isSuggest = false
        },
        closeButton: function () {
            this.isButton = false
        },
        closeSuggest: function () {
            this.isSuggest = false
        }
    },
    computed: {
        filteredList() {
            return this.person.data.filter(post => {
                return post.name.toLowerCase().includes(this.search.toLowerCase())
            })
        },
        
    },
    directives:{
        closable :{
            bind (el, binding, vnode) {
                handleOutsideClick = (e) => {
                e.stopPropagation()
                const { handler, exclude } = binding.value
                let clickedOnExcludedEl = false
                exclude.forEach(refName => {
                    if (!clickedOnExcludedEl) {
                    const excludedEl = vnode.context.$refs[refName]
                    clickedOnExcludedEl = excludedEl.contains(e.target)
                    }
                })
                if (!el.contains(e.target) && !clickedOnExcludedEl) {
                    vnode.context[handler]()
                }
                }
                document.addEventListener('click', handleOutsideClick)
                document.addEventListener('touchstart', handleOutsideClick)
            },

            unbind () {
                document.removeEventListener('click', handleOutsideClick)
                document.removeEventListener('touchstart', handleOutsideClick)
            }
        }
    }
}
</script>
