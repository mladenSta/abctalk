<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted, ref } from 'vue';
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'
//import { Inertia } from '@inertiajs/inertia';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Form from "@/Pages/Topics/Form.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";


let props = defineProps({
    topic : Object,
    messages : Object,
});

const submitForm = () => {

        form.post(route('messages.store'), {
            preserveState: true,
            preserveScroll: true,
        });

};

const form = useForm({
    content: '',
    topic_id: props.topic.id,
});

onMounted(() => {
});

</script>

<template>
    <AppLayout title="Topics">
        <template #header>
            <div class="flex items-center justify-between px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ topic.name }}
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
                <div class="px-4 sm:px-6 lg:px-8 mb-4 mt-8">
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="submitForm" novalidate>
                                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                            <div>
                                            </div>

                                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                                                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                    <TextInput
                                                        id="name"
                                                        v-model="form.content"
                                                        type="text"
                                                        class="appearance-none col-span-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                        :class="{ 'border-red-300': form.errors.content }"
                                                        required
                                                        autofocus
                                                        autocomplete="content" />
                                                    <div class="flex justify-end">
                                                        <PrimaryButton class="bg-green-500 hover:bg-green-700" type="submit" :disabled="form.processing">Pošalji poruku</PrimaryButton>
                                                    </div>
                                                    <div></div>
                                                    <p v-if="form.errors.content">{{ form.errors.content }}</p>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="pt-5">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Poruke</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr v-for="message in props.messages" :key="message.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ message.user.name }} - {{ message.created_at }}<br>
                                                {{ message.content }}
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
