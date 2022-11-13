<?php
    $folders = array(
        'actions',
        'extends',
        'vendors',
        'custom-fields',
        'editor',
        'custom-functions',
        'shortcodes',
        'post-types',
        'theme',
    );

    foreach ( $folders as $folder ) {
        foreach ( glob( __DIR__ . '/' . $folder . '/*.php' ) as $file ) {
            include $file;
        }
    }
?>