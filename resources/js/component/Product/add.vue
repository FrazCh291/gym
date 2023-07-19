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
                            <form class="forms-sample" @submit.prevent="submit($event)" enctype="multipart/form-data">
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
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
                                <!-- <div class="form-group">
                                    <label for="exampleInputUsername1">Image</label>
                                    <input type="file" name="image" @change="uploadImage($event)" multiple="multiple"
                                        data-max_length="2" class="form-control" id="exampleInputUsername1"
                                        placeholder="Image">
                                </div> -->
                                <div class="upload__box">
                                    <label for="exampleInputUsername1">Image</label>
                                    <input type="file" class="form-control" multiple="multiple" @change="handleFileChange"
                                        :data-max_length="maxImages">
                                    <div class="upload__img-wrap">
                                        <div v-for="(img, index) in imageArray" :key="index" class="upload__img-box">
                                            <div :style="'background-image: url(' + img.url + ')'" :data-number="index"
                                                :data-file="img.name" class="img-bg">
                                                <div class="upload__img-close" @click="removeImage(index)"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">File</label>
                                    <input type="file" name="file" @change="uploadFile($event)" multiple="multiple"
                                        data-max_length="2" class="form-control" id="exampleInputUsername1"
                                        placeholder="File">
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
            errors: [],
            imageArray: [],
            pdfArray: [],
            maxImages: 5,
            form: {
                name: '',
                title: '',
                price: '',
                status: '',
                category_id: '',
                files: [],
                images: []
            },
            categories: '',
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
        async submit(e) {
            this.errors = [];
            if (!this.form.name) {
                this.errors.push('Name required.');
                return;
            }
            if (!this.form.title) {
                this.errors.push('Title required.');
                return;
            }
            if (!this.form.price) {
                this.errors.push('Price required.');
                return;
            }
            if (!this.form.category_id) {
                this.errors.push('Category required.');
                return;
            }
            if (!this.form.files) {
                this.errors.push('Files required.');
                return;
            }

            e.preventDefault();
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            const response = await axios.post('/add/product', this.form,config);
            if (response.data.status == 200) {
                this.$router.push('/product')
            }
        },
        uploadFile(e) {
            var files = e.target.files;
            const filesArr = Array.from(files);

            filesArr.forEach((file) => {
                if (!file.type.match('pdf.*') || this.imageArray.length >= this.maxImages) {
                    return;
                }
                this.pdfArray.push({
                    name: file.name,
                    url: URL.createObjectURL(file),
                    file: file,
                });
                this.form.files = this.pdfArray
            });
        },
        handleFileChange(event) {
            var files = event.target.files;
            const filesArr = Array.from(files);

            filesArr.forEach((file) => {
                if (!file.type.match('image.*') || this.imageArray.length >= this.maxImages) {
                    return;
                }
                this.imageArray.push({
                    name: file.name,
                    url: URL.createObjectURL(file),
                    image: file,
                });
                this.form.images = this.imageArray
            });
        },
        removeImage(index) {
            this.imageArray.splice(index, 1);
        },
    },
    mounted() {
        this.getCategory()
    }
}
</script>
<style>
p {
    margin: 0;
}




.upload__btn {
    display: inline-block;
    font-weight: 600;
    color: #fff;
    text-align: center;
    min-width: 116px;
    padding: 5px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color: #4045ba;
    border-color: #4045ba;
    border-radius: 10px;
    line-height: 26px;
    font-size: 14px;
}

.upload__btn:hover {
    background-color: unset;
    color: #4045ba;
    transition: all 0.3s ease;
}

.upload__btn-box {
    margin-bottom: 10px;
}

.upload__img-wrap {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.upload__img-box {
    width: 200px;
    padding: 0 10px;
    margin-bottom: 12px;
}

.upload__img-close {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    line-height: 24px;
    z-index: 1;
    cursor: pointer;
}

.upload__img-close:after {
    content: '\2716';
    font-size: 14px;
    color: white;
}

.img-bg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    padding-bottom: 100%;
}
</style>