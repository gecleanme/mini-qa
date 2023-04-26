<template>

    <div class="flex flex-col justify-center items-center mt-6 mb-6 w-full md:w-3/4 lg:w-90 mx-auto xs:mb-6 py-2" v-show="switcher" >
        <form @submit.prevent="filter" class="flex flex-col items-center w-full px-4 py-8 rounded-lg shadow-md bg-gray-100">
            <div class="flex flex-wrap justify-center gap-2 mb-8">
                <div class="flex flex-wrap gap-2 w-full sm:w-auto">
                    <select class="w-full sm:w-auto px-3 py-2 text-gray-700 border
                        border-gray-400 rounded-md appearance-none
                        focus:outline-none focus:ring-2 focus:ring-blue-400
                        focus:border-transparent"
                            v-model="props.priority"
                    >
                        <option :value="null" selected>Priority</option>
                        <option v-for="(pri,index) in priority" :value="pri" :key="index">{{pri}}</option>
                    </select>


                    <select class="w-full sm:w-auto px-3 py-2 text-gray-700 border
                     border-gray-400 rounded-md
                     appearance-none focus:outline-none
                    focus:ring-2 focus:ring-blue-400
                    focus:border-transparent"
                            v-model="props.statuses"
                    >
                        <option :value="null">Status</option>
                        <option v-for="(status,index) in statuses" :value="status" :key="index">{{status}}</option>

                    </select>

                    <select class="w-full sm:w-auto px-3 py-2 text-gray-700 border
                     border-gray-400 rounded-md
                     appearance-none focus:outline-none
                    focus:ring-2 focus:ring-blue-400
                    focus:border-transparent"
                            v-model="props.departments"
                            v-if="$page.props.user.role!=='dev'"
                    >
                        <option :value=null selected>Dept</option>
                        <option v-for="(department,index) in departments" :value="department" :key="index">{{department}}</option>
                    </select>

                    <select class="w-full sm:w-auto px-3 py-2 text-gray-700 border
                     border-gray-400 rounded-md
                     appearance-none focus:outline-none
                    focus:ring-2 focus:ring-blue-400
                    focus:border-transparent"
                            v-model="props.reporters"
                    >
                        <option :value="null">Reporter</option>
                        <option v-for="(reporter, index) in reporters" :key="index" :value="reporter.id">{{reporter.name}}</option>
                    </select>


                    <input type="text" class="w-full sm:w-auto px-3 py-2 text-gray-700 border border-gray-400
                    rounded-md appearance-none focus:outline-none focus:ring-2
                    focus:ring-blue-400 focus:border-transparent" placeholder="Search Title"
                           v-model="props.title"
                    >
                </div>
                <div class="flex justify-center gap-2 mt-4 w-full sm:w-auto">
                    <button type="submit" class="w-full sm:w-auto px-4 py-2 text-white bg-black rounded-md focus:outline-none hover:bg-gray-900">Filter</button>
                    <button type="reset" class="w-full sm:w-auto px-4 py-2 text-black bg-gray-200 rounded-md focus:outline-none hover:bg-gray-300" @click="clear">Clear</button>
                </div>
            </div>
        </form>
    </div>

</template>

<script setup>

import {useForm, usePage} from "@inertiajs/vue3";
import {ref ,inject} from "vue";


const data =defineProps({
    filters:Object,
    priority: Array,
    departments:Array,
    reporters: Object,
    statuses:Array,

});

let props=null;



if(usePage().props.user.role ==='dev') {

    props = useForm({

        priority: data.filters.priority ?? null,
        statuses: data.filters.statuses ?? null,
        title: data.filters.title ?? null,
        reporters: data.filters.reporters ?? null,
    });
}

else {
    props = useForm({

        priority: data.filters.priority ?? null,
        statuses: data.filters.statuses ?? null,
        title: data.filters.title ?? null,
        reporters: data.filters.reporters ?? null,
        departments: data.filters.departments ?? null
    });
}

const roleUrl = () => {
    if(usePage().props.user.role ==='dev')
        return '/dev';
    else  return '/';
}

const clear = () => props.reset();

const filter = () => props.get(roleUrl(),{
   preserveScroll:true,
   preserveState:true
});

let switcher = inject('switcher');



</script>

<script>
export default {
    name: "FilterForm"
}
</script>

<style scoped>

</style>
