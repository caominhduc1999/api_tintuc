import {http, httpFile} from "./http_service";

export function createComment(data) {
    return httpFile().post('/comments', data)
}

export function loadMore(nextPage) {
    return http().get(`/comments?page=${nextPage}`);
}