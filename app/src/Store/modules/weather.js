import { generateCodeFrame } from "vue-template-compiler";

export default {
    namespaced: true,
    state: {
        entries: [],
        name: '',
        weather: [],
        temp: null,
    },
    mutations: {
        setDados(state, payload) {
            state.entries = payload.list
        },
        getDados(state) {
            return state.entries;
        },
        setName(state, payload){
            state.name = payload;
        },
        getName(state){
            return state.name;
        }
    },
    actions: {
        c({ commit, state }) {
            const token = "";
            const city = state.name;
            const url = `api.openweathermap.org/data/2.5/weather?q=${city},uk&appid=${token}`

            return fetch(url)
                .then(r => r.json())
                .then(r => commit('setDados', r))
        },

        async getWeather({ commit, state }) {
            try {
                const city = state.name;
                const res = await fetch(`https://openweathermap.org/data/2.5/find?q=${city}&appid=439d4b804bc8187953eb36d2a8c26a02`);
                const json = await res.json();
                console.log('json', json)
                commit('setDados', json)
            } catch (err) {
                console.error('err', err);
            }
        }
    }
}


