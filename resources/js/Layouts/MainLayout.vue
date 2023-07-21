<template>
    <header class="text-gray-600 body-font">
        <div
            class="container mx-auto flex flex-wrap py-3 px-5 flex-col md:flex-row items-center"
        >
            <Link
                href="/landing"
                class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-10 h-10 text-white p-2 bg-black rounded-full"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
                    ></path>
                </svg>
                <span class="ml-3 text-xl">SimpleQA</span>
            </Link>
            <nav
                class="m-2 md:ml-auto flex flex-wrap items-center text-base justify-center"
            >
                <Link
                    :href="myIssuesLink()"
                    as="button"
                    class="mr-5 hover:text-gray-900"
                    v-if="$page.props.user"
                >
                    Pending Issues
                </Link>

                <Link
                    :href="myAllIssuesLink()"
                    as="button"
                    class="mr-5 hover:text-gray-900"
                    v-if="$page.props.user"
                >
                    All Issues
                </Link>

                <!--                <a class="mr-5 hover:text-gray-900">Second Link</a>-->
                <Link
                    class="hover:text-gray-900"
                    href="/logout"
                    method="delete"
                    as="button"
                    v-if="$page.props.user"
                    >Logout</Link
                >

                <div class="m-4 hover:text-gray-900">
                    <v-switch
                        v-if="
                            $page.props.user &&
                            $page.component === 'Index/Index'
                        "
                        v-model="switcher"
                        label="Filters"
                        color="black"
                        hide-details
                    ></v-switch>
                </div>

                <!--                <Link-->
                <!--                    class="mr-5 hover:text-gray-900"-->
                <!--                    href="/login"-->
                <!--                    v-if="!$page.props.user"-->
                <!--                >Login</Link>-->
            </nav>
            <div class="xs:mt-5 md:">
                <Link
                    href="/createIssue"
                    class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base sm:mt-4 md:mt-0"
                    v-if="$page.props.user?.role === 'QA'"
                >
                    <svg
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        class="w-4 h-4 ml-1"
                        viewBox="0 0 24 24"
                    >
                        <path d="M12 5v14M5 12h14"></path>
                    </svg>

                    Create Issue
                </Link>
            </div>
        </div>
    </header>
    <slot></slot>
    <footer class="text-gray-600 body-font">
        <div
            class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col"
        >
            <a
                class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-10 h-10 text-white p-2 bg-black rounded-full"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
                    ></path>
                </svg>
                <span class="ml-3 text-xl">SimpleQA</span>
            </a>
            <p
                class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4"
            >
                © 2023 Milad Khader —
                <a
                    href="https://twitter.com/musicandgodmean"
                    class="text-gray-600 ml-1"
                    rel="noopener noreferrer"
                    target="_blank"
                    >@musicandgodmean</a
                >
            </p>
            <span
                class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start"
            >
            </span>
        </div>
    </footer>
</template>

<script>
export default {};
</script>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed, onMounted, provide, ref } from "vue";

let switcher = ref(false);

const userData = computed(() => {
    if (usePage().props.user)
        return [usePage().props.user.name, usePage().props.user.email];
    else return null;
});

const baseUrl = "http://localhost:8000";
const baseUrlDev = "http://localhost:8000/dev";

const myIssuesLink = () => {
    const { user } = usePage().props;
    let link = "";
    if (user.role === "dev") {
        link = `${baseUrlDev}?priority=&statuses=Pending&title=&reporters=`;
    } else {
        link = `${baseUrl}/?priority=&status=Pending&title=&reporters=${user.id}&departments=`; //?priority=&statuses=&title=&reporters=1&departments= //
    }

    return link;
};

const myAllIssuesLink = () => {
    const { user } = usePage().props;

    let link = "";
    if (user.role === "dev") {
        link = baseUrlDev;
    } else {
        link = baseUrl;
    }

    return link;
};

//const emit=defineEmits(['toggle-filter'])

// const toggleFilter = () => {
//     props.showFilter = !props.showFilter;
// };

provide("switcher", switcher);
</script>
<style scoped></style>
