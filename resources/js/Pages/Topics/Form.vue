<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, usePage, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

import { router } from '@inertiajs/vue3'

let props = defineProps({
    topic : Object,
});

const submitForm = () => {

    if(!props.topic){
        form.post(route('topics.store'), {
            preserveState: true,
            preserveScroll: true,
        });
    } else {
        form.put(route('Topics.update', props.topic.id), {
            preserveState: true,
            preserveScroll: true,
        });
    }
};

const form = useForm({
    id: props.topic ? props.topic.id : null,
    name: props.topic ? props.topic.name : null,
});


</script>

<template>
    <AppLayout title="Topics">
        <template #header>
            <div class="flex items-center justify-between px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Topics
                </h2>
                <NavLink onclick="history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                </NavLink>
            </div>
        </template>

        <Div>
            <div class="px-4 sm:px-6 lg:px-8 mb-4 mt-8">
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="submitForm" novalidate>
                                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                                        <div>
                                            <h3 class="text-lg leading-6 font-medium text-gray-900">New Topic</h3>
                                        </div>

                                        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                                <InputLabel for="name" value="Name" />
                                                <TextInput
                                                    id="name"
                                                    v-model="form.name"
                                                    type="text"
                                                    class="appearance-none col-span-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                    :class="{ 'border-red-300': form.errors.name }"
                                                    required
                                                    autofocus
                                                    autocomplete="name" />
                                                <div></div>
                                                <p v-if="form.errors.name">{{ form.errors.name }}</p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="pt-5">
                                        <div class="flex justify-end">
                                            <Link :href="route('topics')" :cancel="true" class="px-4 py-2 text-red-500">Cancel</Link>
                                            <PrimaryButton class="bg-green-500 hover:bg-green-700" type="submit" :disabled="form.processing">Save</PrimaryButton>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Div>
    </AppLayout>
</template>

