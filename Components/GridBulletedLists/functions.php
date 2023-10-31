<?php

namespace Flynt\Components\GridBulletedLists;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'GridBulletedLists',
        'label' => __('Grid: Bulleted List', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Title Alignment', 'flynt'),
                'name' => 'titleAlignment',
                'type' => 'button_group',
                'choices' => [
                    'left' => sprintf('<i class="dashicons dashicons-editor-alignleft" title="%1$s"></i>', __('Align items left', 'flynt')),
                    'center' => sprintf('<i class="dashicons dashicons-editor-aligncenter" title="%1$s"></i>', __('Align items center', 'flynt'))
                ],
                'default_value' => 'left'
            ],
            [
                'label' => __('Title', 'flynt'),
                'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 1,
                'delay' => 1,
            ],
            [
                'label' => __('Call to Action Url', 'flynt'),
                'instructions' => __('Use this field if you want to add a call to action button.  This field is for the url', 'flynt'),
                'name' => 'ctaUrl',
                'type' => 'text',
            ],
            [
                'label' => __('Call to Action Label', 'flynt'),
                'instructions' => __('Use this field if you want to add a call to action button.  This field is for the Label.  Such as Book Now...', 'flynt'),
                'name' => 'ctaLabel',
                'type' => 'text',
            ],
            [
                'label' => __('Call to Action button Target', 'flynt'),
                'name' => 'ctaTarget',
                'type' => 'button_group',
                'choices' => [
                    'self' => 'Self',
                    '_blank' => 'New Window'
                ],
                'default_value' => 'self'
            ],
            [
                'label' => __('Items', 'flynt'),
                'name' => 'items',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'block',
                'button_label' => __('Add Item', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Text', 'flynt'),
                        'name' => 'contentHtml',
                        'type' => 'text',
                        'required' => 1,
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
                    FieldVariables\getTheme(),
                    FieldVariables\removeComponentSpacing(),
                    [
                        'label' => __('Max Columns', 'flynt'),
                        'name' => 'maxColumns',
                        'type' => 'number',
                        'default_value' => 3,
                        'min' => 1,
                        'max' => 4,
                        'step' => 1
                    ],
                ]
            ]
        ]
    ];
}
