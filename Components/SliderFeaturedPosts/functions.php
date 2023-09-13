<?php

namespace Flynt\Components\SliderFeaturedPosts;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;
use Flynt\Utils\Asset;

const POST_TYPE = 'post';

add_filter('Flynt/addComponentData?name=SliderFeaturedPosts', function ($data) {
    $translatableOptions = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($translatableOptions, $data['options']),
    ];
    $data['taxonomies'] = $data['taxonomies'] ?? [];
    $postsPerPage = $data['options']['maxPosts'] ?? 2;
    $data['right'] = [
        'src' => Asset::requireUrl('Components/SliderFeaturedPosts/Assets/next.jpg'),
        'alt' => 'next'
    ];
    $data['left'] = [
        'src' => Asset::requireUrl('Components/SliderFeaturedPosts/Assets/prev.jpg'),
        'alt' => 'prev'
    ];

    $posts = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => POST_TYPE,
        'cat' => join(',', array_map(function ($taxonomy) {
            return $taxonomy->term_id;
        }, $data['taxonomies'])),
        'posts_per_page' => $postsPerPage + 1,
        'ignore_sticky_posts' => 1,
    ]);

    $data['posts'] = array_slice(array_filter($posts->to_array(), function ($post) {
        return $post->ID !== get_the_ID();
    }), 0, $postsPerPage);

    // $data['cta'] = post.get_field('website_url');
    // $data['cta'] = get_fields('group_624495962114e', 'website_url');

    $data['postTypeArchiveLink'] = get_post_type_archive_link('posts');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'SliderFeaturedPosts',
        'label' => 'Featured Posts: Slider',
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
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'media_upload' => 0,
            ],
            [
                'label' => 'Options Tab',
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
                        'label' => __('Max Posts', 'flynt'),
                        'name' => 'maxPosts',
                        'type' => 'number',
                        'default_value' => 2,
                        'min' => 1,
                        'step' => 1
                    ]
                ]
            ],
            [
                'label' => 'Category to Use',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Category Slug', 'flynt'),
                        'name' => 'categoryToUse',
                        'type' => 'text',
                    ]
                ]
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => 'Enable Autoplay',
                        'name' => 'autoplay',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ],
                    [
                        'label' => 'Autoplay Speed (in milliseconds)',
                        'name' => 'autoplaySpeed',
                        'type' => 'number',
                        'min' => 2000,
                        'default_value' => 4000,
                        'required' => 1,
                        'step' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'autoplay',
                                    'operator' => '==',
                                    'value' => 1
                                ]
                            ]
                        ],
                    ],
                ],
            ],
        ]
    ];
}

Options::addTranslatable('SliderSpecialsPackages', [
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('All Posts', 'flynt'),
                'name' => 'allPosts',
                'type' => 'text',
                'default_value' => 'See More Posts',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Learn More', 'flynt'),
                'name' => 'readMore',
                'type' => 'text',
                'default_value' => 'Learn More',
                'required' => 1,
                'wrapper' => [
                    'width' => 50
                ],
            ]
        ],
    ]
]);
