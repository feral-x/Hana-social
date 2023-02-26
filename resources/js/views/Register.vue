<template>
    <div class="flex flex-col justify-center items-center h-screen">
        <div class="logo my-3.5">
            <a href="#" class="cursor-pointer hover:opacity-70">
                <img src="../assets/img/logo.svg" alt="logo" class="h-20">
            </a>
        </div>
        <div class="text-white text-center italic ">Abandon all hope, ye who enter here</div>
        <div class="text-white text-center italic">ここから入らんとする者は一切の希望を放棄せよ</div>
        <form class="flex flex-col justify-center items-center mt-3.5 max-w-[350px] w-full" @submit.prevent="startRegister">
            <input placeholder="Name" type="text" class="p-2.5 outline-0 border-b border-b-primary rounded-t w-full max-w-[300px] bg-gray focus:bg-hover focus:shadow-2xl hover:bg-hover hover:shadow-2xl text-white font-bold h-[55px]"
            v-model="userName">
            <input placeholder="Email" type="text" class="p-2.5 outline-0 border-b border-b-primary w-full max-w-[300px] bg-gray focus:bg-hover focus:shadow-2xl hover:bg-hover hover:shadow-2xl text-white font-bold h-[55px]"
            v-model="userEmail">
            <input placeholder="Password" type="password" class="p-2.5 outline-0 border-b border-b-primary w-full max-w-[300px] bg-gray focus:bg-hover focus:shadow-2xl hover:bg-hover hover:shadow-2xl text-white font-bold h-[55px]"
            v-model="userPassword">
            <input placeholder="Password confirm" type="password" class="p-2.5 outline-0 border-b border-b-primary rounded-b  w-full max-w-[300px] bg-gray focus:bg-hover focus:shadow-2xl hover:bg-hover hover:shadow-2xl text-white font-bold h-[55px]"
            v-model="userPasswordConfirm">
            <button class="bg-danger flex py-1 w-8/12 flex items-center justify-center mx-auto rounded mt-3.5 mb-1.5 text-silver font-bold text-[17px] max-w-[300px] w-full py-0.5 px-1.5 h-[50px] hover:opacity-75">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                Register
            </button>
            <div class="text-center text-silver flex">
                Already have an account? <a href="#" class="text-center font-bold">&nbsp;Login</a>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import {ref} from "vue";

const userName = ref('');
const userEmail = ref('');
const userPassword = ref('');
const userPasswordConfirm = ref('');
const startRegister = () => {
    axios.post('/api/register', {
        'name': userName.value,
        'email': userEmail.value,
        'password': userPassword.value,
        'password_confirmation': userPasswordConfirm.value,
    })
    .then(res => console.log(res))
}

</script>

