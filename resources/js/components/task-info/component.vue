<template>
    <section>
        <div class="content">
            <div class="section">
                <span class="number">99</span>
                <span class="title">Task</span>
            </div>
            <div class="section">
                <span class="number">99</span>
                <span class="title">To Do</span>
            </div>
            <div class="section">
                <span class="number">99</span>
                <span class="title">Proccess</span>
            </div>
            <div class="section">
                <span class="number">99</span>
                <span class="title">Done</span>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .content {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }
</style>

<style lang="scss" scoped>
    .section {
        height: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .number {
        margin: -10px 0 0;
        line-height: 1;
        font-size: 60px;
        color: #378DF1;
    }
    .title {
        line-height: 1;
        font-size: 14px;
        color: #aaa;
    }
</style>

<script>
export default {
    
}
</script>