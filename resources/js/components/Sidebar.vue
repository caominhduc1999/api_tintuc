<template>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../../public/admin/assets/dist/img/user2-160x160.jpg" style="width: 50px;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="margin-left: 10px; margin-top: 10px;"> {{ user.name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <router-link to="/home" class="nav-link" exact>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link " style="color: white">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                </router-link>
                <router-link to="/home/categories" class="nav-link" exact>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link " style="color: white">
                        <i class="nav-icon fa fa-list"></i>
                        <span>
                            Categories
                        </span>
                    </a>
                </li>
                </router-link>
                <router-link to="/home/articles" class="nav-link" exact>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link " style="color: white">
                        <i class="nav-icon fa fa-book"></i>
                        <span>
                            Articles
                        </span>
                    </a>
                </li>
                </router-link>
                <router-link to="/home/tags" class="nav-link" exact>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link " style="color: white">
                            <i class="nav-icon fa fa-tags"></i>
                            <span>
                            Tags
                        </span>
                        </a>
                    </li>
                </router-link>
                <router-link to="/home/users" class="nav-link" exact>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link " style="color: white">
                            <i class="nav-icon fa fa-users"></i>
                            <span>
                            Users
                        </span>
                        </a>
                    </li>
                </router-link>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

</template>

<script>
    export default {

        data(){
            return{
                user: ''
            }
        },

        mounted() {
            this.user = JSON.parse(localStorage.getItem('user'));
        }
    }
</script>

<style scoped src="../../../public/admin/assets/plugins/font-awesome/css/font-awesome.min.css"></style>
