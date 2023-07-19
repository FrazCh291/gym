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
                                <router-link to="/product" class="nav-link btn btn-primary col-1">Back</router-link>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>File</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="file in files">
                                            <td>{{ file.image }}</td>
                                            <td>{{ file.type }}</td>
                                            <td>
                                            <a @click="del(file.id)" class="btn btn-danger">Delete</a></td>
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
import axios from 'axios';
export default {
    name:'index',
    data(){
        return{
            files:''
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods:{
        async getMedia(){
            const response = await axios.get('/product');
            this.files = response.data[0].files;
        },
        async del(id){
            const response = await axios.get('/delete/file/'+id);
            this.getProduct();
        }
    },
    mounted(){
        this.getMedia();
    }
}
</script>