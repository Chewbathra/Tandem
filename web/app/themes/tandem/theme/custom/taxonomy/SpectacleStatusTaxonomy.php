<?php declare(strict_types=1);


class SpectacleStatusTaxonomy
{
    const KEY = 'spectacle_status';

    public static function register()
    {
        register_taxonomy(self::KEY, SpectaclePostType::KEY, [
            'labels' => [
                'name' => __('Spectacle status'),
                'singular_name' => __('Spectacle status'),
                'search_items' => __('Search spectacle status'),
                'popular_items' => __('Popular spectacle status'),
                'all_items' => __('All spectacle status'),
                'edit_item' => __('Edit spectacle status'),
                'view_item' => __('View spectacle status'),
                'update_item' => __('Update spectacle status'),
                'add_new_item' => __('Add new spectacle status'),
                'new_item_name' => __('Add new spectacle status name'),
                'not_found' => __('No spectacle status found'),
                'no_terms' => __('No spectacle status')
            ],
            'description' => __('The status of the spectacle'),
//            'show_in_rest' => true,
            'hierarchical' => true,
            'public' => true,
            'show_admin_column' => true,
            'rewrite' =>
                [
                    'slug' => 'spectacle-status'
                ]
        ]);
    }
}