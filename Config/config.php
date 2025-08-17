<?php

return [
    'name' => 'FileUpload',

    'max_file_size' => 10 * 1024 * 1024,
    'max_thumbnail_size' => 2 * 1024 * 1024,

    'allowed_types' => [
        'pdf',
        'zip'
    ],

    'allowed_thumbnail_types' => ['jpg', 'jpeg', 'png', 'bmp'],

    'upload_directory' => '/public/assets/uploads',
    'thumbnail_directory' => '/public/assets/uploads/thumbnails',
    'categories' => [
        1 => 'Redline Charter Airways Fleet',
        2 => 'Direct Xpress Fleet',
        3 => 'Misc. Files'
    ],

    'allow_public_files' => true,
    'allow_file_sharing' => false,
];