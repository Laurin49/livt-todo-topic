<script setup>
import Table from '@/Components/myComponents/Table.vue';
import TableDataCell from '@/Components/myComponents/TableDataCell.vue';
import TableHeaderCell from '@/Components/myComponents/TableHeaderCell.vue';
import TableRow from '@/Components/myComponents/TableRow.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Modal from '@/Components/Modal.vue';
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { PencilIcon, TrashIcon, PlusIcon } from '@heroicons/vue/24/solid';

defineProps(["topics"]);
const form = useForm({});

const showConfirmDeleteTopicModal = ref(false);
const currentTopicId = ref(0);

const confirmDeleteTopic = (id) => {
    showConfirmDeleteTopicModal.value = true;
    currentTopicId.value = id;
};

const closeModal = () => {
    showConfirmDeleteTopicModal.value = false;
};

const deleteTopic = () => {
    form.delete(route("topics.destroy", currentTopicId.value), {
        onSuccess: () => closeModal(),
    });
};
</script>

<template>

    <Head title="Topic Index" />

    <AuthenticatedLayout>
        <div class="py-2 px-2 mx-auto max-w-7xl">
            <div class="flex justify-between items-center border-b border-gray-400 pb-2 mb-2">
                <h1 class="text-2xl font-semibold text-gray-700">Topic Index Page</h1>
            </div>
            <div class="flex justify-end items-center">
                <div class="relative group">
                    <Link :href="route('topics.create')"
                        class="flex items-center pr-1 font-semibold text-indigo-400 hover:text-indiogo-600 rounded">
                    <span class="px-3 py-2 font-semibold bg-blue-400 text-white hover:bg-blue-600 flex items-center">
                        <PlusIcon class="h-5 w-5 mr-1" />Create
                    </span>
                    </Link>
                    <!-- Tooltip -->
                    <div
                        class="absolute left-1/2 transform -translate-x-1/2 bottom-full mb-2 w-max px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity">
                        Create Topic
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>Name</TableHeaderCell>
                            <TableHeaderCell class="text-end">Edit</TableHeaderCell>
                            <TableHeaderCell class="text-end">Delete</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow v-for="topic in topics" :key="topic.id" class="border-b">
                            <TableDataCell>{{ topic.id }}</TableDataCell>
                            <TableDataCell>{{ topic.name }}</TableDataCell>
                            <TableDataCell>
                                <div class="text-end flex justify-end">
                                    <div class="relative group">
                                        <Link :href="route('topics.edit', topic.id)"
                                            class="text-green-400 hover:text-green-600">
                                        <PencilIcon class="h-5 w-5" />
                                        </Link>
                                        <!-- Tooltip -->
                                        <div
                                            class="absolute left-1/2 transform -translate-x-1/2 bottom-full mb-2 w-max px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                            Edit
                                        </div>
                                    </div>
                                </div>
                            </TableDataCell>
                            <TableDataCell>
                                <div class="text-end flex justify-end">
                                    <div class="relative group">
                                        <button @click="confirmDeleteTopic(topic.id)"
                                            class="text-red-400 hover:text-red-600">
                                            <TrashIcon class="h-5 w-5" />
                                        </button>
                                        <!-- Tooltip -->
                                        <div
                                            class="absolute left-1/2 transform -translate-x-1/2 bottom-full mb-2 w-max px-2 py-1 bg-gray-800 text-white text-sm rounded opacity-0 group-hover:opacity-100 transition-opacity">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </TableDataCell>
                        </TableRow>
                        <Modal :show="showConfirmDeleteTopicModal" @close="closeModal">
                            <div class="p-6">
                                <h2 class="text-lg font-semibold text-slate-800">
                                    Are you sure to delete this
                                    Topic?
                                </h2>
                                <div class="flex mt-6 space-x-4">
                                    <DangerButton @click="deleteTopic()">Delete
                                    </DangerButton>
                                    <SecondaryButton @click="closeModal">Cancel
                                    </SecondaryButton>
                                </div>
                            </div>
                        </Modal>
                    </template>
                </Table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
