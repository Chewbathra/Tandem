<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::context();
$timber_post = Timber::get_post();
$context['post'] = $timber_post;

if ($timber_post->post_type == 'spectacle') {
    $location = get_field('theater', false, false);
    if ($location) {
        if (count($location['markers']) > 0) {
            $address = $location['markers'][0]['default_label'];
            $label = $location['markers'][0]['label'];
            if ($address == $label) {
                $label = '';
            }
        } else {
            $address = '';
            $label = '';
        }
    } else {
        $address = "";
        $label = "";
    }
    $context['address'] = $address;
    $context['label'] = $label;

    $context['map'] = get_field('theater');
}


if (post_password_required($timber_post->ID)) {
    Timber::render('single-password.twig', $context);
} else {
    Timber::render(array('single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig'), $context);
}
