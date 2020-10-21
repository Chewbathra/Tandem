<?php declare(strict_types=1);

use Timber\Site;
use Twig\Environment;

class Tandem extends Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'themeSupports'));
        add_filter('timber/context', array($this, 'addToContext'));
        add_filter('timber/twig', array($this, 'addToTwig'));
        add_action('init', array($this, 'registerPostTypes'));
        add_action('init', array($this, 'registerTaxonomies'));
        add_action('wp_enqueue_scripts', array($this, 'registerAssets'));
        add_filter('jpeg_quality', array($this, 'jpegQuality'), 10, 2);
        add_action('admin_menu', array($this, 'clean_dashboard'));

        parent::__construct();
    }

    /** This is where you can register custom post types. */
    public function registerPostTypes(): void
    {
        require_once "custom/posts/SpectaclePostType.php";
        SpectaclePostType::register();
    }

    /** This is where you can register custom taxonomies. */
    public function registerTaxonomies(): void
    {
        require_once "custom/taxonomy/SpectacleStatusTaxonomy.php";
        SpectacleStatusTaxonomy::register();
    }

    public function registerAssets(): void
    {
//        dd(get_stylesheet_directory_uri());
        wp_register_style('style', get_stylesheet_directory_uri() . '/static/styles/app.css');
        wp_enqueue_style('style');

        wp_register_script("app", get_stylesheet_directory_uri() . '/static/scripts/app.js', [], false, true);
        wp_enqueue_script("app");
    }

    public function clean_dashboard() {
        remove_meta_box('dashboard_primary', 'dashboard', 'core');// Remove WordPress Events and News
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');// Remove Quick Draft
    }

    /** This is where you add some context
     *
     * @param array $context context['this'] Being the Twig's {{ this }}.
     * @return array context
     */
    public function addToContext(array $context): array
    {
        $context['menu'] = new Timber\Menu('header');
        $context['site'] = $this;
        return $context;
    }

    public function themeSupports(): void
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support('menus');
        register_nav_menu('header', __('Main menu'));
    }


    /** This is where you can add your own functions to twig.
     *
     * @param Environment $twig get extension.
     * @return Environment
     */
    public function addToTwig(Environment $twig): Environment
    {
//        $twig->addExtension(new Twig\Extension\StringLoaderExtension());
//        $twig->addFilter(new Twig\TwigFilter('myfoo', array($this, 'myfoo')));
        return $twig;
    }

    /**
     * Set jpeg quality
     * @return int
     */
    public function jpegQuality(): int
    {
        return 100;
    }

}