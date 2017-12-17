<template>

  <div v-if="login">
      <div class="col-md-6 col-md-offset-4">
              <textarea
                      id="body"
                      name="body"
                      class="form-control"
                      rows="5"
                      v-model="body"
                      required
              ></textarea>
              <input type="submit" value="Reply" @click="addReply"class="btn btn-default">
      </div>
  </div>

</template>
<script>
    export default {
        props:['endpoint'],
        data(){
            return{

                body:'',

            }
        },computed:{
            login(){
                return window.App.singIn;
            }
        },
        methods:{
            addReply(){
                if(this.body=='' || this.body=='Cannot be Null'){
                    this.body ='Cannot be Null';
                }else{
                    axios.post(this.endpoint,{body:this.body})
                        .then(({data})=>{

                            this.body = '';
                            this.$emit('created',data);

                        });
                }

            }
        }
    }
</script>