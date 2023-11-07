<?php

namespace Flynt\Components\AccordionMenus;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=AccordionMenus', function ($data) {
    $postType = 'page';
    $data['taxonomies'] = $data['taxonomies'] ?? [];
    // $postsPerPage = $data['options']['maxPosts'] ?? 3;
    $postsPerPage = -1;
    $accordionPanels = $data['accordionPanels'];
    $accordionPanels_length = count($accordionPanels);
    $taxArray=[];

    $taxArray = join(',', array_map(function ($taxonomy) {
        return $taxonomy->slug;
    }, $data['taxonomies']));
    //$i=0;
    //foreach ($accordionPanels as $accordionPanel ) {
        //$categorySlug = $data['accordionPanels'][$i]['catSlug'];
        $posts = Timber::get_posts([
            'post_status' => 'publish',
            'post_type' => $postType,
            //'cat' => $categorySlug,
            'cat' => join(',', array_map(function ($taxonomy) {
                return $taxonomy->term_id;
            }, $data['taxonomies'])),
            'posts_per_page' => $postsPerPage,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ]);
        // return $accordionPanels;
        //$i++;
    //};

    $data['cats'] = $taxArray;
    $data['catsArray'] = explode(',', $taxArray);
    $data['posts'] = array_slice(array_filter($posts->to_array(), function ($post) {
        return $post->ID !== get_the_ID();
    }), 0, $postsPerPage);

    $data['catToUse'] = [
        'studio',
        '1-bedroom',
        '1-bedroom-bunks',
        '2-bedroom',
        '2-bedroom-1000',
        '3-bedroom-2-bath',
        '3-bedroom-3-bath',
        '4-bedroom-4-bath',
    ];

    $data['catAssocArray'] = [
        'Studio Suite' => 'studio',
        '1 Bedroom' => '1-bedroom',
        '1 Bedroom + Bunk Beds' => '1-bedroom-bunks',
        '2 Bedroom + 2 Bath 900' => '2-bedroom',
        '2 Bedroom + 2 Bath 1000' => '2-bedroom-1000',
        '3 Bedroom + 2 Bath' => '3-bedroom-2-bath',
        '3 Bedroom + 3 Bath' => '3-bedroom-3-bath',
        '4 Bedroom + 4 Bath' => '4-bedroom-4-bath',
    ];

    $data['uuid'] = wp_generate_uuid4();
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'accordionMenus',
        'label' => __('Accordion: Menus', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title', 'flynt'),
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 0
            ],
            [
                'label' => __('Categories', 'flynt'),
                'instructions' => __('Select 1 or more categories or leave empty to show from all posts.', 'flynt'),
                'name' => 'taxonomies',
                'type' => 'taxonomy',
                'taxonomy' => 'category',
                'field_type' => 'multi_select',
                'allow_null' => 1,
                'multiple' => 1,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object'
            ],
            [
                'label' => __('Accordion Panels', 'flynt'),
                'name' => 'accordionPanels',
                'type' => 'repeater',
                'layout' => 'row',
                'min' => 1,
                'button_label' => __('Add Accordion Panel', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    // [
                    //     'label' => __('category slug', 'flynt'),
                    //     'name' => 'catSlug',
                    //     'type' => 'text',
                    //     'required' => 1,
                    // ],
                    [
                        'label' => __('Image', 'flynt'),
                        'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'required' => 0,
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                    ],
                    [
                        'label' => __('Text', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'delay' => 0,
                        'media_upload' => 0,
                        'required' => 0,
                    ],
                    // [
                    //     'label' => __('Url', 'flynt'),
                    //     'name' => 'url',
                    //     'type' => 'text',
                    //     'required' => 0,
                    // ],
                ],
            ],
            // [
            //     'name' => 'queriedPost',
            //     'label' => __('Select the post to use here', 'flynt'),
            //     'type' => 'button_group',
            //     'choices' => [
            //         //'post' => 'Posts',
            //         'page' => 'Pages',
            //         //'specials-packages' => 'Specials',
            //     ]
            // ],
            // [
            //     'name' => 'layout',
            //     'label' => __('Show in Cards or Links', 'flynt'),
            //     'type' => 'button_group',
            //     'choices' => [
            //         'links' => 'Links',
            //         //'cards' => 'Cards',
            //         //'hexagons' => 'Hexagons',
            //     ]
            // ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme(),
                    [
                        'label' => __('Max Columns', 'flynt'),
                        'name' => 'maxColumns',
                        'type' => 'number',
                        'default_value' => 3,
                        'min' => 1,
                        'max' => 4,
                        'step' => 1
                    ],
                    [
                        'label' => __('Max Posts', 'flynt'),
                        'name' => 'maxPosts',
                        'type' => 'number',
                        'default_value' => 3,
                        'min' => 1,
                        'step' => 1
                    ]
                ]
            ],
        ],
    ];
}
