<?php declare(strict_types=1);

namespace SamplePlugin;

use SamplePlugin\DatabaseRepository;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * A class dedicated to handling plugin administration.
 */
class Administration
{
    /**
     * @var DatabaseRepository
     */
    protected $db;

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
        $this->db = new DatabaseRepository();

        $this->loader = new FilesystemLoader(__DIR__ . '/templates');
        $this->twig = new Environment($this->loader);

        add_action('admin_menu', [$this, 'register_admin_options_page']);
    }

    /**
     * @return static
     */
    public static function init()
    {
        return new static();
    }

    /**
     * @return void
     */
    public function register_admin_options_page(): void
    {
        add_options_page(
            'Sample Plugin Settings',
            'Sample Plugin',
            'manage_options',
            'sample_plugin_options_page',
            [$this, 'render_admin_options_page']
        );
    }

    /**
     * @return void
     */
    public function render_admin_options_page(): void
    {
        $options = $this->db->get_options();
        $options_count = $this->db->count_options();

        echo $this->twig->render(
            'page_admin.html.twig',
            [
                'options'       => $options,
                'options_count' => $options_count,
            ]
        );
    }
}
