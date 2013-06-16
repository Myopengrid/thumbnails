<?php

Route::any(ADM_URI.'/(:bundle)/docs/(:all?)', function($route = 'index.html') {
    
    \Config::set('application.profiler', false);

    $docsPath = Bundle::path('thumbnails').'docs/'.$route;
    
    $mime     = File::extension($docsPath);
    $response = File::get($docsPath);
    $headers  = array('Content-type' => Config::get("mimes.{$mime}"));
    
    return Response::make($response, 200, $headers);   
});