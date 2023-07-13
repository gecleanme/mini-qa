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
                                    <input type="text" v-model="formData.title" id="full_name" class="h-10 outline-white border border-gray-300 mt-1 rounded px-4 w-full"/>
                                    <p v-if="formData.errors.title" class="text-sm text-red-500 font-semibold">{{formData.errors.title}}</p>

                                </div>


                                <div class="md:col-span-6">
                                    <label class="text-black" for="textarea">Description</label>
                                    <textarea id="textarea" v-model="formData.description" type="textarea" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring"></textarea>
                                    <p v-if="formData.errors.description" class="text-sm text-red-500 font-semibold">{{formData.errors.description}}</p>

                                </div>


                                <div class="md:col-span-6">
                                    <div>
                                        <label class="text-black " for="passwordConfirmation">Priority</label>
                                        <select class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring" v-model="formData.priority" id="passwordConfirmation">
                                            <option value="" selected>Priority</option>
                                            <option v-for="(priority, index) in priorities" :value="priority" :key="index">{{priority}}</option>
                                        </select>
                                        <p v-if="formData.errors.priority" class="text-sm text-red-500 font-semibold">{{formData.errors.priority}}</p>


                                    </div>

                                </div>

                                <div class="md:col-span-6">
                                    <div>
                                        <label class="text-black " for="passwordConfirmation2">Department</label>
                                        <select class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring" v-model="formData.department" id="passwordConfirmation2">
                                            <option value="">Department</option>
                                            <option v-for="department in departments" :key="department" :value="department">{{ department }}</option>
                                        </select>
                                        <p v-if="formData.errors.department" class="text-sm text-red-500 font-semibold">{{formData.errors.department}}</p>

                                    </div>

                                </div>

                                <div class="md:col-span-5 mt-6">

                                    <div>
                                        <label class="block text-sm font-medium text-black">
                                            Attachments
                                        </label>

                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="p-2 mt-2 relative cursor-pointer bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span class="text-center mx-auto">Upload a media file</span>
                                                <input id="file-upload" name="file-upload" type="file" @input="packFiles" class="p-2 mt-2 sr-only" accept=".jpg,.png,.mp4" :disabled="formData.attachments">

                                            </label>
                                            <p class="text-sm text-black mt-4 ml-1" v-if="formData.attachments">
                                                File Uploaded!
                                            </p>
                                        </div>
                                        <p class="text-xs text-black m-2">
                                            PNG, JPG, MP4
                                        </p>
                                    </div>
                                </div>



                                <div class="md:col-span-5 mt-6 mt-4 space-x-2">
                                    <p class="text-black text-md font-semibold mt-2" v-if="attachmentPreview">Existing attachments</p>
                                    <img :src="attachmentPreview" v-if="attachmentPreview.includes('image')" height="300" width="300" class="rounded-3 mt-4" />
                                    <video controls :src="attachmentPreview" v-if="attachmentPreview.includes('video')" height="300" width="300" class="rounded-3 mt-4"></video>
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
import {ref} from "vue";

const props = defineProps({
    issue:Object,
    priorities: Array,

    departments: Array
});

const attachmentPreview= ref( props.issue.att)

const formData = useForm({
//create form and v-model the elements
    _method:'put', //uploading files need to be post, spoofing done here
    title: props.issue.title,
    department:props.issue.department,
    priority:props.issue.priority,
    description:props.issue.description,
    attachments: props.issue.attachments ?? null
});

const packFiles = (event) => {
    for (const att of event.target.files) {
        formData.attachments = att;

    }

    let file= event.target.files[0]
    if(!file){
        return
    }

    const  reader = new FileReader()
    reader.onload=(e)=>{
        attachmentPreview.value=e.target.result
    }

    reader.readAsDataURL(file)


}



const clearFiles = () =>{
    formData.attachments = null;
}


const updateData = () => formData.post(`/issue/${props.issue.id}`) //actually sends put through spoofing
</script>

<style scoped>

</style>
