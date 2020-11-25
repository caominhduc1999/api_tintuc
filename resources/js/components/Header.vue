<template>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="input-group">
            <div class="input-group-append" v-if="!token">
                <router-link to="/register">
                    <button class="btn btn-success" type="button">Register</button>
                </router-link>
            </div>
            <div class="input-group-append" v-if="!token">
                <router-link to="/login">
                    <button class="btn btn-info" type="button">Login</button>
                </router-link>
            </div>
            <div class="input-group-append" v-if="token">
                <button class="btn btn-danger" type="button" v-on:click.prevent="logout">Logout</button>
            </div>
        </div>
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

<style scoped>

</style>