<?php
function getAllNotifications() {
    $args = prepareArgs([
        'post_type' => 'notifications',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ]);
    $obj = getObj($args);
    return fetchData(getData($obj));
}

function getSinglePost(int $id):array {
    $postObj = getAnyPost($id);
    return fetchData($postObj->posts);
}