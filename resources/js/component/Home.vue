<template lang="">
    <div class="container">
        <div class="row">
 <template v-for="list in lists" :key="list">
            <div class="col-lg-3 col-md-3">
                <div class="card justify-content-between" >
           
                    <div class="card-body">
                        <h5 class="card-title">{{list.title}}</h5>
                        <p class="card-text">{{list.desc}}</p>
                        <a href="#" class="btn btn-primary">Comments</a>
                    </div>
                    

                </div>

            </div>

            </template>
        </div>

    </div>
</template>
<script>
    export default {
    

    created() {
        this.threadList();
    },

    data(){
     return {
            lists:{}
        }
    },

    methods:{
    threadList(){
    axios.get('/api/threadList').then(res=>{
    console.log(res);
    this.lists= res.data.thread_list;
    }).catch();
    }
    }
    
    
    
    }
</script>
<style lang="">

</style>