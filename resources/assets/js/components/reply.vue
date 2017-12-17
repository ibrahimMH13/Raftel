<template>
    <div class="col-md-10 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="level">
                    <h6 class="flax"><a :href="'/Profile/'+this.data.user.name"><i v-text="'  ' + this.data.user.name"></i> reply </a></h6>
                    <span> {{ this.data.created_at }} </span>
                </div>
            </div>


            <div class="panel-body">
                <div class="level">

                    <div v-if="editing" class="col-sm-5 flax">
                        <div class="form-group">
                            <textarea class="form-control" v-model="body"></textarea>
                        </div>
                        <button class="btn btn-xs btn-primary" @click="update">Update</button>
                        <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
                    </div>
                    <div v-else class="flax" v-text="body"></div>
                    <div v-if="singIn">
                        <favorite :reply="data"></favorite>
                    </div>
                </div>

            </div>

              <div class="panel-footer" v-if="canUpdate">
                   <button class="btn btn-link" @click="destroy">
                      <i class="glyphicon glyphicon-remove" style="color:#dd1144;"></i>
                  </button>
                  <i class="btn btn-link glyphicon glyphicon-edit" @click="editing = true" style="color:#2e6da4;"></i>
               </div>

        </div>

    </div>
 </template>
<script>

    import Favorite from './Favorite.vue';
    export default {
        props:['data'],
        components:{ Favorite },
        data(){

            return {

                editing:false,
                body:this.data.body,

            };
        },
        computed:{
            singIn(){
                return window.App.singIn;
            },
            canUpdate(){
                return this.authorize(user=>this.data.user_id == user.id);
            }
        },
        methods:{
            update(){
                axios.patch('/replies/' +this.data.id,{
                    body :this.body
                });
                this.editing = false;
            },
            destroy(){
                axios.delete("/replies/"+this.data.id);
                 $(this.$el).fadeOut(500);
                 this.$emit('deleted',this.data.id);
            }

        }
    }
</script>