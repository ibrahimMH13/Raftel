<template>
        <div>
            <div v-for="reply in items">
                <reply :data="reply"></reply>
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
        }
    }
</script>