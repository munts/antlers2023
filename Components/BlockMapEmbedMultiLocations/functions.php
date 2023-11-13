<?php

namespace Flynt\Components\BlockMapEmbedMultiLocations;

use Flynt\FieldVariables;
use Timber\Timber;
use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=BlockMapEmbedMultiLocations', function ($data) {

    $data['lodgingIcon'] = [
        'src' => Asset::requireUrl('Components/BlockMapEmbedMultiLocations/Assets/lodgingIcon.png'),
        'alt' => 'Antlers Vail Lodging Icon'
    ];
    //$data['useProps'] = $data['options']['useProps'];
    $data['mapCenter'] = $data['options']['mapCenter'];

    return $data;
});


function getACFLayout()
{
    return [
        'name' => 'BlockMapEmbedMultiLocations',
        'label' => 'Block: Map Embed Multiple Locations',
        'sub_fields' => [
            [
                'label' => __('General', 'flynt'),
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 1,
                'delay' => 0,
                'instructions' => __('The content overlaying the image. Character Recommendations: Title: 30-100, Content: 80-250.', 'flynt'),
            ],
            [
                'label' => __('Items', 'flynt'),
                'name' => 'items',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'block',
                'button_label' => 'Add',
                'sub_fields' => [
                    [
                        'label' => 'Gmaps Fields',
                        'name' => 'gmaps',
                        'type' => 'google_map',
                        'title' => 'Google Maps Embed',
                        'sub_fields' => [
                            [
                                'label' => 'Google Map',
                                'name' => 'google_map',
                                'type' => 'google_map',
                                'center_lat' => '',
                                'center_lng' => '',
                                'zoom' => '',
                                'height' => '',
                                'name' => 'someshit',
                                'label' => '',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => __('Map Marker Info Window', 'flynt'),
                        'name' => 'markerInfo',
                        'type' => 'text',
                        'instructions' => __('The content that will display when a user clicks on the map marker', 'flynt'),
                    ],
                    [
                        'label' => __('Business or page Url', 'flynt'),
                        'name' => 'propertyUrl',
                        'type' => 'text',
                        'instructions' => __('this link will display to users in the info window of the map marker', 'flynt'),
                    ],
                    [
                        'label' => __('Map Marker Info Window Image', 'flynt'),
                        'name' => 'markerImage',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'instructions' => __('Image-Format: JPG, PNG, GIF.', 'flynt'),
                        'required' => 0,
                        'mime_types' => 'gif,jpg,jpeg,png'
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
                ]
            ],
        ]
    ];
}
