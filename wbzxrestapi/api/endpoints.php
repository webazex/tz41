<?php
//users endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/users/', [
        'methods'             => 'GET',
        'callback'            => 'users_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function users_endpoint( WP_REST_Request $request ) {
    wp_send_json(getUsers());
}

//user endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/users/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'user_endpoint',
        'permission_callback' => '__return_true',
	]);
}, 99 );

function user_endpoint( WP_REST_Request $request ) {
    wp_send_json(getUser($request['id']));
}

//subscribes endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/subscribes/', [
        'methods'             => 'GET',
        'callback'            => 'subscribes_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function subscribes_endpoint( WP_REST_Request $request ) {
    wp_send_json(getAllSubscribes());
}

//subscribe endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/subscribes/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'subscribe_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function subscribe_endpoint( WP_REST_Request $request ) {
    wp_send_json(getSubscribe($request['id']));
}

//posts endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/posts/', [
        'methods'             => 'GET',
        'callback'            => 'posts_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function posts_endpoint( WP_REST_Request $request ) {
    wp_send_json(getAllPosts());
}

//post endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/posts/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'post_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function post_endpoint( WP_REST_Request $request ) {
    wp_send_json(getSinglePost($request['id']));
}

//notifications endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/notifications/', [
        'methods'             => 'GET',
        'callback'            => 'notifications_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function notifications_endpoint( WP_REST_Request $request ) {
    wp_send_json(getAllNotifications());
}

//notification endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/notifications/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'notification_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function notification_endpoint( WP_REST_Request $request ) {
    wp_send_json(getNotification($request['id']));
}

//projects endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/projects/', [
        'methods'             => 'GET',
        'callback'            => 'projects_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function projects_endpoint( WP_REST_Request $request ) {
    wp_send_json(getAllProjects());
}

//project endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/projects/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'project_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function project_endpoint( WP_REST_Request $request ) {
    wp_send_json(getSingleProject($request['id']));
}

//project by user endpoint
add_action( 'rest_api_init', function () {
    register_rest_route( 'wbzxapi/v1', '/projects/u/(?P<id>\d+)', [
        'methods'             => 'GET',
        'callback'            => 'project_by_user_endpoint',
        'permission_callback' => '__return_true',
    ]);
}, 99 );

function project_by_user_endpoint( WP_REST_Request $request ) {
    wp_send_json(getProjects($request['id']));
}