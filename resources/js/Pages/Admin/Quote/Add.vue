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
                        <div v-if="errors.content" class="text-red-500 text-sm mb-2">{{ errors.content[0] }}</div>
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
                    <div v-if="errors.answers" class="text-red-500 text-sm mb-2">{{ errors.answers }}</div>

                    <div v-for="(answer, index) in form.answers" :key="index" class="mb-4">
                        <label :for="`answer-${index}`" class="block text-sm font-medium mb-2">Answer {{
                                index + 1
                            }}</label>
                        <div class="flex items-center">

                            <div v-if="errors[`answers.${index}.content`]" class="text-red-500 text-sm mb-2">
                                {{ errors[`answers.${index}.content`][0] }}
                            </div>
                            <input
                                :id="`answer-${index}`"
                                v-model="answer.content"
                                type="text"
                                class="w-full p-2 border rounded"
                                :placeholder="`Enter answer ${index + 1}...`"
                                required
                            />

                            <label class="ml-2">Correct  <input type="radio" :value="index" v-model="form.correctAnswerIndex" class="ml-4"></label>
                        </div>

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
        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </ActionMessage>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import ActionMessage from '@/Components/ActionMessage.vue';

export default {
    components: {AppLayout,ActionMessage},
    props: {
        errors: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                content: "",
                answers: [{content: ""}],
                correctAnswerIndex: 0
            }),
        };
    },
    methods: {
        addAnswer() {
            if (this.form.answers.length !== 3) {
                this.form.answers.push({content: ""});
            }
        },
        submit() {
            this.form.post(this.route('quote.store'), {
                onFinish: (data) => {
                    this.form.reset()
                },
            });
        },
    },
};
</script>
