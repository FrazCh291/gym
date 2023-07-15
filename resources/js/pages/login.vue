<template id="app">
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card offset-2 mt-5 ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Login</h4>
                    <form class="forms-sample" @submit.prevent="submit">
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" name="email" v-model="form.email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" name="password" v-model="form.password" class="form-control" 
                                placeholder="Password">
                        </div>
                        <button class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'app',
    data() {
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        async submit() {
            const response = await axios.post('/login', this.form);
            console.log(response,'dfgdfg');
            if(response.data.code == 200){
                localStorage.setItem("token",response.data.token);
                this.$router.push("/dashboard");
            }
        }
    }
}
</script>