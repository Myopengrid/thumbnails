<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Lib to images manipulation
    |--------------------------------------------------------------------------
    |
    |'Gd' or 'Imagick' or 'Gmagick'
    |
    */
    'error_image' => Bundle::path('thumbnails').'images'.DS.'error'.DS.'not-found.jpg',

    /*
    |--------------------------------------------------------------------------
    | Public folder to chache thumbnails
    |--------------------------------------------------------------------------
    |
    */
    'image_path' => 'thumbnails/cached',
);
