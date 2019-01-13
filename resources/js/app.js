
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'

// For Scrolling 
import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll)
 
// For Notifications
import Toaster from 'v-toaster'

Vue.use(Toaster, {timeout: 5000})

import 'v-toaster/dist/v-toaster.css'



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('message', require('./components/message.vue').default);


const app = new Vue({
    el: '#app',

    data: {
        message: '',
        chat:{
            newMessage: [],
            user: [],
            color:[],
            time:[]
        },
        typing:'',
        numberOfUsers: 0
    },

    watch:{
        message(){
            Echo.private('chat')
                .whisper('typing', {
                    message: this.message
                });
        }
    },

    methods: {
        sendMessage(){
            if(this.message.length != 0){
                this.chat.newMessage.push(this.message);
                this.chat.user.push("You");
                this.chat.color.push("success");
                this.chat.time.push(this.getTime());
               // console.log(this.message);

                axios.post('/send', {
                    message: this.message,
                    user: this.user
                  })
                  .then(response => {
                    console.log(response.user);

                  })
                  .catch(error => {
                    console.log(error);
                  });
                  this.message = ''     
            }
        },

        getTime(){
            let time = new Date();
            return time.getHours()+':'+time.getMinutes();
        }
    },

    mounted(){
        Echo.private('chat')
             .listen('ChatEvent', (e) => {
                this.chat.newMessage.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push("info");
                this.chat.time.push(this.getTime());
                console.log(e);
        })
            .listenForWhisper('typing', (e) => {
                if(e.message !== ''){
                    this.typing = " Typing..."
                } else{
                    this.typing = ""
                }
            });
            Echo.join(`chat`)
                .here((users) => {
                    console.log(users)
                    this.numberOfUsers = users.length;
                })
                .joining((user) => {
                    this.numberOfUsers += 1;
                    this.$toaster.info(user.name + ' has joined the chat.');
                    console.log(user.name + " Joined");
                })
                .leaving((user) => {
                    this.numberOfUsers -= 1;
                    this.$toaster.warning(user.name + ' left the chat.');
                    console.log(user.name + " Left");
                });
        console.log('Mounted');
    }
});
