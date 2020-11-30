import {http, httpFile} from "./http_service";

export function createUser(data) {
    return httpFile().post('/users', data)
}

export function loadUsers() {
    return http().get('/users')
}

export function searchUsers(data) {
    return http().post('/search-users', data)
}

export function deleteUser(id) {
    return http().delete(`/users/${id}`);
}

export function updateUser(id, data){
    return httpFile().post(`/users/${id}`, data);
}

export function loadMore(nextPage) {
    return http().get(`/users?page=${nextPage}`);
}
