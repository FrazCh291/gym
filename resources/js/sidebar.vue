<template>
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        </div>
        <ul class="nav">
          <li class="nav-item menu-items">
            <a class="nav-link" to="/dashoard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" >
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <!-- <span class="menu-title">Product</span> -->
              <router-link to="/product">Product</router-link>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" to="/dashoard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <!-- <span class="menu-title">Category</span> -->
              <router-link to="/category">Category</router-link>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" to="/dashoard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <!-- <span class="menu-title">Settings</span> -->
              <router-link to="/settings">Settings</router-link>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" to="/dashoard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <!-- <span class="menu-title">Settings</span> -->
              <router-link to="/user">User</router-link>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" to="/dashoard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <!-- <span class="menu-title">Settings</span> -->
              <router-link to="/subscription">Monthly SubsCription</router-link>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" to="/dashoard">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <!-- <span class="menu-title">Settings</span> -->
              <router-link to="/program">Program</router-link>
            </a>
          </li>
        </ul>
      </nav>
</template>
<script>
export default {
    name:'sidebar'
}
</script>