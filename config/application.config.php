<?php


return array(
    // This should be an array of module namespaces used in the application.
    'modules'                 => array(
        'SynergyGearman'
    ),

    'module_listener_options' => array(
        'module_paths'             => array(
            './module',
            './vendor',
        ),
        'config_glob_paths'        => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
        'config_cache_enabled'     => false,
        'module_map_cache_enabled' => false,
        'cache_dir'                => 'data/cache',
    ),
);
