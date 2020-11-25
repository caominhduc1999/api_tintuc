import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loggedIn: false,
        user: null,
        apiURL: 'http://localhost:8000/api',
        serverPath: 'http://localhost:8000',
        token: null
    },
    mutations: {
        SET_token(state, payload) {
            state.token = payload;
        },

        SET_user(state, payload) {
            state.user = payload;
        },

        SET_loggedIn(state, payload) {
            state.loggedIn = payload
        }
    },
    actions: {
        login({commit}, payload){
            return new Promise((resolve, reject) => {
                axios.post('http://localhost:8000/api/auth/login', {
                    email: payload.email,
                    password: payload.password
                }).then(res => {
                    commit('SET_token', res.data.access_token)
                    commit('SET_user', res.data.user)
                    commit('SET_loggedIn', true)
                    resolve(res)
                })
                .catch(err => {
                    reject(err)
                })
            })
        },

        register({commit}, payload){
            return new Promise((resolve, reject) => {
                axios.post('http://localhost:8000/api/auth/register', {
                    name: payload.name,
                    email: payload.email,
                    password: payload.password
                }).then(res => {
                    commit('SET_token', res.data.access_token)
                    commit('SET_user', res.data.user)
                    commit('SET_loggedIn', true)
                    resolve(res)
                })
                    .catch(err => {
                        reject(err)
                    })
            })
        },

        logout({commit, state}) {
            return new Promise( (resolve, reject) => {
                axios.post('http://localhost:8000/api/auth/logout', {
                    token: state.token
                })
                    .then(res => {
                        commit('SET_token', null)
                        commit('SET_user', null)
                        commit('SET_loggedIn', false)
                        resolve(res)
                    })
                    .catch(err => {
                        reject(err)
                    })
            })
        }
    },
    getters: {
        get_loggedIn(state) {
            return state.loggedIn;
        }
    }
})

