<?php

/**
 * This is an example file showcasing how you can add custom post types to your Flynt theme.
 *
 * For a full list of parameters see https://developer.wordpress.org/reference/functions/register_post_type/ or use https://generatewp.com/post-type/ to generate the code for you.
 */

namespace Flynt\CustomPostTypes;

add_action('init', function () {
    $labels = [
        'name'                  => _x('Specials', 'Post Type General Name', 'flynt'),
        'singular_name'         => _x('Special', 'Post Type Singular Name', 'flynt'),
        'menu_name'             => __('Specials', 'flynt'),
        'name_admin_bar'        => __('Specials', 'flynt'),
        'archives'              => __('Specials Archives', 'flynt'),
        'attributes'            => __('Specials Attributes', 'flynt'),
        'parent_item_colon'     => __('Parent Item:', 'flynt'),
        'all_items'             => __('All Specials', 'flynt'),
        'add_new_item'          => __('Add New Special', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Special', 'flynt'),
        'edit_item'             => __('Edit Special', 'flynt'),
        'update_item'           => __('Update Special', 'flynt'),
        'view_item'             => __('View Special', 'flynt'),
        'view_items'            => __('View Specials', 'flynt'),
        'search_items'          => __('Search Special', 'flynt'),
        'not_found'             => __('Not found', 'flynt'),
        'not_found_in_trash'    => __('Not found in Trash', 'flynt'),
        'featured_image'        => __('Featured Image', 'flynt'),
        'set_featured_image'    => __('Set featured image', 'flynt'),
        'remove_featured_image' => __('Remove featured image', 'flynt'),
        'use_featured_image'    => __('Use as featured image', 'flynt'),
        'insert_into_item'      => __('Insert into item', 'flynt'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'flynt'),
        'items_list'            => __('Items list', 'flynt'),
        'items_list_navigation' => __('Items list navigation', 'flynt'),
        'filter_items_list'     => __('Filter items list', 'flynt'),
    ];
    $args = [
        'label'                 => __('Specials', 'flynt'),
        'description'           => __('', 'flynt'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'revisions', 'thumbnail'],
        'taxonomies'            => ['category', 'post_tag'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    ];
    register_post_type('specials-packages', $args);
});
