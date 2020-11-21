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
                        <i class="fas fa-chart-area mr-1"></i>Article Management
                        <button class="btn btn-primary btn-sm" v-on:click="showNewArticleModal"><span class="fa fa-plus"></span>Create New</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Title</td>
                                <td>Category</td>
                                <td>Image</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(article, index) in articles" v-bind:key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ article.title }}</td>
                                <td>{{ findCategory(article.category_id)}}</td>
                                <td style="width: 50%">
                                    <img class="table-image" style="width: 50%" v-bind:src="`${$store.state.serverPath}/storage/${article.image}`" v-bind:alt="article.title">
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" v-on:click="editArticle(article)"><span class="fa fa-edit">Edit</span></button>
                                    <button class="btn btn-danger btn-sm" v-on:click="deleteArticle(article)"><span class="fa fa-trash">Delete</span></button>
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

        <!--create article-->
        <b-modal ref="newArticleModal" hide-footer title="Add Article">
            <div class="d-block text-center">
                <form v-on:submit.prevent="createArticle">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select v-model="articleData.category_id" id="category_id" class="form-control">
                            <option value="">Choose Category</option>
                            <option v-for="(category, index) in categories" :value="category.id" :key="index">{{category.name}}</option>
                        </select>
                        <div style="color: red" v-if="errors.category_id">{{errors.category_id[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Enter Title</label>
                        <input type="text" v-model="articleData.title" class="form-control" placeholder="Enter Title">
                        <div style="color: red" v-if="errors.title">{{errors.title[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Enter Summary</label>
                        <textarea v-model="articleData.summary" class="form-control" placeholder="Enter Summary" cols="30" rows="10"></textarea>
                        <div style="color: red" v-if="errors.summary">{{errors.summary[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Enter Content</label>
                        <textarea v-model="articleData.content" class="form-control" placeholder="Enter Content" cols="30" rows="10"></textarea>
                        <div style="color: red" v-if="errors.content">{{errors.content[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <div v-if="articleData.image.name">
                            <img src="" ref="newArticleImageDisplay" style="width: 150px">
                        </div>
                        <input type="file"  class="form-control" id="image" v-on:change="attachImage" ref="newArticleImage">
                        <div style="color: red" v-if="errors.image">{{errors.image[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideNewArticleModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Save</button>
                </form>
            </div>
        </b-modal>


        <!--edit article-->
        <b-modal ref="editArticleModal" hide-footer title="Edit Article">
            <div class="d-block text-center">
                <form v-on:submit.prevent="updateArticle">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select v-model="editArticleData.category_id" id="" class="form-control">
                            <option value="">Choose Category</option>
                            <option v-for="(category, index) in categories" :value="category.id" :key="index">{{category.name}}</option>
                        </select>
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Enter Title</label>
                        <input type="text" v-model="editArticleData.title" class="form-control" placeholder="Enter Title">
                        <div style="color: red" v-if="errors.title">{{errors.title[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Enter Summary</label>
                        <textarea v-model="editArticleData.summary" class="form-control" placeholder="Enter Summary" cols="30" rows="10"></textarea>
                        <div style="color: red" v-if="errors.summary">{{errors.summary[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Enter Content</label>
                        <textarea v-model="editArticleData.content" class="form-control" placeholder="Enter Content" cols="30" rows="10"></textarea>
                        <div style="color: red" v-if="errors.content">{{errors.content[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <div>
                            <img v-bind:src="`${$store.state.serverPath}/storage/${editArticleData.image}`" ref="editArticleImageDisplay" style="width: 150px">
                        </div>
                        <input type="file"  class="form-control" v-on:change="editAttachImage" ref="editArticleImage">
                        <div style="color: red" v-if="errors.image">{{errors.image[0]}}</div>
                    </div>
                    <hr>
                    <button type="button" class="btn btn-default" v-on:click="hideEditArticleModal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span>Update</button>
                </form>
            </div>
        </b-modal>
    </div>
</template>

<script>
    import * as articleService from '../../services/article_service.js';

    export default {
        name: 'article',
        data(){
            return {
                categories: [],
                articles: [],
                articleData: {
                    category_id: '',
                    title: '',
                    summary: '',
                    content: '',
                    image: ''
                },
                editArticleData: {},
                errors: {},
                moreExists: false,
                nextPage: 0
            }
        },

        mounted(){
            // this.loadMore();
            this.loadCategories();
            this.loadArticles();
        },

        methods:{
            attachImage(){
                this.articleData.image = this.$refs.newArticleImage.files[0];
                let reader = new FileReader();
                reader.addEventListener('load', function () {
                    this.$refs.newArticleImageDisplay.src = reader.result;
                }.bind(this), false);

                reader.readAsDataURL(this.articleData.image);
            },

            editAttachImage(){
                this.editArticleData.image = this.$refs.editArticleImage.files[0];
                let reader = new FileReader();
                reader.addEventListener('load', function () {
                    this.$refs.editArticleImageDisplay.src = reader.result;
                }.bind(this), false);

                reader.readAsDataURL(this.editArticleData.image);
            },

            loadCategories : async function(){
                try{
                    const response = await articleService.loadCategories();
                    this.categories = response.data.data;
                }catch(error){
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            loadArticles : async function(){
                try{
                    const response = await articleService.loadArticles();
                    this.articles = response.data.data;
                }catch(error){
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            createArticle: async function() {
                let formData = new FormData();
                formData.append('title', this.articleData.title);
                formData.append('summary', this.articleData.summary);
                formData.append('content', this.articleData.content);
                formData.append('category_id', this.articleData.category_id);
                formData.append('image', this.articleData.image);

                try {
                    const response = await articleService.createArticle(formData)
                    this.articles.unshift(response.data);
                    this.flashMessage.success({
                        message: 'Article stored successfully !',
                        time: 5000
                    });
                    this.articleData = {
                        category_id: '',
                        title: '',
                        summary: '',
                        content: '',
                        image: ''
                    };

                    this.loadArticles();
                    this.hideNewArticleModal();
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

            deleteArticle: async function(article){
                if(! window.confirm(`Are you want to delete ${article.name} ?`)){
                    return;
                }

                try{
                    await articleService.deleteArticle(article.id);
                    this.articles = this.articles.filter(obj => {
                        return obj.id !== article.id;
                    });

                    this.flashMessage.success({
                        message: 'Article deleted successfully !',
                        time: 5000
                    });
                }catch(error){
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            editArticle: async function(article){
                this.editArticleData = {...article};
                this.showEditArticleModal();
            },

            updateArticle: async function(){
                try{
                    const formData = new FormData();
                    formData.append('title', this.editArticleData.title);
                    formData.append('summary', this.editArticleData.summary);
                    formData.append('content', this.editArticleData.content);
                    formData.append('category_id', this.editArticleData.category_id);
                    formData.append('image', this.editArticleData.image);
                    formData.append('_method', 'put');

                    const response = await articleService.updateArticle(this.editArticleData.id, formData);
                    this.articles.map(article => {
                        if (article.id === response.data.id){
                            for(let key in response.data){
                                article[key] = response.data[key];
                            }
                        }
                    });

                    this.hideEditArticleModal();
                    this.loadArticles();
                    this.flashMessage.success({
                        message: 'Article updated successfully !',
                        time: 5000
                    });
                }  catch(error){
                    this.flashMessage.error({
                        message: error.response.data.message,
                        time: 5000
                    });
                }
            },

            hideNewArticleModal(){
                this.$refs.newArticleModal.hide();
            },

            showNewArticleModal(){
                this.$refs.newArticleModal.show();
            },

            hideEditArticleModal(){
                this.$refs.editArticleModal.hide();
            },

            showEditArticleModal(){
                this.$refs.editArticleModal.show();
            },

            loadMore: async function(){
                try{
                    const response = await articleService.loadMore(this.nextPage)
                    if (response.data.current_page < response.data.last_page){
                        this.moreExists = true;
                        this.nextPage = response.data.current_page + 1;
                    }else{
                        this.moreExists = false;
                    }

                    response.data.data.forEach(data => {
                        this.articles.push(data)
                    })
                }catch (e) {
                    this.flashMessage.error({
                        message: 'Something error during loading more articles !',
                        time: 5000
                    });
                }
            },

            findCategory(category_id){
                let category_name = '';
                this.categories.forEach(category => {
                    if(category_id === category.id){
                        category_name = category.name;
                    }
                });
                return category_name;
            }
        }
    }
</script>
