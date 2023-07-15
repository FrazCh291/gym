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
                              <h4 class="card-title col-11">Settings</h4>
                              <router-link to="add/setting" class="nav-link btn btn-primary col-1">Add</router-link>
                          </div>
                          
                          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Value</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr v-for="setting in Settings">
                                          <td>{{setting.name}}</td>
                                          <td>{{setting.value}}</td>
                                          <td>{{setting.status}}</td>
                                          <td><a @click="edit(setting.id)" class="btn btn-success">Edit</a>&nbsp;
                                          <a @click="del(setting.id)" class="btn btn-danger">Delete</a></td>
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
            Settings:''
        }
    },
  components: {
      navbar,
      sidebar
  },
  methods:{
        async getSetting(){
            const response = await axios.get('/settings');
            this.Settings = response.data;
        },
        async edit(id) {
            this.$router.push(`/edit/setting/${id}`);
        },
        async del(id){
            const response = await axios.get('/delete/setting/'+id);
            this.getSetting();
        }
    },
    mounted(){
        this.getSetting();
    }
}
</script>