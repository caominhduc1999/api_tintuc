<template>
    <body class="hold-transition register-page">
        <div class="register-box">
        <circle-spin v-show="isLoading"></circle-spin>
        <div class="card" v-show="!isLoading">
            <div class="card-body register-card-body">
                <router-link to="/index" class="nav-link" exact>
                    <h4 style="text-align: center">Go to Home Page</h4>
                </router-link>
                <p class="login-box-msg">Register new account</p>
                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" id="name" class="form-control" v-model="name" placeholder="Name">
                        <span class="help-block" v-if="error && errors.name">{{ errors.name }}</span>
                        <span class="fa fa-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" id="email" class="form-control" placeholder="Email" v-model="email">
                        <span class="help-block" v-if="error && errors.email">{{ errors.email }}</span>
                        <span class="fa fa-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" class="form-control" v-model="password" placeholder="Password">
                        <span class="help-block" v-if="error && errors.password">{{ errors.password }}</span>
                        <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                    <div class="alert alert-danger" v-if="error">
                        <p>Failed to registration.</p>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-block btn-flat" v-on:click.prevent="register">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>

                </form>

                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fa fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fa fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>
                <router-link to="/login">
                    <a href="" class="text-center">I already have an account</a>
                </router-link>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
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
                this.isLoading = true;
                axios.post('http://localhost:8000/api/auth/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }).then(res => {
                    this.isLoading = false
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

<style scoped src="../../../../public/admin/assets/dist/css/adminlte.min.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/iCheck/square/blue.css"></style>