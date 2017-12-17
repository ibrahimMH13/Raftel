<template>
        <div>
            <div v-for="(reply,index) in items">
                <reply :data="reply" @deleted="removeOfList(index)"></reply>
            </div>
            <new-reply :endpoint="endpoint" @created="addIn"></new-reply>
        </div>



</template>
<script>
    import Reply from './reply.vue';
    import NewReply from './NewReply.vue';

    export default {
    components :{ Reply , NewReply },
        props:['data'],
        data(){
                return {
                    items:this.data,
                    endpoint:location.pathname+'/replies',
                }
        },
        methods:{
            addIn(reply){
                this.items.push(reply);
                this.$emit('added');
            },
            removeOfList(index){
                this.items.splice(index,1);
                this.$emit('removed');
            }
        }
    }
</script>