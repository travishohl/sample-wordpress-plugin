<?php declare(strict_types=1);

namespace SamplePlugin;

/**
 * A class dedicated to accessing the WordPress database.
 */
class DatabaseRepository
{
    /**
     * @var wpdb
     */
    protected $connection;

    public function __construct()
    {
        global $wpdb;

        $this->connection = $wpdb;
    }

    /**
     * @return int
     */
    public function count_options(): int
    {
        $options_table = $this->connection->options;

        $count = $this->connection->get_var(
            "SELECT COUNT(*) FROM $options_table"
        );

        return (int)$count;
    }

    /**
     * @return array
     */
    public function get_options(): array
    {
        $options_table = $this->connection->options;

        return $this->connection->get_results(
            "SELECT * FROM $options_table",
            'ARRAY_A'
        );
    }
}
