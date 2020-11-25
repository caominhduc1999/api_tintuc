<template>
    <div class="container">
        <Header/>
        <div class="card card-default">
            <div class="card-header">Sign In</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="error">
                    <p>Sign in fail. Please try again!</p>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" v-model="password" required>
                </div>
                <button type="button" class="btn btn-primary" v-on:click.prevent="login">Sign In</button>
                <circle-spin v-show="isLoading"></circle-spin>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import Header from "../../components/Header";

    export default {
        components: {Header},
        data: function () {
            return {
                email: "",
                password: "",
                error: "",
                isLoading: false
            }
        },

        methods: {
            login(){
                // this.isLoading = true;
                // this.$store
                //     .dispatch('login', {
                //         email: this.email,
                //         password: this.password
                //     })
                //     .then(res => {
                //         this.isLoading = false
                //         this.$router.push('/home')
                //     })
                //     .catch(err => {
                //         this.error = "There was error"
                //     })
                axios.post('http://localhost:8000/api/auth/login', {
                    email: this.email,
                    password: this.password
                }).then(res => {
                    localStorage.setItem('token', res.data.access_token)
                    localStorage.setItem('user', res.data.user)
                    this.$router.push('/home')
                })
                    .catch(err => {
                        this.error = err
                    })
            }
        }
    }
</script>