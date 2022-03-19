import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        basketProductsQuantity: 0
    },
    getters: {

    },
    mutations: {
        setbasketProductsQuantity (state, payload) {
            state.basketProductsQuantity = payload
        }
    },
    actions: {
        changeBasketProductsQuantity (context, payload) {
            context.commit('setbasketProductsQuantity', payload)
        }
    }
})

export default store
