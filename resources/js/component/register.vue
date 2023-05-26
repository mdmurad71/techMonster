<template lang="">
<div class="container">
    <div class="card card-login mx-auto mt-5" style="width:500px">
      <div class="card-header">Please Register Here</div>
      <div class="card-body">
        <form @submit.prevent="register">

            <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="name" id="inputName" class="form-control" placeholder="name" v-model="form.name" required="required">
            </div>
          </div>
          <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="email" id="inputPhone" class="form-control" placeholder="email" v-model="form.email" required="required">
            </div>
          </div>

                    <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="password" id="inputPhone" class="form-control" placeholder="minimum eight character" v-model="form.password" required="required">
            </div>
          </div>


          <div class="form-group mt-3">
          <button  type="submit" class="btn btn-primary btn-block" style="width: 100%;">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {

    data() {
        return {
            form:{
                name: "",
                email:"",
                password:""
            }
        }
    },

    methods: {
        register(){
            axios.post('/api/register', this.form).then(res=>{
            console.log(res);
                if(res.status===200){
           
                    this.$router.push({name:'login'})
                }
            })
        }
    },
    
}
</script>
<style lang="">
    
</style>