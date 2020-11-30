<template>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Category Management</h3>
                                <div class="row">
                                    <div class="card-tools col-md-10">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control float-right"
                                                   placeholder="Search" v-model="search.name">
                                            <button class="btn btn-primary" v-on:click="searchCategories"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success btn-sm btn-block"
                                                v-on:click="showNewCategoryModal"><span class="fa fa-plus"></span> Create
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
                                        <th>Action</th>
                                    </tr>
                                    <tr v-for="(category, index) in categories" v-bind:key="index">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ category.name }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" v-on:click="editCategory(category)">
                                                <span class="fa fa-edit"></span></button>
                                            <button class="btn btn-danger btn-sm" v-on:click="deleteCategory(category)">
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
        <!--create category-->
        <b-modal ref="newCategoryModal" hide-footer title="Add Category">
            <div class="d-block text-center">
                <form v-on:submit.prevent="createCategory">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" v-model="categoryData.name" class="form-control" placeholder="Enter Name">
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideNewCategoryModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Save</button>
                </form>
            </div>
        </b-modal>


        <!--edit category-->
        <b-modal ref="editCategoryModal" hide-footer title="Edit Category">
            <div class="d-block text-center">
                <form v-on:submit.prevent="updateCategory">
                    <div class="form-group">
                        <label>Enter Name</label>
                        <input type="text" v-model="editCategoryData.name" class="form-control"
                               placeholder="Enter Name">
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideEditCategoryModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Update</button>
                </form>
            </div>
        </b-modal>
    </div>
</template>

<script>
    import * as categoryService from '../../services/category_service.js';

    export default {
        name: 'category',
        data() {
            return {
                categories: [],
                categoryData: {
                    name: '',
                },
                editCategoryData: {},
                errors: {},
                moreExists: false,
                nextPage: 0,
                search: {
                    name: ''
                },
            }
        },

        mounted() {
            this.loadMore();
        },


        methods: {
            loadCategories: async function () {
                try {
                    const response = await categoryService.loadCategories();
                    this.categories = response.data.data;
                } catch (error) {
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            searchCategories: async function() {
                let formData = new FormData();
                formData.append('name', this.search.name);

                try {
                    const response = await categoryService.searchCategories(formData);
                    this.categories = response.data.data;
                } catch (error) {
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            createCategory: async function () {
                let formData = new FormData();
                formData.append('name', this.categoryData.name);

                try {
                    const response = await categoryService.createCategory(formData)

                    this.flashMessage.success({
                        message: 'Category stored successfully !',
                        time: 5000
                    });
                    this.categoryData = {
                        name: '',
                    };

                    this.hideNewCategoryModal();
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

            deleteCategory: async function (category) {
                if (!window.confirm(`Are you want to delete ${category.name} ?`)) {
                    return;
                }

                try {

                    await categoryService.deleteCategory(category.id);
                    this.categories = this.categories.filter(obj => {
                        return obj.id !== category.id;
                    });

                    this.flashMessage.success({
                        message: 'Category deleted successfully !',
                        time: 5000
                    });
                } catch (error) {
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            editCategory: async function (category) {
                this.editCategoryData = {...category};
                this.showEditCategoryModal();
            },

            updateCategory: async function () {
                try {
                    const formData = new FormData();
                    formData.append('name', this.editCategoryData.name);
                    formData.append('_method', 'put');

                    const response = await categoryService.updateCategory(this.editCategoryData.id, formData);
                    this.categories.map(category => {
                        if (category.id === response.data.data.id) {
                            for (let key in response.data.data) {
                                category[key] = response.data.data[key];
                            }
                        }
                    });

                    this.hideEditCategoryModal();
                    this.flashMessage.success({
                        message: 'Category updated successfully !',
                        time: 5000
                    });
                } catch (error) {
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            hideNewCategoryModal() {
                this.$refs.newCategoryModal.hide();
            },

            showNewCategoryModal() {
                this.$refs.newCategoryModal.show();
            },

            hideEditCategoryModal() {
                this.$refs.editCategoryModal.hide();
            },

            showEditCategoryModal() {
                this.$refs.editCategoryModal.show();
            },

            loadMore: async function () {
                try {
                    const response = await categoryService.loadMore(this.nextPage)
                    if (response.data.data.current_page < response.data.data.last_page) {
                        this.moreExists = true;
                        this.nextPage = response.data.data.current_page + 1;
                    } else {
                        this.moreExists = false;
                    }

                    response.data.data.data.forEach(data => {
                        this.categories.push(data)
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
