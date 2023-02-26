<template>
    <div class="menu bg-primary text-sm font-medium">
        <div class="bg-primary flex items-center">
            <div class="logo p-[10px] max-h-10 flex items-center max-h-[50px]">
                <a href="#">
                <img src="../assets/img/logo.svg" alt="logo" class="md:w-[46px] h-[30px] w-[56px]">
                </a>
            </div>
            <div class="max-h-[50px] form-box flex items-center md:w-1/4 w-full max-h-10">
                <input type="text" class="md:max-w-[420px] bg-gray h-10 w-full placeholder-opacity-30 placeholder-silver focus:outline-0 pl-4 focus:bg-[#606060] hover:bg-[#606060] rounded-l" placeholder="Harry Potter...">
                <button class="p-3 bg-danger max-h-10 rounded-r flex items-center hover:bg-[#C64569FF]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="white" class="w-[18px] h-[25px] ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>

            <div class="max-h-[50px] flex hidden items-center md:block">
                <ul class="decoration-0 flex w-full">
                    <li class="text-silver px-2.5 hover:bg-gray hover:bg-gray hover:transition-all ease-in-out duration-200">
                        <a href="#" class="h-[50px] flex justify-center items-center">Random</a>
                    </li>
                    <li class="text-silver px-2.5 hover:bg-gray hover:bg-gray hover:transition-all ease-in-out duration-200">
                        <a href="#" class="h-[50px] flex justify-center items-center">Tags</a>
                    </li>
                    <li class="text-silver px-2.5 hover:bg-gray hover:bg-gray hover:transition-all ease-in-out duration-200">
                        <a href="#" class="h-[50px] flex justify-center items-center">Artists</a>
                    </li>
                    <li class="text-silver px-2.5 hover:bg-gray hover:bg-gray hover:transition-all ease-in-out duration-200">
                        <a href="#" class="h-[50px] flex justify-center items-center">Charters</a>
                    </li>
                </ul>
            </div>

            <button class="max-h-[50px] space-y-2 bg-gray p-2 rounded max-h-[40px] w-10 flex-col flex md:hidden ml-4 mr-4"  @click="activeMobileMenu = !activeMobileMenu">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="silver">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="max-h-[50px] ml-auto md:flex hidden h-[50px] text-silver">
                <button class="bg-gray flex p-2.5 items-center font-bold text-silver">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Sign in
                </button>
                <button class="bg-danger flex p-2.5 items-center font-bold text-silver">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Register
                </button>
            </div>
        </div>
    </div>

    <!--mobile menu-->
    <transition name="slide">
        <div class="mobile_menu bg-primary flex flex-col items-center text-silver text-center md:hidden" v-if="activeMobileMenu">
            <div class="w-full py-2">
                <ul>
                    <li class="h-9 w-full">Random</li>
                    <li class="h-9">Tags</li>
                    <li class="h-9">Artists</li>
                    <li class="h-9">Charters</li>
                    <li class="h-9">
                        <button class="bg-gray flex py-1 w-8/12 items-center mx-auto flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Sign in
                        </button>
                    </li>
                    <li class="h-9">
                        <button class="bg-danger flex py-1 w-8/12 flex items-center justify-center mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Register
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </transition>
</template>

<script setup>
import {ref} from "vue";

let activeMobileMenu = ref(false)
</script>


<style>
.slide-enter-from, .slide-leave-to {
    display: block;
    width: 100%;
    overflow: hidden;
    max-height: 0;
    transition: max-height .7s;
}
.slide-enter-to, .slide-leave-from {
    max-height: 400px;
    display: block;
    width: 100%;
    overflow: hidden;
    transition: max-height .7s;
}
</style>
