<template>
    <div>
        <div id="wrapper">
            <Header></Header>
            <main>
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="index3.html" class="brand-link">
                        <span class="brand-text font-weight-light">AdminLTE 3</span>
                    </a>
                    <Sidebar/>
                </aside>
                <router-view></router-view>
            </main>
            <Footer></Footer>
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

<style scoped src="../../../../public/admin/assets/dist/css/adminlte.min.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/iCheck/flat/blue.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/morris/morris.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/datepicker/datepicker3.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/daterangepicker/daterangepicker-bs3.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"></style>
