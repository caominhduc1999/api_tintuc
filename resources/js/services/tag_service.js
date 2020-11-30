import {http, httpFile} from "./http_service";

export function createTag(data) {
    return httpFile().post('/tags', data)
}

export function loadTags() {
    return http().get('/tags')
}

export function searchTags(data) {
    return http().post('/search-tags', data)
}

export function deleteTag(id) {
    return http().delete(`/tags/${id}`);
}

export function updateTag(id, data){
    return httpFile().post(`/tags/${id}`, data);
}

export function loadMore(nextPage) {
    return http().get(`/tags?page=${nextPage}`);
}