<template>
    <div class="container">
        <h2>Data Details</h2>
        <template v-for="detail in details" :key="detail">
            <div class="card justify-content-center" style="width: 28rem">
                <div class="card-body">
                    <h5 class="card-title">{{detail.title}}</h5>
                    <p class="card-text">{{detail.desc}}</p>
                    <hr>
                    <hr>
                    <h1>Comments</h1>

                    <form>
                        <div class="form-group mb-4">
                            <div class="form-label-group">
                                <textarea rows="4" type="desc" id="inputPhone" class="form-control" placeholder="Description"
                                     required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </template>

    </div>
</template>

<script>
    import {
        onMounted,
        ref,
        reactive
    } from 'vue';
    import {
        useRoute
    } from 'vue-router';
    import axios from 'axios';
    export default {
        setup() {
            const details = ref([]);
            const route = useRoute();
            const threadDetails = async () => {
                let id = route.params.id;
                let res = await axios.get('/api/detail/' + id);
                details.value = res.data.details;
                console.log(details.value);
            }
            onMounted(threadDetails());
            return {
                details,
            }
        }
    };
</script>