<template>

    <nav
        class="flex-no-wrap relative flex w-full items-center justify-between bg-neutral-100 py-4 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-6">
            <button
                class="block border-0 bg-transparent py-2 px-2.5 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                type="button"
                data-te-collapse-init
                data-te-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1"
                aria-expanded="false"
                aria-label="Toggle navigation">
      <span class="[&>svg]:w-7">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor"
            class="h-7 w-7">
          <path
              fill-rule="evenodd"
              d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
              clip-rule="evenodd" />
        </svg>
      </span>
            </button>
            <div
                class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
                id="navbarSupportedContent1"
                data-te-collapse-item>
                <a
                    class="mt-2 mr-2 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mt-0"
                    href="#">
                    <img
                        src="https://tecdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.png"
                        style="height: 15px"
                        alt=""
                        loading="lazy" />
                </a>
                <!-- Left links -->
                <ul
                    class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
                    data-te-navbar-nav-ref>
                    <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
                            href="#"
                            data-te-nav-link-ref
                        >Dashboard</a
                        >
                    </li>
                    <li class="lg:pr-2" data-te-nav-item-ref>
                        <a
                            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="#"
                            data-te-nav-link-ref
                        >Issues</a
                        >
                    </li>

                    <li class="lg:pr-2 text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400" v-if="userData && userData[0]">{{userData[0]}}</li>

                    <li class="lg:pr-2" data-te-nav-item-ref v-if="userData"
                    >
                        <Link
                            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="/logout"
                            method="delete"
                            as="button"
                            data-te-nav-link-ref
                        >Logout</Link
                        >
                    </li>

                    <li class="lg:pr-2" data-te-nav-item-ref v-else
                    >
                        <Link
                            class="text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            href="/login"
                            data-te-nav-link-ref
                        >Login</Link
                        >
                    </li>




                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="relative flex items-center">

                <div class="relative" data-te-dropdown-ref>
                    <a
                        class="hidden-arrow mr-4 flex items-center text-neutral-500 hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                        href="#"
                        id="dropdownMenuButton1"
                        role="button"
                        data-te-dropdown-toggle-ref
                        aria-expanded="false">
          <span class="[&>svg]:w-5" >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="h-5 w-5">
              <path
                  fill-rule="evenodd"
                  d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                  clip-rule="evenodd" />
            </svg>
          </span>
            <Link href="/createIssue" v-if="$page.props.user?.role ==='dev'">
                <span class="[&>svg]:w-5 ml-3 mr">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-5 w-5">
                  <path
                      fill-rule="evenodd"
                      d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                      clip-rule="evenodd" />
                </svg>
              </span>
             </Link>

                        <span
                            class="absolute -mt-2.5 ml-2 rounded-full bg-red-700 py-0 px-1.5 text-xs text-white"
                        >1</span
                        >
                    </a>
                    <ul
                        class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1"
                        data-te-dropdown-menu-ref>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="#"
                                data-te-dropdown-item-ref
                            >Action</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="#"
                                data-te-dropdown-item-ref
                            >Another action</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="#"
                                data-te-dropdown-item-ref
                            >Something else here</a
                            >
                        </li>
                    </ul>
                </div>
                <div class="relative" data-te-dropdown-ref>
                    <a
                        class="hidden-arrow flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
                        href="#"
                        id="dropdownMenuButton2"
                        role="button"
                        data-te-dropdown-toggle-ref
                        aria-expanded="false">
                        <img
                            src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
                            class="rounded-full"
                            style="height: 25px; width: 25px"
                            alt=""
                            loading="lazy" />
                    </a>
                    <ul
                        class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton2"
                        data-te-dropdown-menu-ref>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="#"
                                data-te-dropdown-item-ref
                            >Action</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="#"
                                data-te-dropdown-item-ref
                            >Another action</a
                            >
                        </li>
                        <li>
                            <a
                                class="block w-full whitespace-nowrap bg-transparent py-2 px-4 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-white/30"
                                href="#"
                                data-te-dropdown-item-ref
                            >Something else here</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
    </nav>

    <slot></slot>
    <footer
        class="bg-neutral-100 text-center text-neutral-600 dark:bg-neutral-600 dark:text-neutral-200 lg:text-left">
        <div
            class="flex items-center justify-center border-b-2 border-neutral-200 p-6 dark:border-neutral-500 lg:justify-between">
            <div class="mr-12 hidden lg:block">
            </div>
        </div>
        <div class="mx-6 py-10 text-center md:text-left">
            <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="">
                    <h6
                        class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="mr-3 h-4 w-4">
                            <path
                                d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z" />
                        </svg>
                        KarajkomQA
                    </h6>
                    <p>
                        A shaved-down JIRA-like issue reporting & tracking system
                    </p>
                </div>
                <div class="">
                    <h6
                        class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                        Useful links
                    </h6>
                    <p class="mb-4">
                        <a href="#!" class="text-neutral-600 dark:text-neutral-200"
                        >Pending Issues</a
                        >
                    </p>

                </div>
            </div>
        </div>
        <div class="bg-neutral-200 p-6 text-center dark:bg-neutral-700">
            <span>© 2023 Copyright : </span>
            <a
                class="font-semibold text-neutral-600 dark:text-neutral-400"
                href="#"
            >Karajkom QA</a
            >
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



</script>

<style scoped>

</style>
