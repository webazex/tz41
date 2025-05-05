<?php
function getAllPosts():array{
    $args = prepareArgs([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ]);
    $obj = getObj($args);
    return fetchData(getData($obj));
}

function getNotification(int $id):array {
    $postObj = getAnyPost($id);
    return fetchData($postObj->posts);
}