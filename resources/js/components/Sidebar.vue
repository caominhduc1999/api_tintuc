<template>
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <router-link to="/home" class="nav-link" exact>
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Welcome
                    </router-link>
                </div>
                <router-link to="home/categories" class="nav-link" exact>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Categories
                </router-link>
                <router-link to="home/articles" class="nav-link" exact>
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Articles
                </router-link>
            </div>
        </nav>
    </div>
</template>
