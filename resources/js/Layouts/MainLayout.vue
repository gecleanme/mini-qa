<template>

    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-black rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">SimpleQA</span>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">

                <Link
                    :href=myIssuesLink()
                    as="button"
                    class="mr-5 hover:text-gray-900"
                    v-if="$page.props.user"
                >
                    Pending Issues
                </Link>


                <!--                <a class="mr-5 hover:text-gray-900">Second Link</a>-->
                <Link
                    class="mr-5 hover:text-gray-900"
                    href="/logout"
                    method="delete"
                    as="button"
                    v-if="$page.props.user"
                >Logout</Link>

<!--                <Link-->
<!--                    class="mr-5 hover:text-gray-900"-->
<!--                    href="/login"-->
<!--                    v-if="!$page.props.user"-->
<!--                >Login</Link>-->


            </nav>
            <Link href="/createIssue" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"
            v-if="$page.props.user?.role==='QA'">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M12 5v14M5 12h14"></path>
            </svg>

            Create Issue

            </Link>
        </div>
    </header>
    <slot></slot>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-black rounded-full" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">SimpleQA</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2023 Milad Khader —
                <a href="https://twitter.com/musicandgodmean" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@musicandgodmean</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
    </span>
        </div>
    </footer>
</template>

<script setup>
import {Link, usePage} from "@inertiajs/vue3";
import {computed} from "vue";



const userData = computed(
    () => {
        if(usePage().props.user)

            return [usePage().props.user.name, usePage().props.user.email]

        else return null
    }
);

const myIssuesLink = () => {
    const { user } = usePage().props;
    const baseUrl = 'http://localhost:8000';
    const baseUrlDev = 'http://localhost:8000/dev'
    let link = '';

    if (user.role === 'dev') {
        link = `${baseUrlDev}/?department=${user.department}&status=Pending`;
    } else {
        link = `${baseUrl}/?reporter=${user.id}&status=Pending`;
    }

    return link;
};




</script>

<style scoped>

</style>
