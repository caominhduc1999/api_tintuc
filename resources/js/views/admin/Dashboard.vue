<template>

        <div>
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>-->
            <!--&lt;!&ndash; Morris.js charts &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/morris/morris.min.js"></script>-->
            <!--&lt;!&ndash; Sparkline &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/sparkline/jquery.sparkline.min.js"></script>-->
            <!--&lt;!&ndash; jvectormap &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
            <!--&lt;!&ndash; jQuery Knob Chart &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/knob/jquery.knob.js"></script>-->
            <!--&lt;!&ndash; daterangepicker &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/daterangepicker/daterangepicker.js"></script>-->
            <!--&lt;!&ndash; datepicker &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/datepicker/bootstrap-datepicker.js"></script>-->
            <!--&lt;!&ndash; Bootstrap WYSIHTML5 &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>-->
            <!--&lt;!&ndash; Slimscroll &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>-->
            <!--&lt;!&ndash; FastClick &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/plugins/fastclick/fastclick.js"></script>-->
            <!--&lt;!&ndash; AdminLTE App &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/dist/js/adminlte.js"></script>-->
            <!--&lt;!&ndash; AdminLTE dashboard demo (This is only for demo purposes) &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/dist/js/pages/dashboard.js"></script>-->
            <!--&lt;!&ndash; AdminLTE for demo purposes &ndash;&gt;-->
            <!--<script type="text/javascript" defer src="../../../../public/admin/assets/dist/js/demo.js"></script>-->

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v2</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <router-link to="/home/categories" class="nav-link" exact>
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ categoryQuantity }}</h3>

                                        <p>Categories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </router-link>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <router-link to="/home/articles" class="nav-link" exact>
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ articleQuantity }}</h3>

                                        <p>Articles</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </router-link>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <router-link to="/home/users" class="nav-link" exact>
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ userQuantity }}</h3>

                                        <p>User Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </router-link>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <router-link to="/home/tags" class="nav-link" exact>
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ tagQuantity }}</h3>

                                        <p>Tags</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </router-link>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Line chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-bar-chart-o"></i>
                                            Line Chart
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="line-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="486" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 486.5px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 25px; text-align: center;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 92px; text-align: center;">2</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 159px; text-align: center;">4</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 225px; text-align: center;">6</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 292px; text-align: center;">8</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 355px; text-align: center;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 60px; top: 280px; left: 421px; text-align: center;">12</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 266px; left: 1px; text-align: right;">-1.5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 221px; left: 1px; text-align: right;">-1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 177px; left: 1px; text-align: right;">-0.5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 133px; left: 6px; text-align: right;">0.0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 89px; left: 6px; text-align: right;">0.5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 45px; left: 6px; text-align: right;">1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 6px; text-align: right;">1.5</div></div></div><canvas class="flot-overlay" width="486" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 486.5px; height: 300px;"></canvas></div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->

                                <!-- Area chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-bar-chart-o"></i>
                                            Area Chart
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="area-chart" style="height: 338px; padding: 0px; position: relative;" class="full-width-chart"><canvas class="flot-base" width="524" height="338" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 524.5px; height: 338px;"></canvas><canvas class="flot-overlay" width="524" height="338" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 524.5px; height: 338px;"></canvas></div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->

                            </div>
                            <!-- /.col -->

                            <div class="col-md-6">
                                <!-- Bar chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-bar-chart-o"></i>
                                            Bar Chart
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="486" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 486.5px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 280px; left: 24px; text-align: center;">January</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 280px; left: 99px; text-align: center;">February</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 280px; left: 185px; text-align: center;">March</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 280px; left: 269px; text-align: center;">April</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 280px; left: 349px; text-align: center;">May</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 81px; top: 280px; left: 427px; text-align: center;">June</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 266px; left: 8px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 199px; left: 8px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 133px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 67px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 1px; text-align: right;">20</div></div></div><canvas class="flot-overlay" width="486" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 486.5px; height: 300px;"></canvas></div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->

                                <!-- Donut chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-bar-chart-o"></i>
                                            Donut Chart
                                        </h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="donut-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="486" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 486.5px; height: 300px;"></canvas><canvas class="flot-overlay" width="486" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 486.5px; height: 300px;"></canvas><span class="pieLabel" id="pieLabel0" style="position: absolute; top: 70px; left: 301.289px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series2<br>30%</div></span><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 210px; left: 279.289px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series3<br>20%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 129px; left: 120.148px;"><div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">Series4<br>50%</div></span></div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div><!-- /.container-fluid -->
                </section>


            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.0.0-alpha
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>

</template>

<script>
    import Sidebar from '../../components/Sidebar.vue';
    import * as categoryService from '../../services/category_service.js';
    import * as articleService from '../../services/article_service.js';
    import * as tagService from '../../services/tag_service.js';
    import * as userService from '../../services/user_service.js';

    export default {
        components: {
            Sidebar,
        },
        data(){
            return {
                userQuantity: '',
                categoryQuantity: '',
                articleQuantity: '',
                tagQuantity: ''
            }
        },

        mounted(){
            this.getCategoryQuantity();
            this.getArticleQuantity();
            this.getTagQuantity();
            this.getUserQuantity();
        },

        methods: {
            getUserQuantity: async function(){
                const response = await userService.loadUsers();
                this.userQuantity = response.data.data.data.length;
            },

            getCategoryQuantity: async function(){
                const response = await categoryService.loadCategories();
                this.categoryQuantity = response.data.data.data.length;
            },

            getArticleQuantity: async function(){
                const response = await articleService.loadArticles();
                this.articleQuantity = response.data.data.data.length;
            },

            getTagQuantity: async function(){
                const response = await tagService.loadTags();
                this.tagQuantity = response.data.data.data.length;
            },
        },

        created() {
            var scripts = [
                "../../../../public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js",
                "https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js",
                "../../../../public/admin/assets/plugins/morris/morris.min.js",
                "../../../../public/admin/assets/plugins/sparkline/jquery.sparkline.min.js",
                "../../../../public/admin/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
                "../../../../public/admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
                "../../../../public/admin/assets/plugins/knob/jquery.knob.js",
                "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js",
                "../../../../public/admin/assets/plugins/daterangepicker/daterangepicker.js",
                "../../../../public/admin/assets/plugins/datepicker/bootstrap-datepicker.js",
                "../../../../public/admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
                "../../../../public/admin/assets/plugins/slimScroll/jquery.slimscroll.min.js",
                "../../../../public/admin/assets/plugins/fastclick/fastclick.js",
                "../../../../public/admin/assets/dist/js/adminlte.js",
                "../../../../public/admin/assets/dist/js/pages/dashboard.js",
                "../../../../public/admin/assets/dist/js/demo.js",
                "../../../../public/admin/assets/plugins/chartjs-old/Chart.min.js",
                "../../../../public/admin/assets/plugins/fastclick/fastclick.js"
            ];

            scripts.forEach(script => {
                let tag = document.createElement("script");
                tag.setAttribute("src", script);
                tag.setAttribute("type", "text/javascript");
                document.head.appendChild(tag);
            });
        },


    }
</script>

<style scoped src="../../../../public/admin/assets/dist/css/adminlte.min.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/iCheck/flat/blue.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/morris/morris.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/datepicker/datepicker3.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/daterangepicker/daterangepicker-bs3.css"></style>
<style scoped src="../../../../public/admin/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"></style>
