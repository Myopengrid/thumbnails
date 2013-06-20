<?php

/*
|--------------------------------------------------------------------------
| Namespaces
|--------------------------------------------------------------------------
|
*/
Autoloader::namespaces(array(
    'Imagine'    => Bundle::path('thumbnails').'libraries/Imagine/lib/Imagine/',
    'Thumbnails' => Bundle::path('thumbnails').'libraries/',
));

/*
|--------------------------------------------------------------------------
| Thumbnails Event Listners
|--------------------------------------------------------------------------
|
| Load thumbnails listners for application
|
*/
include(dirname(__FILE__).DS.'events'.EXT);
