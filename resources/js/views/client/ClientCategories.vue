<template>
    <div id="wrapper">
        <!-- toggle top area -->
        <div class="hidden-top">
            <div class="hidden-top-inner container">
                <div class="row">
                    <div class="span12">
                        <ul>
                            <li><strong>We are available for any custom works this month</strong></li>
                            <li>Main office: Springville center X264, Park Ave S.01</li>
                            <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end toggle top area -->
        <!-- start header -->
        <header>
            <div class="container">
                <!-- hidden top area toggle link -->

                <!-- end toggle link -->
                <div class="row nomargin">
                    <div class="span12">
                        <div class="headnav">
                            <ul v-show="user == null" style="display: flex;">
                                <router-link to="/register" class="nav-link" exact>
                                    <li><a data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                                </router-link>
                                <router-link to="/login" class="nav-link" exact>
                                    <li><a data-toggle="modal">Sign in</a></li>
                                </router-link>
                            </ul>
                            <ul v-show="user != null" style="display: flex;">
                                <router-link to="/home" class="nav-link" exact>
                                    <li><i class="icon-user"></i><a data-toggle="modal">Hello {{ user.name }}</a></li>
                                </router-link>
                            </ul>
                        </div>
                        <!-- Signup Modal -->
                        <div id="mySignup" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySignupModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 id="mySignupModalLabel">Create an <strong>account</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">Email</label>
                                        <div class="controls">
                                            <input type="text" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputSignupPassword">Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputSignupPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputSignupPassword2">Confirm Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputSignupPassword2" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Sign up</button>
                                        </div>
                                        <p class="aligncenter margintop20">
                                            Already have an account? <a href="#mySignin" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Sign in</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end signup modal -->
                        <!-- Sign in Modal -->
                        <div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputText">Username</label>
                                        <div class="controls">
                                            <input type="text" id="inputText" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputSigninPassword">Password</label>
                                        <div class="controls">
                                            <input type="password" id="inputSigninPassword" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Sign in</button>
                                        </div>
                                        <p class="aligncenter margintop20">
                                            Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end signin modal -->
                        <!-- Reset Modal -->
                        <div id="myReset" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="myResetModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 id="myResetModalLabel">Reset your <strong>password</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal">
                                    <div class="control-group">
                                        <label class="control-label" for="inputResetEmail">Email</label>
                                        <div class="controls">
                                            <input type="text" id="inputResetEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Reset password</button>
                                        </div>
                                        <p class="aligncenter margintop20">
                                            We will send instructions on how to reset your password to your inbox
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end reset modal -->
                    </div>
                </div>
                <div class="row">
                    <div class="span4">
                        <div class="logo">
                            <a href="index.html"><img src="../../../../public/assets/img/logo.png" alt="" class="logo" /></a>
                        </div>
                    </div>
                    <div class="span8">
                        <div class="navbar navbar-static-top">
                            <div class="navigation">
                                <nav>
                                    <ul class="nav topnav" style="display: flex">
                                        <router-link to="/index" class="nav-link" exact>
                                            <li class="dropdown active">
                                                <a href="" style="font-size: 20px">Home </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/categories" class="nav-link" exact>
                                            <li class="dropdown active">
                                                <a href="" style="font-size: 20px">Categories </a>
                                            </li>
                                        </router-link>
                                    </ul>
                                </nav>
                            </div>
                            <!-- end navigation -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <div class="inner-heading">
                            <h2>Categories</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article v-for="(article, index) in articles">
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <router-link :to="`articles/${article.id}`" class="nav-link" exact v-on:click.native="scrollToTop">
                                                <h3><a href="">{{ article.title }}</a></h3>
                                            </router-link>
                                        </div>
                                        <router-link :to="`articles/${article.id}`" class="nav-link" exact v-on:click.native="scrollToTop">
                                            <img v-bind:src="`${$store.state.serverPath}/storage/${article.image}`" alt="" />
                                        </router-link>
                                    </div>
                                    <p v-html="article.summary">

                                    </p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-calendar"></i><a href="#"> {{ moment(article.created_at).format("DD-MM-YYYY") }}</a></li>
                                            <li><i class="icon-user"></i><a style="cursor: pointer" v-on:click="getArticleByUser(article.user.id); scrollToTop()">Author: {{ article.user.name }} / {{ article.user.email }}</a></li>
                                            <li><i class="icon-book"></i><a href="#">Views: {{ article.views }}</a></li>
                                            <li><i class="icon-tags"></i><a style="cursor: pointer" v-for="(tag, index) in article.tags" v-on:click="getArticleByTag(tag.id); scrollToTop()">{{ tag.name }}, </a></li>
                                        </ul>
                                        <router-link :to="`articles/${article.id}`" class="nav-link" exact v-on:click.native="scrollToTop()">
                                            <a href="" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div v-show="articles.length == 0">
                            <h3>Not found Data</h3>
                        </div>
                        <div class="text-center" v-show="moreExists">
                            <button class="btn btn-sm btn-danger" v-on:click="getMostViewArticle"><span class="fa fa-arrow-down"></span>Load More...</button>
                        </div>
                    </div>

                    <div class="span3">
                        <aside class="right-sidebar">
                            <div class="widget">
                                <form class="form-search">
                                    <input placeholder="Type something" type="text" v-model="search" class="input-large search-query">
                                    <button type="button" class="btn btn-small btn-square btn-theme" v-on:click="searchArticleIndex">Search</button>
                                </form>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Categories</h5>
                                <ul class="cat">
                                    <li v-for="(category, index) in categories" :key="index" v-on:click="scrollToTop()"><i class="icon-angle-right"></i><a style="cursor: pointer" v-on:click="getArticleByCategory(category.id)">{{ category.name }}</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Most View </h5>
                                <ul class="recent">
                                    <li v-for="(article, index) in mostViewArticle">
                                        <router-link :to="`/articles/${article.id}`" class="nav-link" exact v-on:click.native="scrollToTop">
                                            <img v-bind:src="`${$store.state.serverPath}/storage/${article.image}`" class="pull-left" alt="" />
                                            <h6><a href="">{{ article.title }}</a></h6>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Popular tags</h5>
                                <ul class="tags">
                                    <li v-for="(tag, index) in tags" :key="index"><a style="cursor: pointer" v-on:click="getArticleByTag(tag.id); scrollToTop()" >{{ tag.name }}</a></li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Browse pages</h5>
                            <ul class="link-list">
                                <li><a href="#">About our company</a></li>
                                <li><a href="#">Our services</a></li>
                                <li><a href="#">Meet our team</a></li>
                                <li><a href="#">Explore our portfolio</a></li>
                                <li><a href="#">Get in touch with us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Important stuff</h5>
                            <ul class="link-list">
                                <li><a href="#">Press release</a></li>
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Career center</a></li>
                                <li><a href="#">Flattern forum</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="widget">
                            <h5 class="widgetheading">Flickr photostream</h5>
                            <div class="flickr_badge">
                            </div>
                            <div class="clear">
                            </div>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="widget">
                            <h5 class="widgetheading">Get in touch with us</h5>
                            <address>
                                <strong>Flattern studio, Pte Ltd</strong><br>
                                Springville center X264, Park Ave S.01<br>
                                Semarang 16425 Indonesia
                            </address>
                            <p>
                                <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                                <i class="icon-envelope-alt"></i> email@domainname.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <div class="copyright">
                                <p>
                                    <span>&copy; Flattern - All right reserved.</span>
                                </p>
                                <div class="credits">
                                    <!--
                                      All the links in the footer should remain intact.
                                      You can delete the links only if you purchased the pro version.
                                      Licensing information: https://bootstrapmade.com/license/
                                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Flattern
                                    -->
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <ul class="social-network">
                                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square"></i></a></li>
                                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    import * as articleService from '../../services/article_service.js';
    import moment from "moment";

    export default {
        name: 'clientCategories',
        data(){
            return {
                categories: [],
                articles: [],
                tags: [],
                mostViewArticle: [],
                user: '',
                moreExists: false,
                nextPage: 0,
                search: '',
                moment: moment
            }
        },

        mounted(){
            this.loadCategories();
            this.loadTags();
            this.getMostViewArticle();
            this.getLatestArticle();
            this.user = JSON.parse(localStorage.getItem('user'))
        },

        methods: {
            loadCategories : async function(){
                const response = await articleService.loadCategories();
                this.categories = response.data.data;
            },

            loadTags : async function(){
                const response = await articleService.loadTags();
                this.tags = response.data.data;
            },

            searchArticleIndex : async function(){
                let formData = new FormData();
                formData.append('search', this.search);

                const response = await articleService.searchArticlesIndex(formData);
                this.articles = response.data.data;
            },

            getArticleByCategory: async function(id){
                const response = await articleService.getArticleByCategory(id);
                this.articles = response.data.data;
            },

            getArticleByUser: async function(id){
                const response = await articleService.getArticleByUser(id);
                this.articles = response.data.data;
            },

            getArticleByTag: async function(id){
                const response = await articleService.getArticleByTag(id);
                this.articles = response.data.data;
            },

            getMostViewArticle: async function(){
                const response = await articleService.getMostViewArticle();
                this.mostViewArticle = response.data.data;
            },

            getLatestArticle: async function(){
                const response = await articleService.getLatestArticle(this.nextPage)
                if (response.data.data.current_page < response.data.data.last_page) {
                    this.moreExists = true;
                    this.nextPage = response.data.data.current_page + 1;
                } else {
                    this.moreExists = false;
                }

                response.data.data.data.forEach(data => {
                    this.articles.push(data)
                })
            },

            scrollToTop() {
                window.scrollTo(0,0);
            }
        }
    }
</script>

<style scoped src="../../../../public/assets/css/bootstrap.css"></style>
<style scoped src="../../../../public/assets/css/bootstrap.css"></style>
<style scoped src="../../../../public/assets/css/bootstrap-responsive.css"></style>
<style scoped src="../../../../public/assets/css/fancybox/jquery.fancybox.css"></style>
<style scoped src="../../../../public/assets/css/jcarousel.css"></style>
<style scoped src="../../../../public/assets/css/style.css"></style>
<style scoped src="../../../../public/assets/skins/default.css"></style>