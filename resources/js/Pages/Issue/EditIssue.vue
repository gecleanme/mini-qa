<template>
<form @submit.prevent="updateData">

   <FlashSuccess/>

    <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Report an Issue to the devs</h2>
                <p class="text-gray-500 mb-6">Edit Issue</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Issue Details</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded-md border-white outline-white">
                                <div class="md:col-span-5">
                                    <label for="full_name">Title</label>
                                    <input type="text" v-model="formData.title" id="full_name" class="h-10 outline-white border-gray-300 mt-1 rounded px-4 w-full"/>
                                </div>


                                <div class="md:col-span-6">
                                    <label class="text-black" for="textarea">Description</label>
                                    <textarea id="textarea" v-model="formData.description" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                                </div>


                                <div class="md:col-span-6">
                                    <div>
                                        <label class="text-black " for="passwordConfirmation">Priority</label>
                                        <select class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring" v-model="formData.priority" id="passwordConfirmation">
                                            <option value="" selected>Priority</option>
                                            <option v-for="(priority, index) in priorities" :value="priority" :key="index">{{priority}}</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="md:col-span-6">
                                    <div>
                                        <label class="text-black " for="passwordConfirmation2">Department</label>
                                        <select class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring" v-model="formData.department" id="passwordConfirmation2">
                                            <option value="">Department</option>
                                            <option v-for="department in departments" :key="department" :value="department">{{ department }}</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="md:col-span-5 mt-6">

                                    <div>
                                        <label class="block text-sm font-medium text-black">
                                            Attachments
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-black hover:text-gray-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                        <span class="text-center mx-auto">Upload a media file</span>
                                                        <input id="file-upload" name="file-upload" type="file" class="sr-only" @input="packFiles">
                                                    </label>
                                                    <p class="pl-1 text-black">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-black">
                                                    PNG, JPG, MP4
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="md:col-span-5 mt-6">
                                    <div class="inline-flex items-center">
                                        <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox" />
                                        <label for="billing_same" class="ml-2">Delete attachments on issue completion</label>
                                    </div>
                                </div>

                                <div class="md:col-span-5 mt-6 mt-4 space-x-2" v-if="formData.attachments">
                                    <p class="text-black text-md font-semibold mt-2">Existing attachments</p>
                                    <img :src="formData.att" v-if="formData.attachments" height="300" width="300" class="rounded-3 mt-4" />
                                </div>


                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <Link
                                            class="inline-block rounded bg-primary px-6 pt-2.5 pb-2 text-xs font-medium leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] bg-black text-white hover:bg-gray-800"
                                            :href="`/del/${issue.id}`"
                                            method="delete"
                                            as="button"
                                            v-if="issue.attachments"
                                        >Delete File</Link>

                                        <button class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded ml-2">Edit Issue</button>
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

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    layout: MainLayout
}
</script>

<script setup>
import {useForm} from "@inertiajs/vue3";
import {Link} from "@inertiajs/vue3";
import FlashSuccess from "@/Components/FlashSuccess.vue";

const props = defineProps({
    issue:Object,
    priorities: Array,

    departments: Array
});



const formData = useForm({
//create form and v-model the elements
    title: props.issue.title,
    department:props.issue.department,
    priority:props.issue.priority,
    description:props.issue.description,
    attachments: props.issue.attachments,
    att: props.issue.att
});

const packFiles = (event) => {
    for(const att of event.target.files){
        formData.attachments=att;
    }
}


const updateData = () => formData.put(`/issue/${props.issue.id}`)
</script>

<style scoped>

</style>
