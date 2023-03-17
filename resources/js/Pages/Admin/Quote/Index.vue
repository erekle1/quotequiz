<template>
    <app-layout title="Quote">
        <template #header>
            <div class="flex justify-between ">
                <h1 class="text-2xl font-semibold">Quotes</h1>
                <Link
                    :href="route('quote.create')"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                    Add Quote
                </Link>
            </div>
        </template>
        <div class="container mx-auto px-4 py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <table class="w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="p-2 border-b border-gray-200 text-left">ID</th>
                        <th class="p-2 border-b border-gray-200 text-left">Content</th>
                        <th class="p-2 border-b border-gray-200 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="quote in quotes.data" :key="quote.id">
                        <td class="p-2 border-b border-gray-200">{{ quote.id }}</td>
                        <td class="p-2 border-b border-gray-200">{{ quote.content }}</td>
                        <td class="p-2 border-b border-gray-200">
                            <button

                                class="bg-yellow-500 text-white px-2 py-1 rounded shadow hover:bg-yellow-600"
                            >
                                Edit
                            </button>
                            <button
                                @click="openDeleteModal(quote)"
                                class="bg-red-500 text-white px-2 py-1 rounded shadow hover:bg-red-600"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <pagination :pagination="quotes.meta"/>

            </div>
            <!-- Create, Edit and Delete modals will be placed here -->
        </div>
    </app-layout>

</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from "@/Components/Pagination.vue";
import { Link } from '@inertiajs/vue3'

export default {
    components: {AppLayout, Pagination,Link},
    props: {
        quotes: Object,
    },
    methods: {
        openDeleteModal(quote) {
            // Open the modal for deleting the selected quote
        },
    },
};
</script>

