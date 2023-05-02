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
                <div
                    :class="{
                    'stat-value' : true,
                    'text-green-400' : pct>=85,
                    'text-orange-400': pct>=30 && pct<=85,
                    'text-red-400' : pct <30}">
                    {{pct + '%'}}
                </div>

                <div class="stat-desc">Complete Percentage</div>
                <div class="mt-2">

                    <progress v-if="pct<30" class="progress progress-error w-56" :value="pct" max="100"></progress>
                    <progress v-if="pct>=30 && pct<=85" class="progress progress-warning w-56" :value="pct" max="100"></progress>
                    <progress v-if="pct>=85" class="progress progress-success w-56" :value="pct" max="100"></progress>


                </div>
            </div>

        </div>
    </div>

    <div class="card w-96 bg-base-100 shadow-xl w-80 flex mx-auto mt-6">
        <div class="card-body p-6">
            <h2 class="card-title">Quote of the day</h2>

            <blockquote v-if="quote" class="text-2xl text-black font-italic">{{ quote }}</blockquote>

            <!--  Spinner Start          -->

<!--            <div v-else class="radial-progress mx-auto" style="&#45;&#45;value: 75"></div>-->
            <div v-else class="mx-auto mt-2">
            <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">

                    <circle cx="75" cy="75" r="100" stroke="black" stroke-width="4" fill="#fff" />


            </svg>
            </div>

            <!--   Spinner end         -->

            <div class="card-actions justify-end">
                <p class="text-gray-600 text-sm font-semibold">{{ author }}</p>
            </div>
        </div>
    </div>

 </body>

</template>


<script setup>

import {onMounted, ref} from "vue";
import axios from "axios";

let props = defineProps({
    pending: Number,
    complete: Number,
});

let pct = ref(0);
let quote = ref('');
let author = ref('');
let index = ref(Math.floor(Math.random() * 100));



onMounted(() =>{
    let total = props.complete + props.pending;
    return pct.value = (props.complete / total) * 100;
    }
);

onMounted(async () => {

        const options = {
            method: 'GET',
            url: 'https://quote-garden.onrender.com/api/v3/quotes?genre=Inspiration&limit=100',

        };

        try {
            const response = await axios.request(options);

            quote.value = response.data.data[index.value].quoteText;
            author.value = response.data.data[index.value].quoteAuthor;

        } catch (error) {
            console.error(error);
        }

    }
)

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
