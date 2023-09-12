<?php

namespace Flynt\Components\SliderSpecialsPackages;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;
use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=SliderSpecialsPackages', function ($data) {
    $translatableOptions = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($translatableOptions, $data['options']),
    ];
    // $data['right'] = [
    //     'src' => Asset::requireUrl('Components/SliderSpecialsPackages/Assets/next.jpg'),
    //     'alt' => 'next'
    // ];
    // $data['left'] = [
    //     'src' => Asset::requireUrl('Components/SliderSpecialsPackages/Assets/prev.jpg'),
    //     'alt' => 'prev'
    // ];

    $data['specials'] = Timber::get_posts([
        'post_status' => 'publish',
        'post_type' => 'specials',
        // 'tax_query' => array(
        //     array(
        //         'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
        //         'field'    => 'slug',
        //         'terms'    => $data['options']['categoryToUse'], // Your category slug (I have a category 'interior')
        //     )),
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 1,
        //'post__not_in' => array(get_the_ID())
    ]);

    // $data['cta'] = post.get_field('website_url');
    // $data['cta'] = get_fields('group_624495962114e', 'website_url');

    $data['postTypeArchiveLink'] = get_post_type_archive_link('specials');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'SliderSpecialsPackages',
        'label' => 'Specials: Slider',
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
