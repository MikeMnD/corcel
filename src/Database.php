<?php

/**
 * Corcel\Database.
 *
 * @author Junior Grossi <juniorgro@gmail.com>
 */

namespace Corcel;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    /**
     * Base params. Wordpress use by default MySQL databases and more.
     */
    protected static $baseParams = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => 'wp_',
    ];

    /**
     * Connect to the Wordpress database.
     *
     * @param array $params
     *
     * @return Illuminate\Database\Capsule\Manager
     */
    public static function connect(array $params)
    {
        $capsule = new Capsule();
        $params = array_merge(static::$baseParams, $params);
        $capsule->addConnection($params);
        $capsule->bootEloquent();

        return $capsule;
    }
}
