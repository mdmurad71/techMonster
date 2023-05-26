

<template lang="">
<div class="container">
    <div class="card card-login mx-auto mt-5" style="width:500px">
      <div class="card-header">Please Add Thread</div>
      <div class="card-body">
        <form @submit.prevent="addThread">

            <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="title" id="inputName" class="form-control" placeholder="Title" v-model="form.title" required="required">
            </div>
          </div>
          <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="desc" id="inputPhone" class="form-control" placeholder="Description" v-model="form.desc" required="required">
            </div>
          </div>


          <div class="form-group mt-3">
          <button  type="submit" class="btn btn-primary btn-block" style="width: 100%;">Save</button>
        </div>
        </form>
        <div class="text-center">
          <router-link class="d-block small mt-3" to="/">Back to Home</router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {

        mounted() {
        if(localStorage.getItem('myData')===null){
        this.$router.push('/login')
        }
    },

    data() {

        return {
            form:{
                title:"",
                desc:"",
                user_id: localStorage.getItem('myData')
            }
        }
    },

  

    methods: {
        addThread(){
            axios.post('/api/add', this.form).then(res=>{
            console.log(this.values);
                if(res.status===200){
                    this.$router.push({name:'home'})
                }
            })
        },

       
  
    },


    
}
</script>
<style lang="">
    
</style>