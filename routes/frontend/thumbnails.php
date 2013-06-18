<?php

Route::get('(:bundle)/thumb/(:any)/(:any)/(:all?)', function ($size, $mode, $path) {
        
    $thumb      = new Thumbnails\Thumb;
    $response   = $thumb->thumbnail($path, array('size' => $size, 'mode' => $mode, 'resource' => true));
    $finfo      = new finfo(FILEINFO_MIME_TYPE);

    
    $headers = array(
        'Accept-Ranges' => 'bytes',
        'Cache-Control' => 'must-revalidate max-age=2592000',
        'Content-type'  => $finfo->buffer($response),
        'Date'          => gmdate('D, d M Y H:i:s \G\M\T', time()),
        'Expires'       => gmdate('D, d M Y H:i:s \G\M\T', time() + 33600),
    );
    return Response::make($response, 200, $headers);
});