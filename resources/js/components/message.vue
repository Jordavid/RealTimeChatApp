<template>
   <div class="div">
        <li class="list-group-item" :class="addColor">
            <slot></slot>
            <span id="time">{{time}}</span>
        </li>
        <small class="badge float-right" :class="badgeClass">{{user=="You"? user : user.name}}</small>
   </div>
</template>
<script>
export default {

    props:[
        'color',
        'user',
        'time'
    ],

    computed:{
        addColor(){
            return 'list-group-item-'+this.color;
        },
        badgeClass(){
            return 'badge-'+this.color;
        }
    }
}
</script>
<style>
    #time{
        color: black;
        background: white;
        float: right;
        font-size: 11px;
        position: relative;
        top: -10px;
        right: -20px;
        border-radius: 5px;
        padding: 0 5px;
    }
</style>
