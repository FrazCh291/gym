<template>
    <div class="container-scroller">
        <sidebar />
        <div class="container-fluid page-body-wrapper">
            <navbar />
            <div class="row col-12 mt-5">
                <div class="col-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Category</h4>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                        placeholder="Username">
                                </div>
                                <div class="form-check mx-sm-2">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"> Status </label>
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
export default {
    name: 'edit',
    data(){
      return {
        
      }  
    },
    components: {
        navbar,
        sidebar
    }
}
</script>