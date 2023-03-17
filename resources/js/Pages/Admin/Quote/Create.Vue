<template>
    <app-layout title="Quote">
        <template #header>
            <div class="flex justify-between ">
                <h1 class="text-2xl font-semibold">Add new quote</h1>
            </div>
        </template>
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <form @submit.prevent="submit">
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium mb-2">Quote Content</label>
                        <textarea
                            id="content"
                            v-model="form.content"
                            class="w-full p-2 border rounded"
                            rows="4"
                            placeholder="Enter quote content..."
                            required
                        ></textarea>
                    </div>
                    <h2 class="text-xl font-semibold mb-4">Answers</h2>
                    <div v-for="(answer, index) in form.answers" :key="index" class="mb-4">
                        <label :for="`answer-${index}`" class="block text-sm font-medium mb-2">Answer {{
                                index + 1
                            }}</label>
                        <input
                            :id="`answer-${index}`"
                            v-model="answer.content"
                            type="text"
                            class="w-full p-2 border rounded"
                            :placeholder="`Enter answer ${index + 1}...`"
                            required
                        />
                    </div>
                    <div v-if="form.answers.length < 3" class="mb-6">
                        <button @click.prevent="addAnswer" class="text-blue-500 hover:text-blue-700 focus:outline-none">
                            Add Answer
                        </button>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none"
                        >
                            Save Quote
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    components: {AppLayout},

    data() {
        return {
            form: {
                content: "",
                answers: [{content: ""}],
            },
        };
    },
    methods: {
        addAnswer() {
            if (this.form.answers.length  !== 3) {
                this.form.answers.push({content: ""});
            }
        },
        submit() {
            Inertia.post('/quotes', form);
        },
    },
};
</script>
