<template>
  <nav>
    <div class="navbar">

      <div class="Brand">
        <span>HelpdeskTicketingIT</span>
      </div>

      <div class="component">
        <div >
          <div class="component-user" v-on:click="dropDown('user')">
            <div class="avatar">
              <div>MA</div>
            </div>
            <span>Mochamad Atha</span>
          </div>
          <div class="dropdown" v-bind:style="{ 'min-width': '160px' }" v-show="isOpenUser">
            <div class="dropdown-subs" v-bind:style="{ 'height': '3em' }">
              <span class="material-icons icon" v-bind:style="{ 'font-size': '28px' }">
                exit_to_app
              </span>
              <span>Log Out</span>
            </div>
          </div>
        </div>

        <div>
          <div class="component-notif" v-on:click="dropDown('notif')">
            <span class="material-icons notif" v-bind:style="{ color: colorNotif }">
              notifications
            </span>
          </div>
          <div class="dropdown" v-bind:style="{ 'width': '30em', 'right': '1.5em' }" v-show="isOpenNotif">
            <div class="dropdown-subs" v-bind:style="{ 'height': '4em', 'font-size': '15px' }">
              <span class="material-icons icon" v-bind:style="{ 'font-size': '40px' }">
                account_circle
              </span>
              <span>Hi, permintaanmu sedang kami proses</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </nav>
</template>

<style lang="scss" scoped>
  nav {
    width: 100vw;
    height: 5em;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-bottom: .5px solid #e3e3e3;
  }
  .navbar {
    width: 90%;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .component {
    width: 20%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: row;
  }
  .component-user{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-direction: row;
    cursor: pointer;
  }
  .avatar {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 100%;
    background: blue;
    color: white;
    font-size: 20px;
  }
  .component-user span {
    max-width: 10em;
    padding: 0 0 0 15px;
  }
  .component-notif {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .notif {
    font-size: 30px;
    cursor: pointer;
  }
</style>

<style lang="scss" scoped>
  .dropdown {
    top: 4.5em;
    padding: 5px;
    display: flex;
    flex-direction: row;
    position: absolute;
    background-color: #fff;
    border: .5px solid #e3e3e3;
    border-radius: 5px;
    z-index: 1;
  }
  .dropdown-subs {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
    cursor: pointer;
  }
  .dropdown-subs:hover {
    background: #fafafa;
  }
  .dropdown-subs span {
    padding: 0 0 0 15px;
  }
  .dropdown-subs .icon {
    color: #e3e3e3;
  }
</style>

<script>
export default {
  data: function () {
    return {
      isOpenUser: false,
      isOpenNotif: false,
      colorNotif: '#e3e3e3'
    }
  },
  computed: {
    computedOpenUser: function () {
      return this.isOpenUser
    },
    computedOpenNotif: function () {
      return this.isOpenNotif;
    }
  },
  methods: {
    dropDown: function (param) {
      switch(param) {
        case 'user':
          if (!this.isOpenUser || this.isOpenUser === false){
            this.isOpenUser = true;
            this.isOpenNotif = false;
          } 
          else {
            this.isOpenUser = false;
          }  
          break;
        case 'notif':
          if (!this.isOpenNotif || this.isOpenNotif === false){
            this.isOpenNotif = true;
            this.colorNotif = '#cdcdcd'
            this.isOpenUser = false;
          } 
          else {
            this.isOpenNotif = false;
            this.colorNotif = '#e3e3e3'
          }  
          break;
      }
    }
  },
  created: function() {
    let self = this;
    window.addEventListener('click', function(e){
      // close dropdown when clicked outside
      if (!self.$el.contains(e.target)){
        self.isOpenUser = false
        self.isOpenNotif = false
        self.colorNotif = '#e3e3e3'
      } 
    })
  }
}
</script>