<template>
    <section class="h-screen">
        <div class="h-full">


            <div
                class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-center">

                <div class="mb-12 md:mb-0 md:w-8/12 lg:w-80 xl:w-80">
                    <h1 class="text-uppercase text-xl text-center text-capitalize mb-4">Login</h1>
                    <form @submit.prevent="login">

                        <!-- Email input -->
                        <div class="relative mb-6" >
                            <input
                                type="text"
                                class="ring-1 peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput2"

                                v-model="LoginData.email"
                            />
                            <label
                                for="exampleFormControlInput2"
                                :class="{'-translate-y-[1.15rem]  scale-[0.8]':LoginData.email}"
                                class="transition-all duration-150 select-auto bg-white px-1 pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8]  dark:text-black 200 dark:peer-focus:text-black 200"
                            >Email address
                            </label>
                            <p class="text-red-500 text-sm"> {{LoginData.errors.email}}</p>

                        </div>

                        <!-- Password input -->
                        <div class="relative mb-6" >
                            <input
                                type="password"
                                class="ring-1 peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[2.15] outline-gray-500 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-black 200 dark:placeholder:text-black 200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="exampleFormControlInput22"
                                v-model="LoginData.password"

                            />
                            <label
                                for="exampleFormControlInput22"
                                :class="{'-translate-y-[1.15rem]  scale-[0.8]':LoginData.password}"
                                class="transition-all duration-150 select-auto bg-white px-1 pointer-events-none absolute top-0 left-3 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-black transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8]  dark:text-black 200 dark:peer-focus:text-black 200"
                            >Password
                            </label>

                            <p class="text-red-500 text-sm"> {{LoginData.errors.password}}</p>

                        </div>

                        <div class="mb-6 flex items-center justify-between">

                        <div class="text-center lg:text-left">
                            <button type="submit"
                                    class="inline-block rounded bg-black px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] bg-black text-white hover:bg-gray-800 disabled:bg-gray-50">Login</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>


<script>


import PrimaryButton from "@/Components/PrimaryButton.vue";
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Login",
    components: {PrimaryButton},
    layout:MainLayout
}


</script>

<script setup>
import {useForm, usePage} from "@inertiajs/vue3";
const LoginData = useForm({
email:'test@example.com',
password:'password',
token: usePage().props.csrf_token
});

const login = () => LoginData.post('/login');
</script>


<style scoped>

</style>
