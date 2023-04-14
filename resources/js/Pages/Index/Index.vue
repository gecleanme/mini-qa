<template>

    <div
        v-if="$page.props.flash.success"
        class="mb-2 inline-flex w-25 items-center rounded-lg bg-green-300 px-6 py-5 text-base text-green-800 float-right text-center mt-6 "
        role="alert">
  <span class="mr-2">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="h-5 w-5">
      <path
          fill-rule="evenodd"
          d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
          clip-rule="evenodd" />
    </svg>
  </span>
        {{$page.props.flash.success}}
    </div>

    <!--Filters-->

    <FilterForm :departments="departments" :priority="priority" :reporters="reporters" :filters="filters" :statuses ="statuses"/>
        <!-- Template Start   -->
    <div class="overflow-x-auto">
        <div class="w-full sm:max-w-2xl md:max-w-4xl lg:max-w-6xl mx-auto">
            <table class="table-auto text-left text-xs sm:text-sm font-light mx-auto md:min-w-full">
                <thead class="border-b font-medium">
                <tr>
                    <th scope="col" class="px-6 py-4">Title</th>
                    <th scope="col" class="px-6 py-4">Department</th>
                    <th scope="col" class="px-6 py-4">Priority</th>
                    <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="!issues" class="mt-4">
                    <td colspan="4" rowspan="5" class="text-sm text-gray-500 uppercase p-4 m-4 text-center">No Issues Found</td>
                </tr>
                <tr v-else v-for="issue in issues.data" :key="issue.id"
                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
                    <td class="truncate px-6 py-4 font-medium">{{issue.title}}</td>
                    <td class="truncate px-6 py-4">{{issue.department}}</td>
                    <td class="truncate px-6 py-4">{{issue.priority}}</td>
                    <td class="truncate px-6 py-4">
                        <PrimaryButton :link ="`/issue/${issue.id}`" text="View Details"/>
                    </td>
                </tr>
                </tbody>
            </table>
            <TablePagination v-if="issues" :links="issues.links"></TablePagination>
        </div>
    </div>
        <!--  Template end    -->


</template>

<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TablePagination from "@/Components/TablePagination.vue";
import FilterForm from "@/Components/FilterForm.vue";

const page = usePage();
const msg = computed(
    () => usePage().props.flash.success
);

defineProps({
    issues: {
        type:Array
    },

    departments:{
        type:Array
    },

    priority: {
        type:Array
    },

    reporters:{
        type: Object
    },
    filters:{
        type: Object
    },

    statuses:{
        type:Array
    }
})
</script>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
    layout :MainLayout
}

</script>


<style scoped>

</style>
