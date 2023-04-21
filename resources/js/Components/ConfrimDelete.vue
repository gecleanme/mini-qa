<template>
    <div class="flex justify-center items-center">
        <button
            v-if="$page.props.user.id === issue.reporter_id"
            @click="setIsOpen(true)"
            class="inline-block rounded bg-primary px-3 pt-1 pb-1 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] bg-black text-white hover:bg-gray-800">
             <i class="material-icons">delete</i>
        </button>

        <Dialog
            class="fixed inset-0 z-10 overflow-y-auto bg-gray-600 opacity-95"
            :open="isOpen"
            @close="handleClose"
        >
            <div class="flex items-center justify-center min-h-screen">
                <DialogOverlay class="fixed inset-0" />

                <DialogPanel class="bg-white rounded-lg shadow-md w-full md:w-1/2">
                    <DialogTitle class="text-lg font-semibold text-gray-900 py-4 px-6">
                        Delete Reported Issue
                    </DialogTitle>

                    <DialogDescription class="text-gray-700 px-6 pb-4">
                        Heads Up! This shit is irreversible!
                    </DialogDescription>

                    <p class="text-gray-700 px-6 py-2">
                        You sure?
                    </p>

                    <div class="flex justify-end py-4 px-6">
                        <button
                            class="text-sm font-semibold text-gray-600 hover:text-gray-900 mr-4"
                            @click="setIsOpen(false)">
                            Nah, Keep it
                        </button>

                        <button
                            class="text-sm font-semibold text-white bg-red-500 hover:bg-red-600 rounded-md py-2 px-4"

                         >
                            Nuke away
                        </button>
                    </div>
                </DialogPanel>
            </div>
        </Dialog>
    </div>
</template>

<script setup>
import {Link, router} from "@inertiajs/vue3";
import { ref } from 'vue'
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
    DialogOverlay,
} from '@headlessui/vue'

const props =defineProps({
   issue:Object
});


const isOpen = ref(false)

function handleClose(param) {
    router.delete(`/issue/${props.issue.id}`,{
        onSuccess:()=>{
            router.reload()

        }
    })
}

function setIsOpen(value) {
    isOpen.value = value
}
</script>
