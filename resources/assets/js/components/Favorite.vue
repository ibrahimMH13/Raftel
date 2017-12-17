<template>
    <button :class="classes" @click="toggle">
        <i class="glyphicon glyphicon-heart" :class="coloers"></i>
        <i v-text="count"></i>
    </button>
</template>
<script>

    export default {

        props:['reply'],
        data(){
            return{
                count :this.reply.FavoriteCount==0?'':this.reply.FavoriteCount,
                isFavorited :this.reply.isFavorite,
            }
        },
        computed: {
            classes(){
                return ['btn btn-default'];
            },
            coloers(){
               return [this.isFavorited? "active" : "inactive"];
            },
            endpoint(){
                return '/replies/'+this.reply.id+'/favorite';
            }
        },
        methods:{
            toggle(){
               this.isFavorited?this.destroy():this.create();
            },
            create(){
                axios.post(this.endpoint);
                this.isFavorited = true;
                this.count++;
            },
            destroy(){
                axios.delete(this.endpoint);
                this.isFavorited = false;
                this.count--;

            }
        }
    }
</script>
<style>
    .active{

        color:red;
    }
    .inactive{

        color :#9BA2AB;
    }
</style>