<template>
    <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Product</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" v-model="form.name" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tilte</label>
                                    <input type="text" name="title" v-model="form.title" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Image</label>
                                    <input type="file" name="image" @change="" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">File</label>
                                    <input type="file" name="file" @change="" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Price</label>
                                    <input type="number" name="price" v-model="form.price" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
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
            name:'',
            title:'',
            price:'',
            status:''
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods:{
        submit(){
            
        }
    }
}
</script>