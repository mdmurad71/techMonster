<template lang="">
<div class="container">
    <div class="card card-login mx-auto mt-5" style="width:500px">
      <div class="card-header">Login Please</div>
      <div class="card-body">
        <form @submit.prevent="login">

            <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="name" id="inputName" class="form-control" placeholder="email" v-model="form.email" required="required">
            </div>
          </div>
          <div class="form-group mb-4">
            <div class="form-label-group">
              <input type="phone" id="inputPhone" class="form-control" placeholder="password" v-model="form.password" required="required">
            </div>
          </div>

          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <div class="form-group mt-3">
          <button  type="submit" class="btn btn-primary btn-block" style="width: 100%;">Go Next</button>
        </div>
        </form>
        <div class="text-center">
          <router-link class="d-block small mt-3" to="/register">Don't have a account? please register</router-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {

    data() {
        return {
            form:{
                email:"",
                password:""
            }
        }
    },

    methods: {
        login(){
            axios.post('/api/login', this.form).then(res=>{
            console.log(res.data.user_id);
                if(res.status===200){
                var data= {
                email: "this.form.email",
                user_id: res.data.user_id
                }
                var jsonData = JSON.stringify(data);
                    localStorage.setItem('myData', res.data.user_id);
                    this.$router.push({name:'home'})
                }
            })
        }
    },
    
}
</script>
<style lang="">
    
</style>