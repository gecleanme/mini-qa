<template>
 <body class="h-screen">
    <div class="ml-4">
        <div class="chat chat-start mt-6 mb-6">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img src="/storage/avatar.jpg" />
                </div>
            </div>
            <div class="chat-bubble bg-gray-200 text-black">Hi {{$page.props.user.name}}, <br/>Hoping you'll be at your most productive today ;)</div>
        </div>

    </div>

    <div class="mx-auto w-fit">

        <div class="stats stats-vertical lg:stats-horizontal shadow shadow-lg mb-8">

            <div class="stat">
                <div class="stat-title">Issues</div>
                <div class="stat-value text-orange-600">{{props.pending}}</div>
                <div class="stat-desc">Pending</div>
            </div>

            <div class="stat">
                <div class="stat-title">Issues</div>
                <div class="stat-value text-green-500">{{props.complete}}</div>
                <div class="stat-desc">Complete</div>

            </div>

            <div class="stat">
                <div class="stat-title">Issues</div>
                <div class="stat-value text-green-500">{{pct + '%'}}</div>
                <div class="stat-desc">Complete Percentage</div>
            </div>

        </div>
    </div>

    <div class="card w-96 bg-base-100 shadow-xl w-80 flex mx-auto mt-6">
        <div class="card-body p-6">
            <h2 class="card-title">Quote of the day</h2>
            <blockquote class="text-2xl text-black font-italic">{{ props.quote.quote }}</blockquote>
            <div class="card-actions justify-end">
                <p class="text-gray-600 text-sm font-semibold">{{ props.quote.author }}</p>
            </div>
        </div>
    </div>

 </body>

</template>


<script setup>

import {onMounted, ref} from "vue";

let props = defineProps({
    pending: Number,
    complete: Number,
    quote:Array
});

let pct = ref(0);


onMounted(() =>{
    let total = props.complete + props.pending;
    return pct.value = (props.complete / total) * 100;
    }
);

</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Landing",
    layout: MainLayout
}
</script>

<style scoped>

.stat {
    @apply my-1.5 space-y-1.5
}

</style>
