<template>
    <form class="flex" @submit.prevent="submit">
        <div class="mr-3">
            <img :src="$user.avatar" class="w-12 rounded-full" >
        </div>
        <div class="flex-grow">
            {{ form }}
            <textarea
                class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2"
                placeholder="Whats happening?"
                autofocus
                v-model="form.body"
            >

            </textarea>

            <div class="flex justify-between">
                <div class="">
                    actions
                </div>
                <div class="">
                    <button 
                    type="submit" 
                    class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none">
                        Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            form: {
                body: ''
            }
        }
    },

    methods: {
        async submit () {
            await axios.post('/api/tweets', this.form)
        }
    }
}
</script>