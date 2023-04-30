<template>
 <body class="h-screen">
    <div class="ml-4">
        <div class="chat chat-start mt-6 mb-4">
            <div class="chat-image avatar">
                <div class="w-10 rounded-full">
                    <img src="/storage/avatar.jpg" />
                </div>
            </div>
            <div class="chat-bubble">Hi {{$page.props.user.name}}, <br/>Hoping you'll be at your most productive today ;)</div>
        </div>

    </div>

    <div class="md:mx-auto w-fit ">
        <div class="flex">
            <div class="bg-red-500 h-24 flex-1">
                1
            </div>
            <div class="bg-green-500 h-24 flex-1">
                2
            </div>
            <div class="bg-red-500 h-24 flex-1">
                3
            </div>
        </div>
    <div class="stats flex shadow xs:w-full">

        <div class="stat ">
            <div class="stat-figure text-orange-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.99998V15M12 18V19"></path>
                </svg>

            </div>
            <div class="stat-title">Issues</div>
            <div class="stat-value text-orange-600">{{props.pending}}</div>
            <div class="stat-desc">Pending</div>
        </div>

        <div class="stat ">
            <div class="stat-figure text-green-500">
<!--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>-->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                </svg>

            </div>
            <div class="stat-title">Issues</div>
            <div class="stat-value text-green-500">{{props.complete}}</div>
            <div class="stat-desc">Complete</div>
        </div>

        <div class="stat">
            <div class="stat-figure text-green-500">
                <!--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>-->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                </svg>

            </div>
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

import {onMounted} from "vue";

let props = defineProps({
    pending: Number,
    complete: Number,
    quote:Array
});

let pct = 0


onMounted( function (){
    let total = props.complete + props.pending;
    return pct = (props.complete / total) * 100;
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

</style>
