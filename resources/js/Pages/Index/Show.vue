<template>
    <div style="display: none">
<h1>This is Show</h1>
    <Link href="/">Home</Link>
 <p>   {{issue.title}}</p>
    <p>   {{issue.attachments}}</p>

    <img :src="issue.att"/>
    </div>


<!-- Template start    -->

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap -mx-4 mt-auto mb-auto lg:w-1/2 sm:w-2/3 content-start sm:pr-10">
                <div class="w-full sm:p-4 px-4 mb-6">
                    <h1 class="title-font font-medium text-xl mb-2 text-gray-900">{{
                            issue.title
                        }}</h1>
                    <div class="leading-relaxed">{{
                            issue.description
                        }}</div>
                </div>
                <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ issue.department }}</h2>
                    <p class="leading-relaxed">Department</p>
                </div>
                <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ issue.priority }}</h2>
                    <p class="leading-relaxed">Priority</p>
                </div>

                <div class="p-4 sm:w-1/2 lg:w-1/4 w-1/2">
                    <h2 class="title-font font-medium text-3xl text-gray-900"> {{ issue.reporter.name }}</h2>
                    <p class="leading-relaxed">Reported By</p>
                </div>


            </div>
            <div v-if="issue.att" class="lg:w-1/2 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0">
                <img class="object-cover object-center w-full h-full" :src="issue.att" alt="stats">
            </div>



        </div>
    </section>

 <!-- Template end   -->

</template>

<script setup>
import {Link} from "@inertiajs/vue3";

defineProps({
    issue:{

        type:Object
    }

});
</script>


<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    layout: MainLayout
}

</script>

<style scoped>

</style>
