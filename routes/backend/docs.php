<?php

Route::any(ADM_URI.'/(:bundle)/docs/(:all?)', function($route = 'index.html') {
    
    \Config::set('application.profiler', false);
    
    $mime     = File::extension(Bundle::path('thumbnails').'docs/' . $route);
    $response = File::get(Bundle::path('thumbnails').'docs/' . $route);
    $headers  = array('Content-type' => Config::get("mimes.{$mime}"));
    
    return Response::make($response, 200, $headers);   
});