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
                            <form class="forms-sample" @submit.prevent="submit" enctype="multipart/form-data">
                                <label for="">Select Category</label>
                                <select class="form-select" aria-label="Default select example" v-model="form.category_id">
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
                                    <label for="exampleInputUsername1">Image</label>
                                    <input type="file" name="image" @change="uploadImage($event)" multiple="multiple"
                                        class="form-control" id="exampleInputUsername1" placeholder="Image">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">File</label>
                                    <input type="file" name="file" @change="uploadFile($event)" multiple="multiple"
                                        class="form-control" id="exampleInputUsername1" placeholder="File">
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
    name: 'add',
    data() {
        return {
            form: {
                name: '',
                title: '',
                price: '',
                status: '',
                category_id: '',
            },
            categories: '',
            selectedFiles: '',
            selectedImage: '',


        }
    },
    components: {
        navbar,
        sidebar
    },
    methods: {
        async getCategory() {
            const response = await axios.get('/category');
            if (response.data) {
                this.categories = response.data;
            }
        },
        async submit() {
            const formData = new FormData();
            formData.append('images', this.selectedImage);
            formData.append('file', this.selectedFiles);
            formData.append('name', this.form.name);
            formData.append('category_id', this.form.category_id);
            formData.append('title', this.form.title);
            formData.append('price', this.form.price);
            formData.append('status', this.form.status);
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            const response = await axios.post('/add/product',formData,config);
            if (response.data.status == 200) {
                this.$router.push('/product')
            }
        },
        uploadFile(e) {
            this.selectedFiles = e.target.files;
        },
        uploadImage(e) {
            this.selectedImage = e.target.files;
        }
    },
    mounted() {
        this.getCategory()
    }
}
</script>