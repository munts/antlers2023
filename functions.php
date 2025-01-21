<?php

namespace Flynt;

use Flynt\Utils\FileLoader;

require_once __DIR__ . '/vendor/autoload.php';

if (!defined('WP_ENV')) {
    define('WP_ENV', function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production');
} elseif (!defined('WP_ENVIRONMENT_TYPE')) {
    define('WP_ENVIRONMENT_TYPE', WP_ENV);
}

// Check if the required plugins are installed and activated.
// If they aren't, this function redirects the template rendering to use
// plugin-inactive.php instead and shows a warning in the admin backend.
if (Init::checkRequiredPlugins()) {
    FileLoader::loadPhpFiles('inc');
    add_action('after_setup_theme', ['Flynt\Init', 'initTheme']);
    add_action('after_setup_theme', ['Flynt\Init', 'loadComponents'], 101);
}

// Remove the admin-bar inline-CSS as it isn't compatible with the sticky footer CSS.
// This prevents unintended scrolling on pages with few content, when logged in.
add_theme_support('admin-bar', ['callback' => '__return_false']);

add_action('after_setup_theme', function () {
    // Make theme available for translation.
    // Translations can be filed in the /languages/ directory.
    load_theme_textdomain('flynt', get_template_directory() . '/languages');
});

add_action('init', function () {
    register_taxonomy_for_object_type('category', 'page');
});

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

add_action('admin_head', function () {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
});

add_action('gform_after_submit_1', function ($entry) {
    // Group RFP
    $api_url = 'https://contact-api.inguest.com/api/add-contacts-to-lists';
    $guid = '6936b499-e5a7-4405-87b8-cc82be76814e';

    // Map Gravity Form fields to the API payload
    $data = [
        'tokens' => [$guid],
        'contacts' => [
            [
                'first_name' => rgar($entry, '1.3'), // Replace '1' with the Gravity Form field ID for first name
                'last_name' => rgar($entry, '1.6'),  // Replace '2' with the field ID for last name
                //'address_1' => rgar($entry, '3'), // Replace '3' with the field ID for address line 1
                //'address_2' => rgar($entry, '4'), // Replace '4' with the field ID for address line 2
                //'city' => rgar($entry, '5'),      // Replace '5' with the field ID for city
                //'state' => rgar($entry, '3'),     // Replace '6' with the field ID for state
                //'country' => rgar($entry, '4'),   // Replace '7' with the field ID for country
                //'zip' => rgar($entry, '8'),       // Replace '8' with the field ID for ZIP code
                'phone' => rgar($entry, '5'),     // Replace '9' with the field ID for phone
                'email' => rgar($entry, '2')     // Replace '10' with the field ID for email
            ]
        ]
    ];

    // Send the POST request
    $response = wp_remote_post($api_url, [
        'method' => 'POST',
        'headers' => [
            'Content-Type' => 'text/plain',
        ],
        'body' => json_encode($data),
    ]);

    // Check for errors
    if (is_wp_error($response)) {
        error_log('Error posting to API: ' . $response->get_error_message());
    } else {
        error_log('API response: ' . wp_remote_retrieve_body($response));
    }
}, 10, 2);

add_action('gform_after_submit_2', function ($entry) {
    // Wifi Request
    $api_url = 'https://contact-api.inguest.com/api/add-contacts-to-lists';
    $guid = '79d3ad2b-c443-4e07-9089-971da3b0d7f1';

    // Map Gravity Form fields to the API payload
    $data = [
        'tokens' => [$guid],
        'contacts' => [
            [
                'first_name' => rgar($entry, '1.3'), // Replace '1' with the Gravity Form field ID for first name
                'last_name' => rgar($entry, '1.6'),  // Replace '2' with the field ID for last name
                //'address_1' => rgar($entry, '3'), // Replace '3' with the field ID for address line 1
                //'address_2' => rgar($entry, '4'), // Replace '4' with the field ID for address line 2
                //'city' => rgar($entry, '5'),      // Replace '5' with the field ID for city
                'state' => rgar($entry, '3'),     // Replace '6' with the field ID for state
                'country' => rgar($entry, '4'),   // Replace '7' with the field ID for country
                //'zip' => rgar($entry, '8'),       // Replace '8' with the field ID for ZIP code
                //'phone' => rgar($entry, '9'),     // Replace '9' with the field ID for phone
                'email' => rgar($entry, '5')     // Replace '10' with the field ID for email
            ]
        ]
    ];

    // Send the POST request
    $response = wp_remote_post($api_url, [
        'method' => 'POST',
        'headers' => [
            'Content-Type' => 'text/plain',
        ],
        'body' => json_encode($data),
    ]);

    // Check for errors
    if (is_wp_error($response)) {
        error_log('Error posting to API: ' . $response->get_error_message());
    } else {
        error_log('API response: ' . wp_remote_retrieve_body($response));
    }
}, 10, 2);

add_action('gform_after_submit_3', function ($entry) {
    // Ownership Opportunities
    $api_url = 'https://contact-api.inguest.com/api/add-contacts-to-lists';
    $guid = '3b2a3411-8544-4133-ac55-30cee9ddef1c';

    // Map Gravity Form fields to the API payload
    $data = [
        'tokens' => [$guid],
        'contacts' => [
            [
                'first_name' => rgar($entry, '1.3'), // Replace '1' with the Gravity Form field ID for first name
                'last_name' => rgar($entry, '1.6'),  // Replace '2' with the field ID for last name
                //'address_1' => rgar($entry, '3'), // Replace '3' with the field ID for address line 1
                //'address_2' => rgar($entry, '4'), // Replace '4' with the field ID for address line 2
                //'city' => rgar($entry, '5'),      // Replace '5' with the field ID for city
                'state' => rgar($entry, '3'),     // Replace '6' with the field ID for state
                'country' => rgar($entry, '4'),   // Replace '7' with the field ID for country
                //'zip' => rgar($entry, '8'),       // Replace '8' with the field ID for ZIP code
                'phone' => rgar($entry, '5'),     // Replace '9' with the field ID for phone
                'email' => rgar($entry, '6')     // Replace '10' with the field ID for email
            ]
        ]
    ];

    // Send the POST request
    $response = wp_remote_post($api_url, [
        'method' => 'POST',
        'headers' => [
            'Content-Type' => 'text/plain',
        ],
        'body' => json_encode($data),
    ]);

    // Check for errors
    if (is_wp_error($response)) {
        error_log('Error posting to API: ' . $response->get_error_message());
    } else {
        error_log('API response: ' . wp_remote_retrieve_body($response));
    }
}, 10, 2);
