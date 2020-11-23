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
                            <ul>
                                <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                                <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
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
                                                <a href="">Home </a>
                                            </li>
                                        </router-link>
                                        <router-link to="/categories" class="nav-link" exact>
                                            <li class="dropdown active">
                                                <a href="">Categories </a>
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
                            <h2>Article</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="span8">
                        <article>
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                            <h3><a href="">{{ articleData.title }}</a></h3>
                                        </div>
                                        <img v-bind:src="`${$store.state.serverPath}/storage/${articleData.image}`" alt="" />
                                    </div>
                                    <blockquote>
                                        <i class="icon-quote-left"></i>{{ articleData.summary }}
                                    </blockquote>
                                    <p>
                                        {{ articleData.content }}
                                    </p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                            <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                            <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                                            <li><i class="icon-tags"></i><a href="#">Web design</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="span3">
                        <aside class="right-sidebar">
                            <div class="widget">
                                <form class="form-search">
                                    <input placeholder="Type something" type="text" class="input-medium search-query">
                                    <button type="submit" class="btn btn-square btn-theme">Search</button>
                                </form>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Categories</h5>
                                <ul class="cat">
                                    <li v-for="(category, index) in categories" :key="index" ><i class="icon-angle-right"></i><a style="cursor: pointer">{{ category.name }}</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Latest articles</h5>
                                <ul class="recent">
                                    <li v-for="(article, index) in latestArticle">
                                        <router-link :to="`/articles/${article.id}`" class="nav-link" exact v-on:click.native="scrollToTop">
                                            <img v-bind:src="`${$store.state.serverPath}/storage/${article.image}`" class="pull-left" alt="" v-on:click="getArticle(article.id)"/>
                                            <h6><a href="">{{ article.title }}</a></h6>
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widgetheading">Popular tags</h5>
                                <ul class="tags">
                                    <li><a href="#">Web design</a></li>
                                    <li><a href="#">Trends</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Internet</a></li>
                                    <li><a href="#">Tutorial</a></li>
                                    <li><a href="#">Development</a></li>
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
                    <div class="span3">
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

    export default {
        name: 'clientArticle',
        data(){
            return {
                id: this.$route.params.id,
                categories: [],
                articleData: '',
                latestArticle: []
            }
        },

        mounted(){
            this.loadCategories();
            this.getArticle(this.id);
            this.getLatestArticle();
        },

        methods: {
            loadCategories : async function(){
                const response = await articleService.loadCategories();
                this.categories = response.data.data;
            },

            getArticle : async function(id) {
                const response = await articleService.getArticle(id);
                this.articleData = response.data.data;
            },

            getLatestArticle: async function(){
                const response = await articleService.getLatestArticle();
                this.latestArticle = response.data.data;
            },

            getArticleByCategory: async function(id){
                const response = await articleService.getArticleByCategory(id);
                this.articles = response.data.data;
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