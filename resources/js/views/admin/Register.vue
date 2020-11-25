<template>
    <div class="container">
        <Header/>
        <div class="card card-default">
            <div class="card-header">Register</div>
            <div class="card-body">
                <div class="alert alert-danger" v-if="error">
                    <p>Here was an error, unable to complete registration.</p>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': error && errors.email }">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" v-model="name">
                    <span class="help-block" v-if="error && errors.name">{{ errors.name }}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': error && errors.email }">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                    <span class="help-block" v-if="error && errors.email">{{ errors.email }}</span>
                </div>
                <div class="form-group" v-bind:class="{ 'has-error': error && errors.password }">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" v-model="password">
                    <span class="help-block" v-if="error && errors.password">{{ errors.password }}</span>
                </div>
                <button type="button" class="btn btn-success" v-on:click.prevent="register">Register</button>
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
                name: '',
                email: '',
                password: '',
                error: '',
                isLoading: false
            }
        },
        methods: {
            register() {
                // this.isLoading = true;
                // this.$store
                //     .dispatch('register', {
                //         name: this.name,
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
                axios.post('http://localhost:8000/api/auth/register', {
                    name: this.name,
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