<template>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>Category Management
                        <button class="btn btn-primary btn-sm" v-on:click="showNewCategoryModal"><span class="fa fa-plus"></span>Create New</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(category, index) in categories" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ category.name }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" v-on:click="editCategory(category)"><span class="fa fa-edit">Edit</span></button>
                                    <button class="btn btn-danger btn-sm" v-on:click="deleteCategory(category)"><span class="fa fa-trash">Delete</span></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="text-center" v-show="moreExists">
                            <button class="btn btn-sm btn-info" v-on:click="loadMore"><span class="fa fa-arrow-down"></span>Load More</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--create category-->
        <b-modal ref="newCategoryModal" hide-footer title="Add Category">
            <div class="d-block text-center">
                <form v-on:submit.prevent="createCategory">
                    <div class="form-group">
                        <label >Enter Name</label>
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
                        <label >Enter Name</label>
                        <input type="text" v-model="editCategoryData.name" class="form-control" placeholder="Enter Name">
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
        data(){
            return {
                categories: [],
                categoryData: {
                    name: '',
                },
                editCategoryData: {},
                errors: {},
                moreExists: false,
                nextPage: 0
            }
        },

        mounted(){
            this.loadCategories();
        },

        methods:{
            loadCategories : async function(){
                try{
                    const response = await categoryService.loadCategories();
                    this.categories = response.data.data;
                }catch(error){
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            createCategory: async function() {
                let formData = new FormData();
                formData.append('name', this.categoryData.name);

                try {
                    const response = await categoryService.createCategory(formData)
                    this.categories.unshift(response.data);
                    this.flashMessage.success({
                        message: 'Category stored successfully !',
                        time: 5000
                    });
                    this.categoryData = {
                        name: '',
                    };

                    this.loadCategories();
                    this.hideNewCategoryModal();
                }catch (error) {
                    switch(error.response.status){
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

            deleteCategory: async function(category){
                if(! window.confirm(`Are you want to delete ${category.name} ?`)){
                    return;
                }

                try{
                    await categoryService.deleteCategory(category.id);
                    this.categories = this.categories.filter(obj => {
                       return obj.id !== category.id;
                    });

                    this.flashMessage.success({
                        message: 'Category deleted successfully !',
                        time: 5000
                    });
                }catch(error){
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            editCategory: async function(category){
                this.editCategoryData = {...category};
                this.showEditCategoryModal();
            },

            updateCategory: async function(){
                try{
                    const formData = new FormData();
                    formData.append('name', this.editCategoryData.name);
                    formData.append('_method', 'put');

                    const response = await categoryService.updateCategory(this.editCategoryData.id, formData);
                    this.categories.map(category => {
                        if (category.id === response.data.id){
                           for(let key in response.data){
                               category[key] = response.data[key];
                           }
                        }
                    });

                    this.loadCategories();
                    this.hideEditCategoryModal();
                    this.flashMessage.success({
                        message: 'Category updated successfully !',
                        time: 5000
                    });
                }  catch(error){
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            hideNewCategoryModal(){
                this.$refs.newCategoryModal.hide();
            },

            showNewCategoryModal(){
                this.$refs.newCategoryModal.show();
            },

            hideEditCategoryModal(){
                this.$refs.editCategoryModal.hide();
            },

            showEditCategoryModal(){
                this.$refs.editCategoryModal.show();
            },

            loadMore: async function(){
                try{
                    const response = await categoryService.loadMore(this.nextPage)
                    if (response.data.current_page < response.data.last_page){
                        this.moreExists = true;
                        this.nextPage = response.data.current_page + 1;
                    }else{
                        this.moreExists = false;
                    }

                    response.data.data.forEach(data => {
                       this.categories.push(data)
                    })
                }catch (e) {
                    this.flashMessage.error({
                        message: 'Something error during loading more categories !',
                        time: 5000
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>
