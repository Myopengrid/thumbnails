<?php

Route::any('(:bundle)/(:all?)', function($route = '') {
    
    $route = explode('/', $route);
    
    $method = isset($route[0]) ? $route[0] : 'thumb';
    
    array_shift($route);

    return Controller::call("thumbnails::frontend.thumbnails@{$method}", $route);
});