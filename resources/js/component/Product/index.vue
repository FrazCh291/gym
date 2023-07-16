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
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>File</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="product in Products">
                                            <td>{{ product.name }}</td>
                                            <td>{{ product.title }}</td>
                                            <td>{{ product.image }}</td>
                                            <td>{{ product.file }}</td>
                                            <td>{{ product.price }}</td>
                                            <td>{{ product.status }}</td>
                                            <td><a @click="edit(product.id)" class="btn btn-success">Edit</a>&nbsp;
                                            <a @click="del(product.id)" class="btn btn-danger">Delete</a></td>
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
            Products:''
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods:{
        async getProduct(){
            const response = await axios.get('/product');
            this.Products = response.data;
        },
        async edit(id) {
            this.$router.push(`/edit/product/${id}`);
        },
        async del(id){
            const response = await axios.get('/delete/product/'+id);
            this.getProduct();
        }
    },
    mounted(){
        this.getProduct();
    }
}
</script>