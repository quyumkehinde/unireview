<template>
    <button class="p-3 bg-green-500 text-white hover:bg-green-300">{{ text }}</button>
</template>

<script>
export default {
    props: {
        text: String,
    }
}
</script>