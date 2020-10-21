<?php declare(strict_types=1);


class SpectaclePostType
{
    const KEY = 'spectacle';

    public static function register()
    {
        register_post_type(self::KEY, [
            'labels' => [
                'name' => __('Spectacles'),
                'singular_name' => __('Spectacle'),
                'add_new' => _x('Add New', self::KEY),
                'add_new_item' => __('Add new Spectacle'),
                'edit_item' => _('Edit spectacle'),
                'new_item' => __('New spectacle'),
                'view_item' => __('View spectacle'),
                'view_items' => __('View spectacles'),
                'search_items' => __('Search spectacles'),
                'not_found' => __('No spectacles found'),
                'not_found_in_trash' => __('No spectacle found in trash'),
                'all_items' => __('All spectacles'),
                'archives' => __('Spectacle archives'),
                'attributes' => __('Spectacle attributes'),
                'insert_into_item' => __('Insert into spectacle'),
                'uploaded_to_this_item' => __('Uploaded to this spectacle'),
                'filter_items_list' => _('Filter spectacles list'),
                'items_list_navigation' => __('Spectacles list navigation'),
                'items_list' => __('Spectacles list'),
                'item_published' => __('Spectacle published'),
                'item_published_privately' => __('Spectacle published privately'),
                'item_reverted_to_draft' => __('Spectacle reverted to draft'),
                'item_scheduled' => __('Spectacle scheduled'),
                'item_updated' => __('Spectacle updated')
            ],
            'description' => __('The show must go on !'),
            'public' => true,
            'menu_position' => 3,
            'menu_icon' => 'dashicons-admin-media',
            'show_in_rest' => true,
            'supports' => ['title', 'editor', 'comments', 'thumbnail', 'excerpt'],
            'has_archive' => true,
        ]);
    }

}