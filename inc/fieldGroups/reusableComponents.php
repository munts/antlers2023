<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'reusableComponents',
        'title' => __('Reusable Components', 'flynt'),
        'style' => 'seamless',
        'menu_order' => 1,
        'fields' => [
            [
                'name' => 'reusableComponents',
                'label' => __('Reusable Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\HeroImageText\getACFLayout(),
                    Components\BlockClipPath\getACFLayout(),
                    Components\BlockSpacer\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\SliderImageGallery\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\GridImageText\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    //Components\SliderImages\getACFLayout(),
                ],
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'reusable-components'
                ],
            ]
        ]
    ]);
});
