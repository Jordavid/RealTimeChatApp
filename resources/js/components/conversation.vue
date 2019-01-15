<style scoped>
   .panel-block{
       flex-direction: column;
   }

    .conversation{
        width: 100%;
        padding: 18px;
        max-height: 500px;
        overflow-x: auto;
        border: 1px solid cadetblue;
        border-radius: 5px;
        overflow-x: auto;
    }

    .conversation .chat-right, .conversation .chat-left{
        max-width: 90%;
        padding: 5px;
        margin-left: 5px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .chat-right{
        float: right;
        background: cadetblue;
        
        
    }

    .chat-left{
        float: left;
        background: chocolate;
        
    }

    .no-message {
        height: 200px;
        display: flex;
        text-align: center;
    }
</style>
<template>
    <div class="panel-block">
             <div class="conversation" v-if="conversations.length != 0">
                <div v-for="conversation in conversations" :key="conversation.index" style="overflow:auto">
                    <div class="chat-right" v-if="conversation.user_id == user_id">
                        {{ conversation.conversation}} 
                        
                    </div>
                    <div class="chat-left" v-else>
                        {{ conversation.conversation}}
                        
                    </div>
                    
                </div>
            </div>
            <div v-else class="no-message">
                There are no Messages
            </div>

        <chat-form :user_id="user_id" :friend_id="friend_id" :conversations="conversations"></chat-form>
        
    </div>
</template>

<script>
    export default {
        props:[
            'conversations',
            'user_id',
            'friend_id'
        ],

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
