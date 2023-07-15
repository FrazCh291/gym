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
                                <h4 class="card-title col-11">Category</h4>
                                <router-link to="add/category" class="nav-link btn btn-primary col-1">Add</router-link>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="category in Categories">
                                            <td>{{category.name}}</td>
                                            <td>{{ category.status }}</td>
                                            <td><a class="btn btn-success" @click="edit(category.id)">Edit</a>&nbsp;
                                            <a class="btn btn-danger" @click="del(category.id)">Delete</a></td>
                                            <td></td>
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
    name: 'index',
    data(){
        return{
            Categories:[]
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods:{
      async  getCategory(){
            const response = await axios.get('/category');
            this.Categories = response.data;
        },
        async edit(id) {
            this.$router.push(`/edit/category/${id}`);
        },
        async del(id){
            const response = await axios.get('/delete/category/'+id);
            this.getCategory();
        }
    },
    mounted(){
        this.getCategory();
    }
}
</script>