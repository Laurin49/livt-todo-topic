<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import { BackwardIcon, PencilIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    todo: {
        type: Object,
        required: true,
    },
    topics: Array
});
const form = useForm({
    name: props.todo?.name,
    topic_id: props.todo?.topic_id,
});
</script>

<template>

    <Head title="Update Todo" />

    <AuthenticatedLayout>
        <div class="py-4 mx-auto max-w-7xl">
            <div class="max-w-6xl p-6 mx-auto mt-6 rounded-lg shadow-lg bg-slate-100">
                <div class="flex justify-between pb-4">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-700">Update Todo</h1>
                    </div>
                    <Link href="#" onclick="history.back()"
                        class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700 flex items-center">
                    <BackwardIcon class="h-5 w-5 mr-1" />Back
                    </Link>
                </div>
                <form @submit.prevent="form.put(route('todos.update', todo.id))">
                    <div class="mt-4">
                        <InputLabel for="name" value="Name" />
                        <TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" autofocus
                            autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="topic_id" value="Topic" />
                        <select id="topic_id" v-model="form.topic_id" class="block w-full mt-1">
                            <option value="">Select a Topic</option>
                            <option v-for="topic in topics" :key="topic.id" :value="topic.id">
                                {{ topic.name }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.topic_id" />
                    </div>
                    <div class="flex items-center mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            <PencilIcon class="h-5 w-5 mr-1" />Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>