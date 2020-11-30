<template>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Article Management</h3>
                                <div class="row">
                                    <div class="card-tools col-md-10">
                                        <div class="input-group input-group-sm w-100">
                                            <input type="text"
                                                   name="table_search"
                                                   class="form-control float-right"
                                                   style="width: 45%; box-sizing: content-box; display: block; position: relative;"
                                                   v-model="search.title"
                                                   placeholder="Search Name"
                                            >
                                            <div style="width: 45%">
                                            <multiselect
                                                    v-model="search.category_id"
                                                    :options="categories.map(category => category.id)"
                                                    :custom-label="category => categories.find(x => x.id == category).name"
                                                    placeholder="Search category"
                                                    label="name"
                                                    track-by="id"
                                            >
                                            </multiselect>
                                            </div>
                                            <button class="btn btn-primary" style="width: 5%" v-on:click="searchArticles"><i class="fa fa-search"></i></button>
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success btn-sm btn-block" v-on:click="showNewArticleModal"><span class="fa fa-plus"></span> Create New</button>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Title</td>
                                            <td>Category</td>
                                            <td>Tags</td>
                                            <td>Image</td>
                                            <td style="width: 10%;">Action</td>
                                        </tr>
                                        <tr v-for="(article, index) in articles" v-bind:key="index">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ article.title }}</td>
                                            <td>{{ findCategory(article.category_id)}}</td>
                                            <td>
                                                <span style="margin-right: 5px" class="badge badge-info" v-for="tag in article.tags">{{ tag.name }}</span>
                                            </td>
                                            <td style="width: 50%">
                                                <img class="table-image" style="width: 50%" v-bind:src="`${$store.state.serverPath}/storage/${article.image}`" v-bind:alt="article.title">
                                            </td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" v-on:click="editArticle(article)"><span class="fa fa-edit"></span></button>
                                                <button class="btn btn-danger btn-sm" v-on:click="deleteArticle(article)"><span class="fa fa-trash"></span></button>
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
        <!--create article-->
        <b-modal ref="newArticleModal" hide-footer title="Add Article">
            <div class="d-block text-center">
                <form v-on:submit.prevent="createArticle">
                    <div class="form-group">
                        <label >Category</label>
                        <multiselect
                            v-model="articleData.category_id"
                            :options="categories.map(category => category.id)"
                            :custom-label="category => categories.find(x => x.id == category).name"
                            placeholder="Search and select one"
                            >
                        </multiselect>
                        <div style="color: red" v-if="errors.category_id">{{errors.category_id[0]}}</div>
                    </div>
                    <div class="form-group">
                        <label >Tags</label>
                        <multiselect
                                v-model="articleData.tag_ids"
                                :options="tags.map(tag => tag.id)"
                                :multiple="true"
                                :custom-label="tag => tags.find(x => x.id == tag).name"
                                placeholder="Search and select one"
                                label="name"
                                track-by="id"
                            >
                        </multiselect>
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
                        <label>Category</label>
                        <multiselect
                                v-model="editArticleData.category_id"
                                :options="categories.map(category => category.id)"
                                :custom-label="category => categories.find(x => x.id == category).name"
                                placeholder="Search and select one"
                            >
                        </multiselect>
                        <div style="color: red" v-if="errors.name">{{errors.name[0]}}</div>
                    </div>
                    <multiselect
                            v-model="editArticleData.tag_ids"
                            :options="tags.map(tag => tag.id)"
                            :multiple="true"
                            :custom-label="tag => tags.find(x => x.id == tag).name"
                            placeholder="Search and select one"
                        >
                    </multiselect>
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
    import Multiselect from 'vue-multiselect';

    export default {
        name: 'article',
        components: {
            Multiselect
        },
        data(){
            return {
                categories: [],
                tags: [],
                articles: [],
                articleData: {
                    category_id: '',
                    title: '',
                    summary: '',
                    content: '',
                    image: '',
                    tag_ids: ''
                },
                editArticleData: {
                    tag_ids: []
                },
                errors: {},
                moreExists: false,
                nextPage: 0,
                search: {
                    title: '',
                    category_id: ''
                },

            }
        },

        mounted(){
            this.loadCategories();
            this.loadTags();
            // this.loadArticles();
            this.loadMore();
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

            loadTags : async function(){
                try{
                    const response = await articleService.loadTags();
                    this.tags = response.data.data;
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
                    this.articles = response.data.data.data;
                }catch(error){
                    this.flashMessage.error({
                        message: 'Something error. Please refresh !',
                        time: 5000
                    });
                }
            },

            searchArticles : async function() {
                let formData = new FormData();
                formData.append('title', this.search.title);
                formData.append('category_id', this.search.category_id);

                try{
                    const response = await articleService.searchArticles(formData);
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
                formData.append('tag_ids', this.articleData.tag_ids);

                try {
                    const response = await articleService.createArticle(formData)
                    this.articles.unshift(response.data.data);
                    this.flashMessage.success({
                        message: 'Article stored successfully !',
                        time: 5000
                    });
                    this.articleData = {
                        category_id: '',
                        title: '',
                        summary: '',
                        content: '',
                        image: '',
                        tag_ids: ''
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
                this.editArticleData.tag_ids = article.tags.map(tag => tag.id);
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
                    formData.append('tag_ids', this.editArticleData.tag_ids);
                    formData.append('_method', 'put');

                    const response = await articleService.updateArticle(this.editArticleData.id, formData);
                    this.articles.map(article => {
                        if (article.id === response.data.data.id){
                            for(let key in response.data.data){
                                article[key] = response.data.data[key];
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
                    if (response.data.data.current_page < response.data.data.last_page){
                        this.moreExists = true;
                        this.nextPage = response.data.data.current_page + 1;
                    }else{
                        this.moreExists = false;
                    }

                    response.data.data.data.forEach(data => {
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
        },
    }
</script>

<style scoped src="../../../../public/admin/assets/plugins/font-awesome/css/font-awesome.min.css"></style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>