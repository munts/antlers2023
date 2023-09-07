<?php

namespace Flynt\Components\BlockCustomHtml;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'blockCustomHtml',
        'label' => 'Block: Custom HTML',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Text Alignment', 'flynt'),
                'name' => 'textAlignment',
                'type' => 'button_group',
                'choices' => [
                    'textLeft' => '<i class=\'dashicons dashicons-editor-alignleft\' title=\'Align text left\'></i>',
                    'textCenter' => '<i class=\'dashicons dashicons-editor-aligncenter\' title=\'Align text center\'></i>'
                ]
            ],
            [
                'label' => __('Text Width', 'flynt'),
                'name' => 'textWidth',
                'type' => 'button_group',
                'choices' => [
                    'textNormal' => 'Normal',
                    'textWide' => 'Wide',
                    'textExtraWide' => 'Extra Wide'
                ]
            ],
            // [
            //     'label' => __('Block Name', 'flynt'),
            //     'name' => 'blockName',
            //     'type' => 'text',
            //     'required' => 0,
            // ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 1,
                'required' => 0,
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
                    FieldVariables\getTheme()
                ]
            ]
        ]
    ];
}
