<template>
    <div>
            <app-tweet
                v-for="tweet in tweets"
                :key="tweet.id"
                :tweet="tweet"
            />
    </div>
</template>

<script>
    import axios from 'axios'
export default {
    data() {
        return {
            tweets: []
        }
    },

    methods: {
        async getTweets() {
            let res = await axios.get('/api/timeline')

            this.tweets = res.data.data
        }
    },
    mounted() {
        this.getTweets();
    }
}
</script>