<template>
    <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Product</h4>
                            <form class="forms-sample" @submit.prevent="submit">
                                <select class="form-select" aria-label="Default select example">
                                    <option>Select Category</option>
                                    <option v-for="category in categories" :value="category.id">
                                        {{ category.name }}
                                    </option>
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" v-model="form.name" class="form-control"
                                        id="exampleInputUsername1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tilte</label>
                                    <input type="text" name="title" v-model="form.title" class="form-control"
                                        id="exampleInputUsername1" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" @change="" class="form-control"
                                        id="" placeholder="Image">
                                </div>
                                <div class="form-group">
                                    <label for="">File</label>
                                    <input type="file" name="file" @change="" class="form-control"
                                        id="" placeholder="File">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Price</label>
                                    <input type="number" name="price" v-model="form.price" class="form-control"
                                        id="exampleInputUsername1" placeholder="Price">
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
    name: 'edit',
    data() {
        return {
            form: {
                name: '',
                title: '',
                price: '',
                status: ''
            },
            categories:''

        }
    },
    components: {
        navbar,
        sidebar
    },
    methods: {
        async getCategory() {
            const response = await axios.get('/category');
            if(response.data){
                this.categories = response.data;
            }
        },
       async edit(){
            const response = await axios.get('/edit/product/'+this.$route.params.id,  this.form);
            if(response.data){
                this.form.name = response.data.name;
                this.form.title = response.data.title;
                this.form.price = response.data.price;
                this.form.status = response.data.status;
            }  
        },
       async submit() {
            const response = await axios.post('update/product/'+this.$route.params.id,this.form);
            if(response.data.status == 200){
                this.$router.push('/product')
            }
        }
    },
    mounted(){
        this.edit();
        this.getCategory();
    }
}
</script>