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
                              <h4 class="card-title col-11">User</h4>
                              <router-link to="add/user" class="nav-link btn btn-primary col-1">Add</router-link>
                          </div>
                          
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Phone</th>
                                          <th>Address</th>
                                          <th>Role</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr v-for="user in Users">
                                          <td>{{user.username}}</td>
                                          <td>{{user.email}}</td>
                                          <td>{{user.phone}}</td>
                                          <td>{{user.address}}</td>
                                          <td><a @click="edit(user.id)" class="btn btn-success">Edit</a>&nbsp;
                                          <a @click="del(user.id)" class="btn btn-danger">Delete</a></td>
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
            Users:''
        }
    },
  components: {
      navbar,
      sidebar
  },
  methods:{
        async getUser(){
            const response = await axios.get('/users');
            this.Users = response.data;
        },
        async edit(id) {
            this.$router.push(`/edit/user/${id}`);
        },
        async del(id){
            const response = await axios.get('/delete/user/'+id);
            this.getUser();
        }
    },
    mounted(){
        this.getUser();
    }
}
</script>