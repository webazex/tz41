<?php
function getAllProjects() {
    $args = prepareArgs([
        'post_type' => 'projects',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ]);
    $obj = getObj($args);
    return fetchData(getData($obj));
}

function getProjects(int $user_id) {
    $args = prepareArgs([
        'post_type' => 'projects',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'author' => $user_id,
    ]);
    $obj = getObj($args);
    return fetchData(getData($obj));
}

function getSingleProject(int $id):array {
    $postObj = getAnyPost($id);
    return fetchData($postObj->posts);
}