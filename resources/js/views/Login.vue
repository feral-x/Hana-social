<template>
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="logo my-3.5">
            <router-link :to="{name: 'main.page'}" class="cursor-pointer hover:opacity-70">
                <img src="../assets/img/logo.svg" alt="logo" class="h-20">
            </router-link>
        </div>
        <div class="text-white text-center italic ">Abandon all hope, ye who enter here</div>
        <div class="text-white text-center italic">ここから入らんとする者は一切の希望を放棄せよ</div>
        <form class="flex flex-col justify-center items-center mt-3.5 max-w-[350px] w-full" @submit.prevent="startLogin">
            <input placeholder="Email" type="text" class="p-2.5 outline-0 border-b border-b-primary w-full max-w-[300px] bg-gray focus:bg-hover focus:shadow-2xl hover:bg-hover hover:shadow-2xl text-white font-bold h-[55px]"
                   v-model="userEmail">
            <input placeholder="Password" type="password" class="p-2.5 outline-0 border-b border-b-primary w-full max-w-[300px] bg-gray focus:bg-hover focus:shadow-2xl hover:bg-hover hover:shadow-2xl text-white font-bold h-[55px]"
                   v-model="userPassword">
            <button class="bg-danger flex py-1 w-8/12 flex items-center justify-center mx-auto rounded mt-3.5 mb-1.5 text-silver font-bold text-[17px] max-w-[300px] w-full py-0.5 px-1.5 h-[50px] hover:opacity-75">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                Login
            </button>
            <div class="text-center text-silver flex">
                Dont have account? <router-link :to="{name: 'register.page'}" class="text-center font-bold">&nbsp;Register</router-link>
            </div>
        </form>
    </div>
</template>

<script setup>
import {ref} from "vue";
import api from "../api.js";
import {useRouter} from "vue-router";

const userEmail = ref('');
const userPassword = ref('');
const router = useRouter();
const startLogin = () => {
    api.post('/api/login', {
        'email': userEmail.value,
        'password': userPassword.value,
    }).then(r => {
       if(r.data.access_token){
           localStorage.setItem('access_token', r.data.access_token);
           localStorage.setItem('refresh_token', r.data.refresh_token);
           localStorage.setItem('isLogin', '1');
           router.push({name: 'main.page'})
       }
    }).catch(e => {
        console.log(e);
    })
}

</script>

