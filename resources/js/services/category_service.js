import {http, httpFile} from "./http_service";

export function createCategory(data) {
    return httpFile().post('/categories', data)
}

export function loadCategories() {
    return http().get('/categories')
}

export function searchCategories(data) {
    return http().post('/search-categories', data)
}

export function deleteCategory(id) {
    return http().delete(`/categories/${id}`);
}

export function updateCategory(id, data){
    return httpFile().post(`/categories/${id}`, data);
}

export function loadMore(nextPage) {
    return http().get(`/categories?page=${nextPage}`);
}
