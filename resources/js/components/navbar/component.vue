<template>
  <nav>
    <div class="navbar">

      <div class="Brand">
        <span>HelpdeskTicketingIT</span>
      </div>

      <div class="component">
        <div >
          <div class="component-user">
            <div class="avatar">
              <div>MA</div>
            </div>
            <span>Mochamad Atha</span>
          </div>
        </div>

        <div>
          <div class="component-notif" v-on:click="dropDown()">
            <span class="material-icons notif" v-bind="{ 'data-badge': dataBadge }" v-bind:style="{ color: color }">
              notifications
            </span>
          </div>
          <div class="dropdown scroll" v-show="isOpen">
            <div v-for="x in massage" :key="x.id">
              <div class="dropdown-subs" v-bind:class="{ active: x.isActive }" v-on:click="dropdownItem(x.id)">
                <span class="material-icons icon" v-bind:style="{ 'font-size': '50px' }">
                  {{ x.icon }}
                </span>
                <span> {{ x.massage }} </span>
              </div>
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
    user-select: none;
    cursor: context-menu;
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
    position: relative;
    cursor: pointer;
  }
  .notif[data-badge]::after {
    content:attr(data-badge);
    position:absolute;
    top:-8px;
    right:-8px;
    font-size:.35em;
    display: flex;
    justify-content: center;
    align-items: center;
    background:#2A5CDE;
    color:#fff;
    width:23px;
    height:23px;
    border: 3px solid #fff;
    border-radius: 50%;
    font-family: lato;
  }
</style>

<style lang="scss" scoped>
  .dropdown {
    top: 4.5em;
    right: 1.5em;
    width: 25em;
    height: 500px;
    padding: 5px;
    display: flex;
    flex-direction: column;
    position: absolute;
    background-color: #fff;
    border: .5px solid #e3e3e3;
    border-top: 3px solid #2A5CDE;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    z-index: 1;
  }
  .dropdown-subs {
    width: 100%;
    min-height: 70px;
    display: flex;
    flex-direction: row;
    align-items: center;
    background: #fff;
    cursor: pointer;
  }
  .active, .active span{
    color: #2A5CDE !important;
    background: #2a5dde05;
  }
  .dropdown-subs:hover {
    background: #fafafa;
  }
  .dropdown-subs span {
    padding: 0 0 0 15px;
    background: transparent !important;
  }
  .dropdown-subs .icon {
    color: #e3e3e3;
  }
</style>

<script>
export default {
  data: function () {
    return {
      isOpen: false,
      color: '#e3e3e3',
      massage: [],
      dataBadge: null
    }
  },
  created: function () {
    this.massageNotif();
    this.closeOutside();
    this.badge(this.massage)
  },
  methods: {
    massageNotif: function () {
      const res = [
        {
          id: 1,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: true
        },
        {
          id: 2,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: true
        },
        {
          id: 3,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: true
        },
        {
          id: 4,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
        {
          id: 5,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
        {
          id: 6,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
        {
          id: 7,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
        {
          id: 8,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
        {
          id: 9,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
        {
          id: 10,
          icon: 'account_circle',
          massage: 'Hi, permintaanmu sedang kami proses',
          isActive: false
        },
      ]
      this.massage = res;
    },
    badge: function (param) {
      for (let i=0; i<param.length; i++) {
        if (param[i].isActive === true) {
          this.dataBadge++
        }
      }
    },
    dropdownItem: function (param) {
      this.massage[param-1].isActive = false;
    },
    dropDown: function () {
      if (!this.isOpen || this.isOpen === false){
        this.isOpen = true;
        this.color = '#ccc';
        this.dataBadge = null;
      } 
      else {
        this.isOpen = false;
        this.color = '#e3e3e3';
        this.badge(this.massage);
      }
    },
    closeOutside: function () {
      let self = this;
      window.addEventListener('click', function(e){
      // close dropdown when clicked outside
        if (!self.$el.contains(e.target)){
          if (self.isOpen){
            self.isOpen = false;
            self.color = '#e3e3e3';
            self.badge(self.massage);
          } 
        } 
      });
    }
  }
};
</script>