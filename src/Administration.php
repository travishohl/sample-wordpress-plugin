<?php declare(strict_types=1);

namespace SamplePlugin;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * A class dedicated to handling plugin administration.
 */
class Administration
{
    /**
     * @var FilesystemLoader
     */
    protected $loader;

    /**
     * @var Environment
     */
    protected $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/templates');
        $this->twig = new Environment($this->loader);

        add_action('admin_menu', [$this, 'register_admin_options_page']);
    }

    public static function init()
    {
        return new static();
    }

    public function register_admin_options_page(): void
    {
        add_options_page(
            'Sample Plugin Settings',
            'Sample Plugin',
            'manage_options',
            'sample_plugin_menu_slug',
            [$this, 'render_admin_menu']
        );
    }

    public function render_admin_menu(): void
    {
        echo $this->twig->render('page_admin.html');
    }
}
