<template>
<form @submit.prevent="updateData">

    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
<!--                <h2 class="font-semibold text-xl text-gray-600">Report an Issue to the devs</h2>-->
                <p class="text-gray-500 mb-6">Edit Issue</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
<!--                        <div class="text-gray-600">-->
<!--                            <p class="font-medium text-lg">Issue Details</p>-->
<!--                        </div>-->

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded-md border-white outline-white">




                                <div class="md:col-span-6">
                                    <div>
                                        <label class="text-black " for="passwordConfirmation">Priority</label>
                                        <select class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring" v-model="formData.status" id="passwordConfirmation">
                                            <option value="" selected>Priority</option>
                                            <option v-for="(status, index) in statuses" :value="status" :key="index">{{status}}</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded">Update Issue Status</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    issue:Object,
    statuses:Array,
});



const formData = useForm({
//create form and v-model the elements
    title: props.issue.title,
    status:props.issue.status,
    description:props.issue.description
});

const updateData = () => formData.put(`/issue_dev/${props.issue.id}`)
</script>

<style scoped>

</style>
