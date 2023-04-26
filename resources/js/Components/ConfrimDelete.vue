<template>
    <button @click="deleteIssue"
        class="inline-block rounded bg-black px-3 pt-1 pb-1 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] bg-black text-white hover:bg-gray-800">
        <i class="material-icons">delete</i></button>
</template>

<script>
import {router} from "@inertiajs/vue3";

export default {


    props:{
        issue:Object
    },

    methods: {
        deleteIssue() {
            this.$swal.fire({
                title: 'Delete Issue?',
                text: "Are you sure? You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#000',
                cancelButtonColor: '#000',
                showCloseButton:true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //deletion logic here
                    router.delete(`/issue/${this.issue.id}`,{
                            onSuccess:()=>{
                                router.reload()

                            }
                        })


                    this.$swal.fire({
                        title: 'Deleted',
                        text: "Issue Permanently Deleted",
                        icon: 'success',
                        confirmButtonColor: '#000'
                    })
                }
            })
        },
    },
};
</script>
