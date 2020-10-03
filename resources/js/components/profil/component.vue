<template>
    <section>
        <div class="button">
            <button v-show="!isActive" v-on:click="editButton()" style="background: #378DF1;">Edit</button>
            <div>
                <button v-show="isActive" v-on:click="editButton()" style="background: #44D953;">Simpan</button>
                <button v-show="isActive" v-on:click="editButton()" style="background: #fff; color: #ed4848;">Batal</button>
            </div>
        </div>
        <div class="profil">
            <div class="image">
                <div class="img">
                    <div v-show="isActive">
                        <label for="imgButton">MENGGANTI FOTO PROFIL</label>
                        <input type="file" v-on:change="fileSelected" id="imgButton" accept="image/*">
                    </div>
                    <img v-bind="{ src : slotImage ? slotImage : data.image }" alt="">
                </div>
            </div>
            <div class="biodata">
                <div class="data">
                    <span>Nama</span>
                    <div>
                        <div v-show="!isActive">{{ data.name }}</div>
                        <input type="text" v-model="data.name" v-show="isActive">
                    </div>
                </div>
                <div class="data">
                    <span>Jabatan</span>
                    <div>
                        <div v-show="!isActive">{{ data.position }}</div>
                        <input type="text" v-model="data.position" v-show="isActive">
                    </div>
                </div>
                <div class="data">
                    <span>No. Telepon</span>
                    <div>
                        <div v-show="!isActive">{{ data.phone }}</div>
                        <input type="text" v-model="data.phone" v-show="isActive">
                    </div>
                </div>
                <div class="data">
                    <span>TTL</span>
                    <div>
                        <div v-show="!isActive">{{ data.ttl }}</div>
                        <input type="text" v-model="data.ttl" v-show="isActive">
                    </div>
                </div>
                <div class="data">
                    <span>Alamat</span>
                    <div>
                        <div v-show="!isActive">{{ data.address }}</div>
                        <textarea v-show="isActive" v-model="data.address" />
                    </div>
                </div>
            </div>          
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .profil {
        width: 100%;
        height: 100%;
        padding: 30px 20px 20px;
        background: #fff;
        border-radius: 8px;
        display: flex;
    }
    .image {
        width: 20em;
        min-height: 15em;
        padding: 0 0 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .image .img {
        width: 165px;
        height: 165px;
        border-radius: 100%;
        position: relative;
    }
    .image .img img {
        width: 100%;
        height: 100%;
        border-radius: 100%;
    }
    .image .img input[type="file"] {
        width: 100%;
        height: 100%;
        display: none;
    }
    .image .img label {
        width: 100%;
        height: 100%;
        padding: 5px;
        display: flex;
        align-items: center;
        text-align: center;
        font-size: 13px;
        color: #cbcbcb;
        background: #55555589;
        position: absolute;
        border-radius: 100%;
        z-index: 1;
        cursor: pointer;
    }
    .image .img label:hover {
        color: #f2f2f2;
        background: #55555597;
    }
</style>

<style lang="scss" scoped>
    .biodata {
        height: 300px;
        padding: 30px 60px 30px 20px;
        flex: auto;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
    }
    .data {
        width: 250px;
        height: 80px;
    }
    .data:nth-last-child(1) {
        min-height: 80px;
    }
    .data span {
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
    .data textarea {
        width: 100%;
        min-height: 90px;
        padding: 5px;
        font: 400 16px lato;
        color: #777;
        border: 1px solid #e3e3e3;
        border-radius: 5px;
        resize: none;
    }
    .data input:focus, .data textarea:focus {
        outline: none;
        border: 1px solid #378DF1;
    }
</style>

<style lang="scss" scoped>
    .button {
        margin: 0 0 10px;
        float: right;
    }
    .button button {
        width: 90px;
        height: 35px;
        font: 400 13px lato;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }
    button:focus {
        outline: none;
    }
</style>

<script>
export default {
    data: function () {
        return {
            isActive: false,
            slotImage: '',
            data: {
                name: 'Mochamad Atha',
                position: 'Direktur',
                phone: '085231829213',
                ttl: 'Kediri, 05 January 1995',
                address: 'Jl. Raya Kanigoro, Kras, Kec. Kras, Kediri, Jawa Timur 64172',
                image: 'https://www.w3schools.com/w3images/architect.jpg'
            }
        }
    },
    methods: {
        editButton: function () {
            this.isActive = !this.isActive
        },
        fileSelected(event){
            const file = event.target.files.item(0);
            const reader = new FileReader();
            reader.addEventListener('load', this.imageLoaded);
            reader.readAsDataURL(file);
        },
        imageLoaded(event){
            this.slotImage = event.target.result;
        },
    }
}
</script>