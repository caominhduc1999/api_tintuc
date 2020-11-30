<template>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Management</h3>
                                <div class="row">
                                    <div class="card-tools col-md-10">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control float-right"
                                                   placeholder="Search Name" v-model="search.name">&nbsp;&nbsp;&nbsp;
                                            <input type="text" class="form-control float-right"
                                                   placeholder="Search Email" v-model="search.email">
                                            <button class="btn btn-primary" v-on:click="searchUsers"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success btn-sm btn-block"
                                                v-on:click="showNewUserModal"><span class="fa fa-plus"></span> Create
                                            New
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr v-for="(user, index) in users" v-bind:key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" v-on:click="editUser(user)">
                                                <span class="fa fa-edit"></span></button>
                                            <button class="btn btn-danger btn-sm" v-on:click="deleteUser(user)">
                                                <span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center" v-show="moreExists && search != null">
                                <button class="btn btn-sm btn-info" v-on:click="loadMore"><span class="fa fa-arrow-down"></span>Load More</button>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!--create user-->
        <b-modal ref="newUserModal" hide-footer title="Add User">
            <div class="d-block text-center">
                <form v-on:submit.prevent="createUser">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" v-model="userData.name" class="form-control" placeholder="Enter Name">
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="text" v-model="userData.email" class="form-control" placeholder="Enter Email">
                        <div style="color: red" v-if="errors.email">{{errors.email[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" v-model="userData.password" class="form-control" placeholder="Enter Password">
                        <div style="color: red" v-if="errors.password">{{errors.password[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideNewUserModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Save</button>
                </form>
            </div>
        </b-modal>


        <!--edit user-->
        <b-modal ref="editUserModal" hide-footer title="Edit User">
            <div class="d-block text-center">
                <form v-on:submit.prevent="updateUser">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" v-model="editUserData.name" class="form-control"
                               placeholder="Enter Name">
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label>Enter Email</label>
                        <input type="text" v-model="editUserData.email" class="form-control"
                               placeholder="Enter Email">
                        <div style="color: red" v-if="errors.email">{{errors.email[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" v-model="editUserData.password" class="form-control"
                               placeholder="Enter Password">
                        <div style="color: red" v-if="errors.password">{{errors.password[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideEditUserModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Update</button>
                </form>
            </div>
        </b-modal>
    </div>
</template>

<script>
    import * as userService from '../../services/user_service.js';

    export default {
        name: 'user',
        data() {
            return {
                users: [],
                userData: {
                    name: '',
                    email: '',
                    password: '',
                },
                editUserData: {},
                errors: {},
                moreExists: false,
                nextPage: 0,
                search: {
                    name: '',
                    email: ''
                },
            }
        },

        mounted() {
            this.loadMore();
        },


        methods: {
            loadUsers: async function () {
                try {
                    const response = await userService.loadUsers();
                    this.users = response.data.data;
                } catch (error) {
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            searchUsers: async function() {
                let formData = new FormData();
                formData.append('name', this.search.name);
                formData.append('email', this.search.email);

                try {
                    const response = await userService.searchUsers(formData);
                    this.users = response.data.data;
                } catch (error) {
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            createUser: async function () {
                let formData = new FormData();
                formData.append('name', this.userData.name);
                formData.append('email', this.userData.email);
                formData.append('password', this.userData.password);

                try {
                    const response = await userService.createUser(formData)
                    this.users.unshift(response.data.data);
                    this.flashMessage.success({
                        message: 'User stored successfully !',
                        time: 5000
                    });
                    this.userData = {
                        name: '',
                        email: '',
                        password: '',
                    };

                    this.hideNewUserModal();
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.errors = error.response.data.errors;
                            break;
                        default:
                            this.flashMessage.error({
                                message: 'Something error. Please try again !',
                                time: 5000
                            });
                            break;
                    }
                }
            },

            deleteUser: async function (user) {
                if (!window.confirm(`Are you want to delete ${user.name} ?`)) {
                    return;
                }

                try {

                    await userService.deleteUser(user.id);
                    this.users = this.users.filter(obj => {
                        return obj.id !== user.id;
                    });

                    this.flashMessage.success({
                        message: 'User deleted successfully !',
                        time: 5000
                    });
                } catch (error) {
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            editUser: async function (user) {
                this.editUserData = {...user};
                this.showEditUserModal();
            },

            updateUser: async function () {
                try {
                    const formData = new FormData();
                    formData.append('name', this.editUserData.name);
                    formData.append('email', this.editUserData.email);
                    formData.append('password', this.editUserData.password);
                    formData.append('_method', 'put');

                    const response = await userService.updateUser(this.editUserData.id, formData);
                    this.users.map(user => {
                        if (user.id === response.data.data.id) {
                            for (let key in response.data.data) {
                                user[key] = response.data.data[key];
                            }
                        }
                    });

                    this.hideEditUserModal();
                    this.flashMessage.success({
                        message: 'User updated successfully !',
                        time: 5000
                    });
                } catch (error) {
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            hideNewUserModal() {
                this.$refs.newUserModal.hide();
            },

            showNewUserModal() {
                this.$refs.newUserModal.show();
            },

            hideEditUserModal() {
                this.$refs.editUserModal.hide();
            },

            showEditUserModal() {
                this.$refs.editUserModal.show();
            },

            loadMore: async function () {
                try {
                    const response = await userService.loadMore(this.nextPage)
                    if (response.data.data.current_page < response.data.data.last_page) {
                        this.moreExists = true;
                        this.nextPage = response.data.data.current_page + 1;
                    } else {
                        this.moreExists = false;
                    }

                    response.data.data.data.forEach(data => {
                        this.users.push(data)
                    })
                } catch (e) {
                    this.flashMessage.error({
                        message: 'Something error during loading more categories !',
                        time: 5000
                    });
                }
            }
        },

    }
</script>

<style scoped src="../../../../public/admin/assets/plugins/font-awesome/css/font-awesome.min.css"></style>
