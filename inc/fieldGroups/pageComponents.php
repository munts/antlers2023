<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => __('Page Components', 'flynt'),
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => __('Page Components', 'flynt'),
                'type' => 'flexible_content',
                'button_label' => __('Add Component', 'flynt'),
                'layouts' => [
                    Components\HeroImageText\getACFLayout(),
                    Components\HeroSlider\getACFLayout(),
                    Components\BlockClipPath\getACFLayout(),
                    Components\BlockWysiwyg\getACFLayout(),
                    Components\BlockCustomHtml\getACFLayout(),
                    Components\SliderImageGallery\getACFLayout(),
                    Components\AccordionDefault\getACFLayout(),
                    Components\BlockGalleryText\getACFLayout(),
                    Components\BlockAnchor\getACFLayout(),
                    Components\BlockImage\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\BlockSpacer\getACFLayout(),
                    Components\BlockVideoOembed\getACFLayout(),
                    Components\GridImageText\getACFLayout(),
                    Components\GridFeaturedImageText\getACFLayout(),
                    Components\GridBulletedLists\getACFLayout(),
                    Components\GridPostsLatest\getACFLayout(),
                    //Components\ListComponents\getACFLayout(),
                    Components\SliderImages\getACFLayout(),
                    Components\SliderTestimonials\getACFLayout(),
                    Components\SliderTimeline\getACFLayout(),
                    //Components\SliderImagesCentered\getACFLayout(),
                    Components\SliderSpecialsPackages\getACFLayout(),
                    Components\SliderFeaturedPosts\getACFLayout(),
                    //Components\ReusableComponent\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'post'
                ],
                [
                    'param' => 'post_type',
                    'operator' => '!=',
                    'value' => 'reusable-components'
                ],
            ],
        ],
    ]);
    // ACFComposer::registerFieldGroup([
    //     'name' => 'blockClipPath',
    //     'title' => 'Page Clip Path Component',
    //     'style' => 'seamless',
    //     'fields' => [
    //         [
    //             'name' => 'blockClipPath',
    //             'label' => __('Fixed ClipPath Image', 'flynt'),
    //             'type' => 'group',
    //             'sub_fields' => [
    //                 Components\BlockClipPath\getACFLayout()
    //             ]
    //         ],
    //     ],
    //     'location' => [
    //         array(
    //             array(
    //                 'param' => 'post_type',
    //                 'operator' => '==',
    //                 'value' => 'page'
    //             )
    //         )
    //     ],
    //     'menu_order' => 10,
    //     'position' => 'normal'
    // ]);
});
