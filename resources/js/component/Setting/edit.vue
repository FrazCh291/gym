<template>
    <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Category</h4>
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
                                    <input type="checkbox" name="status" v-model="form.status" class="form-check-input">
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
    name: 'edit',
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
       async edit(){
            const response = await axios.get('/edit/setting/'+this.$route.params.id);
            this.form.name = response.data.name;
            this.form.value = response.data.value ;
            this.form.status = response.data.status ;
        },
        async submit(){
            const response = await axios.post('/update/setting/'+this.$route.params.id,this.form);
            if(response.data.status == 200){
                this.$router.push('/settings')
            }
        }

    },
    mounted(){
        this.edit();
    }
}
</script>