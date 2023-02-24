<template>
    <div class="container max-w-[1200px] mx-auto bg-primary rounded p-2.5 mt-2.5">
        <div class="text-silver flex items-center justify-center gap-2 text-2xl font-bold my-4">
            <slot />
            {{props.title}}
        </div>
        <div class="flex flex-wrap justify-center mb-4">
            <div class="card rounded bg-gray lg:w-[19%] md:w-[24%] sm:w-[32%] w-[48%] h-[50%] m-1 cursor-pointer group relative inline-block" v-for="item in 20">
                <img src="../assets/img/thumb.webp" alt="thumb" class="rounded-t object-cover h-[50%]">
                <div class="text-silver font-bold p-1 text-sm leading-[14px] max-h-8 bg-gray text-center overflow-hidden z-10 relative group-hover:z-50 group-hover:max-h-max group-hover:absolute rounded-b">
                    [STUDIO HUAN (Raidon)] Jimoto no Hame Tomo. "Shinya no Conveni Tenin A" | My Hometown Fuck Buddy. Midnight Shift Store Clerk A's Case [English] [Team Rabu2]
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps(['title'])
console.log(props)
</script>
