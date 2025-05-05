<?php
function fetchData(array $data): array
{
    $ret = [];
    foreach ($data as $post) {
        switch (get_post_type($post->ID)) {
            case 'post':
                $ret[$post->ID] = [
                    'title' => $post->post_title,
                    'content' => wp_strip_all_tags($post->post_content),
                    'date' => $post->post_date,
                ];
                break;
            case 'product':
                $ret[$post->ID] = [
                    'title' => $post->post_title,
                    'content' => wp_strip_all_tags($post->post_content),
                    'price' => get_post_meta( $post->ID, '_price', true ),
                    'date' => get_the_date( 'Y-m-d H:i:s', $post ),
                    'target_subscribe' => (!empty(get_post_meta($post->ID,'target_subscription', true))) ? get_post_meta( $post->ID, 'target_subscription', true ) : [],
                    'attributes' =>  get_product_attributes_raw( $post->ID ),
                ];
                break;
            case 'projects':
                $ret[$post->ID] = [
                    'title' => $post->post_title,
                    'content' => wp_strip_all_tags($post->post_content),
                    'date' => $post->post_date,
                ];
                break;
            case 'notifications':
                $ret[$post->ID] = [
                    'title' => $post->post_title,
                    'content' => wp_strip_all_tags($post->post_content),
                    'date' => $post->post_date,
                    'target_notification' => (!empty(get_post_meta($post->ID,'target_notifications', true))) ? get_post_meta($post->ID,'target_notifications', true) : [],
                ];
                break;
        }
    }
    return $ret;
}

function getAllUserData(array $args): array {
    $obj = getObj($args);
    return fetchData(getData($obj));
}
function getUser(int $id): array
{
    $ret = [];
    $user = new WP_User($id);
    if($user->exists()){
        $ret = [
            'fname' => $user->first_name,
            'lname' => $user->last_name,
            'nickname' => $user->nickname,
            'email' => $user->user_email,
            'balance' => $user->get('userdata_balance'),
        ];

        //add projects
        $params = prepareArgs([
            'post_type' => 'projects',
            'post_status' => 'publish',
            'author' => $id,
        ]);
        $ret['projects'] = getAllUserData($params);

        //add notifications
        $noticeParams = prepareArgs([
            'post_type' => 'notifications',
            'post_status' => 'publish',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => 'target_notifications',
                    'value' => '"' . $id . '"',
                    'compare' => 'LIKE',
                ]
            ]
        ]);
        $ret['notices'] = getAllUserData($noticeParams);

        //get subscribes
        $subscribeArgs = prepareArgs([
            'post_type' => 'product',
            'post_status' => 'publish',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => 'target_subscription',
                    'value' => '"' . $id . '"',
                    'compare' => 'LIKE',
                ]
            ]
        ]);
        $ret['subscribes'] = getAllUserData($subscribeArgs);

        //add posts
        $postsArgs = prepareArgs([
            'post_type' => 'post',
            'post_status' => 'publish',
            'author' => $id,
        ]);
        $ret['posts'] = getAllUserData($postsArgs);
    }
    return $ret;
}

function getUsers():array {
    $ret = [];
    global $wp_roles;

    // get all roles
    $all_roles = $wp_roles->roles;
    $roles = array_keys($all_roles);

    // remove admin
    $non_admin_roles = array_diff($roles, ['administrator']);

    // meta
    $meta_query = [
        'relation' => 'OR',
    ];
    foreach ($non_admin_roles as $role) {
        $meta_query[] = [
            'key'     => 'wp_capabilities',
            'value'   => '"' . $role . '"',
            'compare' => 'LIKE',
        ];
    }

    $obj = new WP_User_Query([
        'meta_query' => $meta_query,
        'number'     => -1,
        'fields'     => 'ID',
    ]);
    $ids = $obj->get_results();
    if(!empty($ids)){
        foreach ($ids as $id) {
            $ret[$id] = getUser(intval($id));
        }
    }
    return $ret;
}