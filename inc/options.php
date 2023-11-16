<?php

namespace Flynt\Options;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData', function ($data, $componentName) {
    // Get fields for this component.
    $options = array_reduce(array_keys(Options::OPTION_TYPES), function ($carry, $optionType) use ($componentName) {
        return array_merge($carry, Options::get($optionType, $componentName));
    }, []);
    // Don’t overwrite existing data.
    return array_merge($options, $data);
}, 9, 2);

add_filter('acf/fields/google_map/api', function ($api) {
    $apiKey = Options::getGlobal('Options', 'googleMapsApiKey');
    if ($apiKey) {
        $api['key'] = $apiKey;
    }
    return $api;
});

Options::addGlobal('Acf', [
    [
        'name' => 'googleMapsTab',
        'label' => __('Google Maps', 'flynt'),
        'type' => 'tab'
    ],
    [
        'name' => 'googleMapsApiKey',
        'label' => __('Google Maps Api Key', 'flynt'),
        'type' => 'text',
        'maxlength' => 100,
        'prepend' => '',
        'append' => '',
        'placeholder' => ''
    ]
]);
