<?php

namespace Flynt\Components\SliderTestimonials;

use Flynt\Utils\Options;
use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=SliderTestimonials', function ($data) {
    $data['sliderOptions'] = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($data['sliderOptions'], $data['options']),
    ];
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'sliderTestimonials',
        'label' => __('Testimonials: Slider', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Slides', 'flynt'),
                'name' => 'slides',
                'type' => 'repeater',
                'collapsed' => '',
                'min' => 1,
                'max' => 0,
                'layout' => 'block',
                'button_label' => __('Add Slide', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Slide', 'flynt'),
                        'name' => 'accordionSlide',
                        'type' => 'accordion',
                        'open' => 1,
                        'multi_expand' => 1,
                        'endpoint' => 0
                    ],
                    [
                        'label' => __('Content', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'wysiwyg',
                        'media_upload' => 0,
                        'toolbar' => 'full',
                    ],
                    [
                        'label' => __('Author', 'flynt'),
                        'name' => 'author',
                        'type' => 'text',
                    ],
                ]
            ],
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
                    [
                        'label' => __('Enable Autoplay', 'flynt'),
                        'name' => 'autoplay',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1
                    ],
                    [
                        'label' => __('Autoplay Speed (in milliseconds)', 'flynt'),
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
