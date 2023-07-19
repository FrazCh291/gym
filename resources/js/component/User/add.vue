<template>
    <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add User</h4>
                            <form class="forms-sample" @submit.prevent="submit($event)">
                                <ul>
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" v-model="form.name" class="form-control" id="exampleInputUsername1"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Email</label>
                                    <input type="text" name="email" v-model="form.email" class="form-control" id="exampleInputUsername1"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Phone</label>
                                    <input type="text" name="phone" v-model="form.phone" class="form-control" id="exampleInputUsername1"
                                        placeholder="phone">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Address</label>
                                    <input type="text" name="address" v-model="form.address" class="form-control" id="exampleInputUsername1"
                                        placeholder="Address">
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
    components: {
        navbar,
        sidebar
    },
    data(){
        return{
            errors: [],
            form:{
                name:'',
                email:'',
                phone:'',
                address:''
            }
        }
    },
    methods:{
        async submit(e) {
            this.errors = [];
            if (!this.form.name) {
                this.errors.push('Name required.');
                return;
            }
            if (!this.form.email) {
                this.errors.push('Email required.');
                return;
            }
            if (!this.form.phone) {
                this.errors.push('Phone required.');
                return;
            }
            if (!this.form.address) {
                this.errors.push('Address required.');
                return;
            }

            e.preventDefault();
            const response = await axios.post('/add/user', this.form);
            if (response.data.status == 200) {
                this.$router.push('/user')
            }

        }
    }
}
</script>