import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({

    state:{
        name:'Parth',


    },

    mutations : {

        increment (state, n) {
            state.name = n
        }

    },

    actions:{},

    getters:{

        getName(state){


            return state.name
        }

    },





})