<?php

/**
 * Template Name: Area Guild Template
 * Description: A Page Template for the Area Guide.
 */

 use Timber\Timber;

$context = Timber::context();

Timber::render('templates/area-guide.twig', $context);
