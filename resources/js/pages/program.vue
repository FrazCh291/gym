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
                                <h4 class="card-title col-11">Program</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="Product in Products">
                                            <td>{{ Product.name }}</td>
                                            <td>{{ Product.description }}</td>
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
import sidebar from '../sidebar.vue';
import navbar from '../navbar.vue';
import axios from 'axios';
export default {
    name: 'index',
    data() {
        return {
            Products: []
        }
    },
    components: {
        navbar,
        sidebar
    },
    methods: {
        async getProduct() {
            const response = await axios.get('/product/program');
            this.Products = response.data;
        },
    },
    mounted() {
        this.getProduct();
    }
}
</script>