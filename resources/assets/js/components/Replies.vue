<template>
        <div>
            <div v-for="(reply,index) in items">
                <reply :data="reply" @deleted="removeOfList(index)"></reply>
            </div>
        </div>
</template>
<script>
    import Reply from './reply.vue';
    export default {
    components :{ Reply },
        props:['data'],
        data(){
                return {
                    items:this.data,
                }
        },
        methods:{

            removeOfList(index){
                this.items.splice(index,1);
                this.$emit('removed');
            }
        }
    }
</script>