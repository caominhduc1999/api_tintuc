import {http, httpFile} from "./http_service";

export function createArticle(data) {
    return httpFile().post('/articles', data)
}

export function loadCategories() {
    return http().get('/get-categories')
}

export function loadTags() {
    return http().get('/get-tags')
}

export function loadArticles() {
    return http().get('/articles')
}

export function searchArticles(data) {
    return http().post('/search-articles', data)
}

export function deleteArticle(id) {
    return http().delete(`/articles/${id}`);
}

export function updateArticle(id, data){
    return httpFile().post(`/articles/${id}`, data);
}

export function getArticle(id) {
    return http().get(`/articles/${id}`);
}

export function getArticleByCategory(id) {
    return http().get(`/get-article-by-category/${id}`);
}

export function getArticleByUser(id) {
    return http().get(`/get-article-by-user/${id}`);
}

export function getArticleByTag(id) {
    return http().get(`/get-article-by-tag/${id}`);
}

export function getLatestArticle(nextPage) {
    return http().get(`/get-latest-articles?page=${nextPage}`);
}

export function getHottestArticle(nextPage) {
    return http().get(`/get-hottest-articles?page=${nextPage}`);
}

export function getMostViewArticle() {
    return http().get('/get-most-view-articles');
}

export function loadMore(nextPage) {
    return http().get(`/articles?page=${nextPage}`);
}

export function searchArticlesIndex(data) {
    return http().post('/search-articles-index', data);
}
