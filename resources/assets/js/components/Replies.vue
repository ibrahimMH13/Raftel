<template>
        <div>
            <div v-for="(reply,index) in items" :key="reply.id">
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

        data(){
                return {
                    dataSet:false,
                    items:[],
                    endpoint:location.pathname+'/replies',
                }
        },
        created(){

            this.fetch();
        },
        methods:{
            fetch(){
                axios.get(this.url()).then(this.refresh);
            },
            url(){
                return location.pathname+"/replies";
            },
            refresh({data}){
                this.dataSet = data;
               this.items = data.data;
            },
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