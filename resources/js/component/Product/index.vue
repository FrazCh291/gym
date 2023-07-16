<template>
      <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-12 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h4 class="card-title col-11">Product</h4>
                                <router-link to="add/product" class="nav-link btn btn-primary col-1">Add</router-link>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><a @click="edit()" class="btn btn-success">Edit</a>&nbsp;
                                            <a @click="del()" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
export default {
    name:'index',
    data(){
        return{
            Settings:''
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods:{
        async getSetting(){
            const response = await axios.get('/product');
            this.Settings = response.data;
        },
        async edit(id) {
            this.$router.push(`/edit/product/${id}`);
        },
        async del(id){
            const response = await axios.get('/delete/product'+id);
            this.getSetting();
        }
    },
    mounted(){
        this.getSetting();
    }
}
</script>