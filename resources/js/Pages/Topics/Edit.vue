<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    topic: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.topic?.name,
});
</script>

<template>

    <Head title="Update Topic" />

    <AuthenticatedLayout>
        <div class="py-4 mx-auto max-w-7xl">
            <div class="flex justify-between px-6">
                <Link :href="route('topics.index')"
                    class="px-3 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-700">Back
                </Link>
            </div>
            <div class="max-w-6xl p-6 mx-auto mt-6 rounded-lg shadow-lg bg-slate-100">
                <h1 class="text-2xl font-semibold text-indigo-700">Update Topic</h1>
                <form @submit.prevent="form.put(route('topics.update', topic.id))">
                    <div class="mt-4">
                        <InputLabel for="name" value="Name" />
                        <TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" autofocus
                            autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="flex items-center mt-4">
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Update
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>