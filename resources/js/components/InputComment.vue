<template>
    <div class="flex text-silver mt-4 mx-auto w-full text-center justify-center mb-4">
        <div v-if="!isLogin">
            <router-link :to="{name: 'login.page'}" class="underline hover:no-underline">Login</router-link> &nbsp;or&nbsp;<router-link :to="{name: 'register.page'}" class="underline hover:no-underline">Register</router-link> to post a comment.
        </div>
        <form v-else class="flex flex-col w-full justify-center items-center" @submit.prevent="submitHandler">
            <textarea v-model="commentData" placeholder="input comment here" type="text" maxlength="350" class="w-6/12 bg-gray placeholder-opacity-30 placeholder-silver focus:outline-0 focus:bg-[#606060] hover:bg-[#606060] rounded p-1.5"></textarea>
            <button class="bg-danger mt-4 px-3 py-1 rounded hover:opacity-75 font-bold">submit</button>
        </form>
    </div>
</template>

<script setup>

import {useStore} from "vuex";
import {ref, defineEmits} from "vue";
import {useRoute} from "vue-router";
import api from "../api.js";
const store = useStore();
const route = useRoute();
const id = route.params.id;

const isLogin = ref(false);
const emit = defineEmits();

isLogin.value = Boolean(store.state.isLogin);
const commentData = ref('');
const submitHandler = () => {
    if(commentData.value.length > 3){
        api.post('/api/book/'+id+'/comments', {
            'body': commentData.value
        })
            .then(() => {
                commentData.value = '';
                emit('update');
            })
            .catch(e => console.log(e));
    }
}
</script>

