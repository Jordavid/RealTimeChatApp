<template>
    <div class="panel-block field">
        
            <div class="control">
                <input class="input" type="text" placeholder="Type your message here..." 
                    @keyup.enter="sendChat" v-model="conversation"
                >
            </div>
            <div class="control auto-width">
                <input type="button" class="button is-link" value="Send Message" @click="sendChat">
        </div>
    </div>

</template>
<script>
export default {
    props:[
        'conversations', 'user_id', 'friend_id', 'time'
    ],
    
    data() {
        return {
            conversation: ''
        }
    },

    methods: {
        sendChat(){
            if(this.conversation !== ''){
                var data = {
                    conversation: this.conversation,
                    friend_id: this.friend_id,
                    user_id: this.user_id,
                    
                }
                console.log(this.conversation);
                this.chat.time.push(this.getTime());
                this.conversation = '';

                axios.post('/conversation/sendConversation', data)
                 .then((response) => {
                     this.conversations.push(data);
                });
            }
            
        },
         getTime(){
            let time = new Date();
            return time.getHours()+':'+time.getMinutes();
         }
    },
}
</script>
<style scoped>
   
   .panel-block{
       flex-direction: row;
       width: 100%;
   }
   
    .auto-width{
        width: auto;
        margin-left: 2px;
    }
</style>