<template>
    <section>
        <div class="body">
            <div class="image">
                <img src="https://image.freepik.com/free-vector/modern-call-center-isometric-design_23-2147950319.jpg" alt="">
            </div>
            <div class="login">
                <div class="logo">
                    <span class="material-icons icon">
                        live_help
                    </span>
                    <span>
                        HELPDESK
                    </span>
                </div>
                <div class="formulir">
                    <span>Selamat datang, Silahkan Masuk!</span>
                    <form action="">
                        <div class="data">
                            <label>Username</label>
                            <input type="text">
                        </div>
                        <div class="data">
                            <label>Password</label>
                            <input type="password">
                        </div>
                        <button>Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .body {
        margin: 0;
        height: 100vh;
        width: 100vw;
        display: flex;
        align-items: center;
    }
    .image {
        display: flex;
        flex: 70%;
        justify-content: center;
        align-items: center;
    }
    .login {
        height: 100%;
        padding: 2em 0 3em 2em;
        flex: auto;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        background: #fff;
    }
    .logo {
        font-size: 40px;
        font-weight: 900;
        display: flex;
        align-items: center;
    }
    .logo .icon {
        font-size: 1.8em;
        color: #378DF1;
    }
    .logo .icon, .logo span {
        margin: 5px;
    }
    .formulir {
        margin: 2em 0 0 1.5em;
        font-size: 1.03em;
    }
    .data {
        padding: .5em 0 0;
    }
    .data label {
        color: #aaa;
        font-size: 14px;
    }
    .data input {
        width: 100%;
        padding: 5px;
        font: 400 16px lato;
        color: #777;
        border: 1px solid #e3e3e3;
        border-radius: 5px;
    }
    .data input:focus{
        outline: none;
        border: 1px solid #378DF1;
    }
    button {
        margin: 2em 0 0;
        width: 100%;
        height: 35px;
        font: 400 13px lato;
        border: none;
        background: #378DF1;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<script>
export default {
    
}
</script>