<template>
    <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Category</h4>
                            <form class="forms-sample" @submit.prevent="submit">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" v-model="form.name" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Value</label>
                                    <input type="text" name="value" v-model="form.value" class="form-control" id="exampleInputUsername1"
                                        placeholder="Value">
                                </div>
                                <div class="form-check">
                                    <label> Status </label>
                                    <input type="checkbox" v-model="form.status" class="form-check-input">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import sidebar from '../../sidebar.vue';
import navbar from '../../navbar.vue';
import axios from 'axios';
export default {
    name: 'add',
    data(){
        return{
            form:{
                namee:'',
                value:'',
                status:''
            }
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods:{
        async submit() {
            const response = await axios.post('/add/setting', this.form);
            if (response.data.status == 200) {
                this.$router.push('/settings')
            }

        }
    }
}
</script>