import {http, httpFile} from "./http_service";

export function createArticle(data) {
    return httpFile().post('/articles', data)
}

export function loadCategories() {
    return http().get('/get-categories')
}

export function loadArticles() {
    return http().get('/articles')
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

export function getLatestArticle() {
    return http().get('/get-latest-articles');
}

export function getRandomArticle() {
    return http().get('/get-random-articles');
}

export function loadMore(nextPage) {
    return http().get(`/articles?page=${nextPage}`);
}
