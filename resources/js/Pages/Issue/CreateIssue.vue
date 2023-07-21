<template>
    <form @submit.prevent="sendData">
        <!-- Template Start   -->
        <!-- component -->
        <!-- Alert    -->
        <div
            class="min-h-screen p-6 bg-gray-100 flex items-center justify-center"
        >
            <div class="container max-w-screen-lg mx-auto">
                <div>
                    <h2 class="font-semibold text-xl text-gray-600">
                        Report an Issue to the devs
                    </h2>
                    <p class="text-gray-500 mb-6">Be as detailed as possible</p>

                    <div
                        class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6"
                    >
                        <div
                            class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3"
                        >
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Issue Details</p>
                                <p>All fields required except Attachments</p>
                            </div>

                            <div class="lg:col-span-2">
                                <div
                                    class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 rounded-md border-white outline-white"
                                >
                                    <div class="md:col-span-5">
                                        <label for="full_name">Title</label>
                                        <input
                                            type="text"
                                            v-model="formData.title"
                                            id="full_name"
                                            class="h-10 outline-white border border-gray-300 mt-1 rounded px-4 w-full"
                                        />
                                        <p
                                            v-if="formData.errors.title"
                                            class="text-sm text-red-500 font-semibold"
                                        >
                                            {{ formData.errors.title }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-6">
                                        <label class="text-black" for="textarea"
                                            >Description</label
                                        >
                                        <textarea
                                            id="textarea"
                                            v-model="formData.description"
                                            type="textarea"
                                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-blue-500 focus:outline-none focus:ring"
                                        ></textarea>
                                        <p
                                            v-if="formData.errors.description"
                                            class="text-sm text-red-500 font-semibold"
                                        >
                                            {{ formData.errors.description }}
                                        </p>
                                    </div>

                                    <div class="md:col-span-6">
                                        <div>
                                            <label
                                                class="text-black"
                                                for="passwordConfirmation"
                                                >Priority</label
                                            >
                                            <select
                                                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring"
                                                v-model="formData.priority"
                                                id="passwordConfirmation"
                                            >
                                                <option value="" selected>
                                                    Priority
                                                </option>
                                                <option
                                                    v-for="(
                                                        priority, index
                                                    ) in priorities"
                                                    :value="priority"
                                                    :key="index"
                                                >
                                                    {{ priority }}
                                                </option>
                                            </select>
                                            <p
                                                v-if="formData.errors.priority"
                                                class="text-sm text-red-500 font-semibold"
                                            >
                                                {{ formData.errors.priority }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="md:col-span-6">
                                        <div>
                                            <label
                                                class="text-black"
                                                for="passwordConfirmation2"
                                                >Department</label
                                            >
                                            <select
                                                class="block w-full px-4 py-2 mt-1 text-gray-700 bg-white border border-gray-300 rounded-md focus:border-gray-300 focus:outline-none focus:ring"
                                                v-model="formData.department"
                                                id="passwordConfirmation2"
                                            >
                                                <option value="" selected>
                                                    Department
                                                </option>
                                                <option
                                                    v-for="department in departments"
                                                    :key="department"
                                                    :value="department"
                                                >
                                                    {{ department }}
                                                </option>
                                            </select>

                                            <div
                                                class="text-red-500 text-sm font-semibold"
                                                v-if="
                                                    formData.errors.department
                                                "
                                            >
                                                {{ formData.errors.department }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="md:col-span-5 mt-6">
                                        <div>
                                            <label
                                                class="block text-sm font-medium text-black"
                                            >
                                                Attachments
                                            </label>

                                            <div
                                                class="flex text-sm text-gray-600"
                                            >
                                                <label
                                                    for="file-upload"
                                                    class="p-2 mt-2 relative cursor-pointer bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500"
                                                >
                                                    <span
                                                        class="text-center mx-auto"
                                                        >Upload a media
                                                        file</span
                                                    >
                                                    <input
                                                        id="file-upload"
                                                        name="file-upload"
                                                        type="file"
                                                        @input="packFiles"
                                                        class="p-2 mt-2 sr-only"
                                                        accept=".jpg,.png,.mp4"
                                                        :disabled="
                                                            formData.attachments
                                                        "
                                                    />
                                                </label>
                                                <p
                                                    class="text-sm text-black mt-4 ml-1"
                                                    v-if="formData.attachments"
                                                >
                                                    File Uploaded!
                                                </p>
                                            </div>
                                            <p class="text-xs text-black m-2">
                                                PNG, JPG, MP4
                                            </p>
                                        </div>
                                        <p v-if="formData.errors.attachments">
                                            {{ formData.errors.attachments }}
                                        </p>
                                    </div>

                                    <div
                                        class="md:col-span-5 mt-6 mt-4 space-x-2"
                                        v-if="formData.attachments"
                                    >
                                        <p
                                            class="text-black text-md font-semibold mt-2"
                                        >
                                            Attachments
                                        </p>

                                        <img
                                            :src="attachmentPreview"
                                            v-if="
                                                attachmentPreview.includes(
                                                    'image',
                                                )
                                            "
                                            height="300"
                                            width="300"
                                            class="rounded-3 mt-4"
                                        />
                                        <video
                                            controls
                                            :src="attachmentPreview"
                                            v-if="
                                                attachmentPreview.includes(
                                                    'video',
                                                )
                                            "
                                            height="300"
                                            width="300"
                                            class="rounded-3 mt-4"
                                        ></video>
                                    </div>

                                    <div class="md:col-span-5 mt-2">
                                        <p
                                            class="text-sm text-red-500 font-italic"
                                        >
                                            *Attachments will be deleted upon
                                            issue completion
                                        </p>
                                    </div>

                                    <div class="md:col-span-5 text-right">
                                        <div class="inline-flex items-end">
                                            <button
                                                class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded"
                                            >
                                                Create Issue
                                            </button>
                                        </div>
                                    </div>

                                    <div class="md:col-span-5 text-right">
                                        <div class="inline-flex items-end">
                                            <button
                                                type="reset"
                                                class="bg-black hover:bg-gray-800 text-white font-bold py-2 px-4 rounded"
                                                @click="reset"
                                            >
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Template end   -->
    </form>
</template>

<script setup>
import { ref } from "vue";

defineProps({
    priorities: Array,
    departments: Array,
});

import { useForm } from "@inertiajs/vue3";

const formData = useForm({
    //create form and v-model the elements
    title: null,
    department: null,
    priority: null,
    description: null,
    attachments: null,
});

const attachmentPreview = ref(formData.attachments);

const packFiles = (event) => {
    for (const att of event.target.files) {
        formData.attachments = att;
    }

    let file = event.target.files[0];
    if (!file) {
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        attachmentPreview.value = e.target.result;
    };

    reader.readAsDataURL(file);
};

const reset = () => formData.reset();

const sendData = () =>
    formData.post("/issue", {
        onSuccess: () => formData.reset(),
    });
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout: MainLayout,
};
</script>

<style scoped></style>
