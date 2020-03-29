import axios from 'axios'

export default {
    namespaced: true,

    state: {
        tweets: []
    },
    getters: {
        tweets (state) {
            return state.tweets
        }
    },
    mutations: {
        PUSH_TWEETS (state, data) {
            state.tweets.push(...data)
        }
    },
    actions: {
        async getTweets({ commit }, url) {
            let res = await axios.get(url);

            commit('PUSH_TWEETS', res.data.data);

            return res;
        }
    }
}