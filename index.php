<?php

use Timber\Timber;
use Flynt\Utils\Options;

$context = Timber::context();


if (function_exists('acf_add_options_page')) {
    $context['options'] = get_fields('options');
}

//$context['specialsIntro'] = Options::getGlobal('Options', 'test_options');

Timber::render('templates/index.twig', $context);
