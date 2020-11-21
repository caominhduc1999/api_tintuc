<template>
    <main>
        <router-view></router-view>
        <FlashMessage position="right bottom"></FlashMessage>
    </main>
</template>

<script>
    export default {
        name: "App",
    }
</script>

<style scoped>

</style>