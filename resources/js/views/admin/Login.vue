<template>
    <body class="hold-transition login-page">
        <div class="login-box">
        <!-- /.login-logo -->
        <circle-spin v-show="isLoading"></circle-spin>
        <div class="card" v-show="!isLoading">
            <div class="card-body login-card-body">
                <router-link to="/index" class="nav-link" exact>
                    <h4 style="text-align: center">Go to Home Page</h4>
                </router-link>
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="../../index2.html" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" id="email" class="form-control" placeholder="Email" v-model="email" required>
                        <span class="fa fa-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" class="form-control" placeholder="Password" v-model="password" required>
                        <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                    <div class="alert alert-danger" v-if="error">
                        <p>Sign in fail. Please try again!</p>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-block btn-flat" v-on:click.prevent="login">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <hr>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                    <p>- OR -</p>
                    <router-link to="/register">
                        <a href="#" class="btn btn-block btn-success">
                            <i class="fa fa-google-plus mr-2"></i> Register new account
                        </a>
                    </router-link>
                </div>
                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    </body>
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
                this.isLoading = true;
                axios.post('http://localhost:8000/api/auth/login', {
                    email: this.email,
                    password: this.password
                }).then(res => {
                    this.isLoading = false;
                    localStorage.setItem('token', res.data.access_token)
                    localStorage.setItem('user', JSON.stringify(res.data.user))
                    this.$router.push('/home')
                })
                    .catch(err => {
                        this.error = err
                    })
            }
        }
    }
</script>

<style scoped src="../../../../public/admin/assets/dist/css/adminlte.min.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/iCheck/square/blue.css"></style>