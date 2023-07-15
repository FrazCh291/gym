import { createStore } from "vuex";
import mutations from './mutation';
import getters from './getter';
import createPersistedState from "vuex-persistedstate";
export default createStore({
    state: {
        permission:'',
        showSidebar: false,
        showNav:false,
        token:'',
        addStore:'',
    },
    mutations,
    getters,
    plugins: [createPersistedState()],
})