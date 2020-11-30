<template>
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <router-link to="/index" exact>
                <i class="fa fa-home"></i>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home Page</a>
                </li>
            </router-link>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" v-if="token">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <span class="badge badge-danger navbar-badge" v-on:click.prevent="logout">Logout</span>
                </a>
            </li>

        </ul>
    </nav>
</template>

<script>
    export default {
        name: "Header",
        data() {
            return {
                token: '',
            }
        },

        computed: {
            loggedIn()
            {
                return this.$store.getters.get_loggedIn
            }
        },

        mounted() {
            this.checkUserStatus()
        },

        methods: {
            checkUserStatus() {
                if (localStorage.getItem('token') != null) {
                    this.token = localStorage.getItem('token')
                }
            },

            logout() {
                // this.$store.dispatch('logout')
                //     .then(res => {
                //         this.$router.push('/login')
                //     })
                //     .catch(err => {
                //         console.log(err)
                //     })
                localStorage.removeItem('token')
                localStorage.removeItem('user')
                this.$router.push('/login')
            }
        }
    }
</script>
