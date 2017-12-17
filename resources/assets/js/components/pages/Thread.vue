<script>
    import Replies from '../Replies.vue';
    export default {
        props:['initcount'],
        components :{ Replies },
        data(){
            return {
                count:this.initcount,
            }
        }
    }
</script>