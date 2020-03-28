<template>
    <div>{{user}}</div>
</template>

<script>
import axios from 'axios'

    export default {

        data() {
            return {
                user: null
            }
        },
        methods: {
            async getUser() {
                let res = await axios.get('/api/user')

                this.user = res.data;
            }
        },

        mounted() {
            this.getUser();
            console.log(user)
        }
    }
</script>
