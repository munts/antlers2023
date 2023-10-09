<?php

namespace Flynt\Components\BlockClipPath;

use Timber\Timber;
use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=BlockClipPath', function ($data) {
    //$data['status'] = $data['options']['percentageDistance'] >= 101 ? 'expand' : 'collapse';
    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'blockClipPath',
        'label' => __('Block: ClipPath', 'flynt'),
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Heading', 'flynt'),
                'name' => 'heading',
                'type' => 'text',
            ],
            // [
            //     'label' => __('Text', 'flynt'),
            //     'name' => 'contentHtml',
            //     'type' => 'wysiwyg',
            //     'delay' => 0,
            //     'media_upload' => 0,
            //     'required' => 0,
            // ],
            [
                'label' => __('Call to Action Label', 'flynt'),
                'name' => 'ctaLabel',
                'type' => 'text',
            ],
            [
                'label' => __('Call to Action Url', 'flynt'),
                'name' => 'ctaUrl',
                'type' => 'text',
            ],
            // [
            //     'label' => __('Options', 'flynt'),
            //     'name' => 'optionsTab',
            //     'type' => 'tab',
            //     'placement' => 'top',
            //     'endpoint' => 0
            // ],
            // [
            //     'label' => '',
            //     'name' => 'options',
            //     'type' => 'group',
            //     'layout' => 'row',
            //     'sub_fields' => [
            //         FieldVariables\getTheme(),
            //         [
            //             'label' => __('Vertical space', 'flynt'),
            //             'instructions' => __('Distance between two components.', 'flynt'),
            //             'name' => 'percentageDistance',
            //             'type' => 'range',
            //             'prepend' => __('Distance', 'flynt'),
            //             'append' => __('%', 'flynt'),
            //             'default_value' => 50,
            //             'min' => 0,
            //             'max' => 200,
            //             'step' => 50,
            //             'wrapper' =>  [
            //                 'width' => '50',
            //             ],
            //         ],
            //         [
            //             'label' => __('Examples', 'flynt'),
            //             'name' => '',
            //             'type' => 'message',
            //             'message' => sprintf(
            //                 '%1$s' . PHP_EOL . '%2$s' . PHP_EOL . '%3$s',
            //                 __('0% no spacing between components', 'flynt'),
            //                 __('50% reduces vertical space (by half)', 'flynt'),
            //                 __('150% extends vertical space (by 50%)', 'flynt')
            //             ),
            //             'new_lines' => 'br',
            //             'esc_html' => 1,
            //             'wrapper' =>  [
            //                 'width' => '50',
            //             ],
            //         ],
            //     ]
            // ]
        ]
    ];
}
