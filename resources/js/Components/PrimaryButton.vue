<template>
    <div class="flex justify-center space-x-2">
        <a :href="link">
        <button
            type="button"
            class="inline-block rounded bg-black px-3 pt-1 pb-1 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] bg-black text-white hover:bg-gray-800">
            <i class="material-icons">{{ icon }}</i>
        </button>
        </a>
    </div>
</template>

<script setup>
defineProps({
    link: String,
    icon: String
})
</script>

<style scoped>

</style>
