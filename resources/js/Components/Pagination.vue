<template>
    <nav class="flex items-center justify-between">
        <div class="flex items-center">
            <button
                v-if="pagination.links"
                v-for="link in pagination.links"
                :key="link.label"
                @click="goTo(link.url)"
                :class="{
          'cursor-not-allowed': link.url === null,
          'bg-blue-500 text-white': link.active,
          'text-blue-500': !link.active && link.url,
          'text-gray-500': !link.url,
        }"
                class="px-4 py-2 mx-1 rounded-lg hover:bg-blue-500 hover:text-white focus:outline-none"
                :disabled="link.url === null">
                <div class="book-title" v-html="link.label"></div>

            </button>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        pagination: Object,
    },
    methods: {
        goTo(url) {
            if (url) {
                this.$inertia.visit(url);
            }
        },
    },
};
</script>
