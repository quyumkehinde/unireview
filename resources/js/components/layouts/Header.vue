<template>
    <header class="flex justify-between items-center py-3 sm:py-4 sm:px-10 px-3 bg-white">
        <router-link to="/" class="text-3xl font-bold">Uni<span class="text-green-500">Review</span></router-link>
        <nav class="flex items-center">
            <router-link to="/blog" class="ml-3 hover:underline">Blog</router-link>
            <router-link :to="{ name: 'SelectSchool' }" class="inline-block p-3 bg-green-500 hover:bg-green-300 text-white ml-7">Submit Review</router-link>
        </nav>
    </header>
</template>

<script>
export default {
    
}
</script>