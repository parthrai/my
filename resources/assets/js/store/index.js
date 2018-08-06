import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({

    state:{
        name:'Parth',

    },

    mutations : {},

    actions:{},

    getters:{

        getName(state){

            
            return state.name
        }

    },





})