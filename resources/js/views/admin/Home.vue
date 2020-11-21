<template>
    <div>
        <Header></Header>
        <div id="layoutSidenav">
            <Sidebar></Sidebar>
            <div id="layoutSidenav_content">
                <main>
                    <router-view></router-view>
                </main>
                <Footer></Footer>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from '../../components/Header.vue';
    import Sidebar from '../../components/Sidebar.vue';
    import Footer from '../../components/Footer.vue';

    export default {
        name: "Home",
        components: {
            Header,
            Sidebar,
            Footer
        },
    }
</script>
