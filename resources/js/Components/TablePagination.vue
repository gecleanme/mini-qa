<template>
    <div class="flex gap-1 m-4 p-2 float-right">
        <Link
            v-for="(link, index) in links"
            :key="index"
            class="rounded-md py-2 px-2"
            :href="link.url"
            v-html="link.label"
            :class="{ 'bg-black text-white': link.active }"
        >
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array,
});
</script>

<script>
export default {
    name: "TablePagination",
};
</script>

<style scoped></style>
