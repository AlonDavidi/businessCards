window.Vue = require('vue');
window.Vuex = require('vuex');

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);
export const store = new Vuex.Store({
    state: {
        currentUser: {
            id: '',
            name: '',
            role: '',
            state: '',
            country: '',
            phone: '',
            street: '',
        }
    },
    mutations: {
        resetUser (state) {
            state.currentUser = {
                id: '',
                name: '',
                role: '',
                state: '',
                country: '',
                phone: '',
                street: '',
            }
        },

    },
    actions:{},
    getters:{
        getUser: state => {
            return state.user
        }
    }
})
