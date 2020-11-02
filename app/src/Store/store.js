import Vue from "vue";
import Vuex from "vuex"

import Weather from './modules/weather'


Vue.use(Vuex);

export default new Vuex.Store({
    modules:{
        Weather,
    }
})
