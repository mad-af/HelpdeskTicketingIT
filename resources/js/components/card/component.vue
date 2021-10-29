<template>
    <section class="card">
        <div class="button" v-on:click="dropDown()">
            <div >
                <span class="title"> {{ title }} </span>
                <span class="issues"> {{ issues }} issues </span>
            </div>
            <div class="sub-button">
                <span class="material-icons arrow"  v-bind:style="{ transform: arrow }">
                        keyboard_arrow_down
                </span>
            </div>
        </div>
        <div class="contents" v-show="isOpen">
            <slot />
        </div>
    </section>
</template>

<style lang="scss" scoped>
 .card {
    background: #fff;
    border-radius: 8px;
 }
 .button {
    width: 100%;
    height: 80px;
    padding: 0 55px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
 }
 .sub-button {
     display: flex;
     align-items: center;
 }
 .button .title {
    font-size: 20px;
    line-height: 1;
 }
 .button .issues {
    margin: 0 0 0 38px ;
    font-size: 13px;
    line-height: 1;
    color: #ccc;
 }
 .button .arrow {
    font-size: 35px;
    color: #e3e3e3;
 }
 .contents {
    padding: 10px 26px 31px;
    background: #fff;
 }
</style>

<script>
export default {
    props: {
        title: String,
        issues: String
    },
    data: function () {
        return {
            isOpen: false,
            arrow: ''
        }
    },
    methods: {
        dropDown: function () {
            if (!this.isOpen || this.isOpen === false){
                this.isOpen = true;
                this.arrow = 'rotate(180deg)';
            } else {
                this.isOpen = false;
                this.arrow = 'none';
            }  
        }
    }
}
</script>