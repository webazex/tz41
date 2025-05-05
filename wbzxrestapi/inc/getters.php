<?php


function get_product_attributes_raw( $product_id ) {
    $attributes = get_post_meta( $product_id, '_product_attributes', true );

    if ( empty( $attributes ) || ! is_array( $attributes ) ) {
        return [];
    }

    $result = [];

    foreach ( $attributes as $attr_name => $attr_data ) {
        $values = [];

        if ( isset( $attr_data['value'] ) ) {
            // Значения могут быть строкой с разделителем |
            $values = array_map( 'trim', explode( '|', $attr_data['value'] ) );
        }

        $result[ $attr_name ] = [
            'name'   => $attr_name,
            'values' => $values,
            'visible' => ! empty( $attr_data['is_visible'] ),
            'taxonomy' => ! empty( $attr_data['is_taxonomy'] ),
        ];
    }

    return $result;
}
function prepareArgs(array $args): array
{
    return array_merge($args, [
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ]);
}

function getObj(array $args): object
{
    return new WP_Query($args);
}

function getData(object $object): array
{
    return (!empty($object->posts)) ? $object->posts : [];
}

function getAnyPost(int $id):object {
    $args = prepareArgs([
        'post_status' => 'publish',
        'post_type'   => (get_post_type($id))? get_post_type($id): 'any',
        'posts_per_page' => 1,
        'p' => $id
    ]);
    return getObj($args);
}