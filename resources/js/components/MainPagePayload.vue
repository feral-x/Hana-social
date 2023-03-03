<template>
    <div class="text-silver flex items-center justify-center gap-2 text-2xl font-bold my-4">
        <slot />
        {{props.title ? props.title : null}}
    </div>


    <div class="flex flex-wrap justify-center mb-4 relative pb-10" v-if="props.payload">
        <div class="card rounded bg-gray lg:w-[19%] md:w-[24%] sm:w-[32%] w-[48%] h-[50%] m-1 cursor-pointer group relative inline-block" v-for="item in props.payload.value"
             @click="router.push('/g/'+item.id)">
            <img :src="item.preview_img" alt="thumb" class="rounded-t object-cover h-[50%]">
            <div class="text-silver font-bold p-1 text-sm leading-[14px] max-h-8 bg-gray text-center overflow-hidden absolute group-hover:z-50 group-hover:max-h-max rounded-b">
                {{item.title}}
            </div>
        </div>
    </div>

</template>

<script setup>
import {useRoute,useRouter} from "vue-router";

const route = useRoute();
const router = useRouter();
const props = defineProps(['title', 'payload', 'type'])
</script>
