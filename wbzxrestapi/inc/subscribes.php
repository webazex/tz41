<?php
function getAllSubscribes():array {
    $args = prepareArgs([
        'post_type' => 'product',
        'post_status' => 'publish',
    ]);
    $obj = getObj($args);
    $subscribes = fetchData(getData($obj));
    if(!empty($subscribes)) {
        foreach($subscribes as $k => &$v) {
            $v['users'] = (!empty(get_post_meta($k,'target_subscription', true))) ? get_post_meta($k,'target_subscription',true) : [];
        }
        return $subscribes;
    }else{
        return [];
    }
}

function getSubscribe(int $id):array {
    $postObj = getAnyPost($id);
    return fetchData($postObj->posts);
}