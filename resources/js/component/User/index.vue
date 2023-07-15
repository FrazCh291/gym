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
                                          <th>Profile</th>
                                          <th>VatNo.</th>
                                          <th>Created</th>
                                          <th>Status</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>Jacob</td>
                                          <td>53275531</td>
                                          <td>12 May 2017</td>
                                          <td><a href="" class="btn btn-success">Edit</a>&nbsp;
                                          <a href="" class="btn btn-danger">Delete</a></td>
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
export default {
  name:'index',
  components: {
      navbar,
      sidebar
  }
}
</script>