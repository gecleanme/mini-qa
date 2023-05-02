<template>
    <Head title="Home">
    </Head>
    <FlashSuccess/>
    <!--Filters-->

    <FilterForm :departments="departments" :priority="priority" :reporters="reporters" :filters="filters" :statuses ="statuses"

    />

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
                        <div class="flex space-x-1">
                            <PrimaryButton :link ="`/issue/${issue.id}`" icon="visibility"/>
                            <PrimaryButton :link ="`/issue/${issue.id}/edit`" icon="edit" v-if="issue.reporter_id === $page.props.user.id"/>
                            <PrimaryButton :link ="`/issue/${issue.id}/edit_dev`" icon="edit" v-if="issue.department === $page.props.user.department && $page.props.user.role === 'dev'"/>
                            <ConfrimDelete :issue="issue" v-if="issue.reporter_id === $page.props.user.id"/>
                        </div>


                    </td>
                </tr>
                </tbody>
            </table>
            <TablePagination v-if="issues" :links="issues.links"></TablePagination>
        </div>

    </div>

<!--    <button @click="logger">Log me</button>-->


</template>
<script setup>
import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TablePagination from "@/Components/TablePagination.vue";
import FilterForm from "@/Components/FilterForm.vue";
import FlashSuccess from "@/Components/FlashSuccess.vue";
import ConfrimDelete from "@/Components/ConfrimDelete.vue";




const page = usePage();
const msg = computed(
    () => usePage().props.flash.success
);

const props = defineProps({
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
import myMixin from "@/Components/Mixins/myMixin";
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
mixins:[myMixin],
layout: MainLayout
}

</script>


<style scoped>

</style>
