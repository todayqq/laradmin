<?php

return [

    /*
     * Laradmin name.
     */
    'name'      => 'Laradmin',

    /*
     * Logo in admin panel header.
     */
    'logo'      => '<b>Lara</b> dmin',

    /*
     * Mini-logo in admin panel header.
     */
    'logo-mini' => '<b>La</b>',

    /*
     * Route configration.
     */
    'route' => [

        'prefix' => 'admin',

        'namespace'     => 'App\\Http\\Controllers\\Admin',

        'middleware'    => ['web', 'admin'],
    ],

    /*
     * Laradmin install directory.
     */
    'directory' => app_path('Http/Controllers/Admin'),

    /*
     * Laradmin html title.
     */
    'title'  => 'Admin',

    /*
     * Use `https`.
     */
    'secure' => false,

    /*
     * Laradmin auth setting.
     */
    'auth' => [
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ]
    ],

    /*
     * Laradmin upload setting.
     */
    'upload'  => [

        'disk' => 'admin',

        'directory'  => [
            'image'  => 'images',
            'file'   => 'files',
        ],
    ],

    /*
     * Laradmin database setting.
     */
    'database' => [

        // Database connection for following tables.
        'connection'  => '',

        // User tables and model.
        // 'users_table' => 'admin_users',
        // 'users_model' => Angkee\Admin\DatabaseAdministrator::class,

    ],

    /*
     * @see https://adminlte.io/docs/2.4/layout
     */
    'skin'    => 'skin-blue',

    /*
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
     */
    'layout'  => ['sidebar-mini'],

    /*
     * Version displayed in footer.
     */
    'version'   => '1.0',

    /*
     * Settings for extensions.
     */
    'extensions' => [

    ],
];
