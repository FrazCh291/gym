import { createRouter, createWebHistory } from "vue-router";


import Login from '../js/pages/login.vue';

import AddCategory from '../js/component/Category/add.vue';
import EditCategory from '../js/component/Category/edit.vue';
import Category from '../js/component/Category/index.vue';

import AddProduct from '../js/component/product/add.vue';
import EditProduct from '../js/component/product/edit.vue';
import ShowProduct from '../js/component/product/show.vue';
import Product from '../js/component/product/index.vue';

import AddSetting from '../js/component/setting/add.vue';
import EditSetting from '../js/component/setting/edit.vue';
import Setting from '../js/component/setting/index.vue';

import AddUser from '../js/component/User/add.vue';
import EditUser from '../js/component/User/edit.vue';
import Users from '../js/component/User/index.vue';

import dashboard from '../js/component/dashboard.vue';
import Theme from '../js/component/HelloWorld.vue';

const routes = [
    { path: "/", component: Login },
    { path: "/category", component: Category },
    { path: "/product", component: Product },
    { path: "/add/product/", component: AddProduct },
    { path: "/edit/product/:id", component: EditProduct },
    { path: "/show/product/:id", component: ShowProduct },
    { path: "/add/category", component: AddCategory },
    { path: "/edit/category/:id", component: EditCategory },
    { path: "/settings", component: Setting },
    { path: "/add/setting/", component: AddSetting },
    { path: "/edit/setting/:id", component: EditSetting },
    { path: "/dashboard", component: dashboard },
    { path: "/add/user/", component: AddUser },
    { path: "/edit/user/:id", component: EditUser },
    { path: "/user", component: Users },
    { path: "/theme", component: Theme},
];
const router = createRouter({
    history : createWebHistory(),
    routes,
})
export default router;