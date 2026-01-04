<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted, ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
//import { Inertia } from '@inertiajs/inertia';
import PrimaryButton from '@/Components/PrimaryButton.vue';


let props = defineProps({
    topics : Object,
});

onMounted(() => {
});

</script>

<template>
    <AppLayout title="Topics">
        <template #header>
            <div class="flex items-center justify-between px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Teme
                </h2>
                <NavLink onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </NavLink>
            </div>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between mb-4 px-8">
                    <PrimaryButton
                        class="cursor-pointer text-sm focus:outline-none bg-green-500 hover:bg-green-700"
                        @click="router.get(route('topics.create'))"
                    >Dodaj novu temu
                    </PrimaryButton>

                </div>

                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Naziv teme</th>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"></th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr v-for="topic in props.topics" :key="topic.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ topic.name }}
                                            </td>

                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <Link class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900" :href="route('messages', topic.id)" tabindex="-1" title="Edit">
                                                    Prikazi
                                                </Link>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
