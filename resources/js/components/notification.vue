<template>
    <div>
        <div class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i> Messages <span class="badge badge-pill badge-danger" v-if="notifications.length">{{notifications.length}}</span> <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <div v-if="notifications.length != 0" style="text-align:center">
                    <div class="dropdown-item" v-for="notification in notifications" :key="notification.index" >
                        <a @click="MarkAsRead(notification)">
                            New message from <b>{{ notification.data.conversation.sender_name}}</b>
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>

                    <a href="/conversation">Go to Messages</a>
                </div>
                
                <div v-else style="text-align:center">
                    <p>No Unread message</p> 
                    <div class="dropdown-divider"></div>

                    <a href="/conversation">Go to Messages</a>
                </div>
            </div>
         </div>
    </div>
</template>
<script>
export default {
    props: [
        'notifications',
        'number'
    ],

    methods: {
        MarkAsRead: function (notification) {
            var data = {
                id: notification.id
            };

            axios.post('/notification/markAsRead', data).then(response => {
                window.location.href = "/conversation/" + notification.data.conversation.user_id;
                console.log(response);
            })

        }
    },
}
</script>