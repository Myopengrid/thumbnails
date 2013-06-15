<?php

class Thumbnails_Frontend_Thumbnails_Controller extends Public_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        // Disable out provile if it's enabled
        \Config::set('application.profiler', false);
    }

    public function get_thumb($size = '80x80')
    {
        $params = func_get_args();
        
        $mode       = '';
        $url        = implode('/', array_diff($params, array($size)));
        $thumb      = new Thumbnails\Thumb;
        $response   = $thumb->thumbnail($url, array('size' => $size, 'mode' => $mode, 'resource' => true));
        $finfo      = new finfo(FILEINFO_MIME_TYPE);

        $headers = array(
            'Accept-Ranges' => 'bytes',
            'Cache-Control' => 'must-revalidate max-age=2592000',
            'Content-type'  => $finfo->buffer($response),
            'Date'          => gmdate('D, d M Y H:i:s \G\M\T', time()),
            'Expires'       => gmdate('D, d M Y H:i:s \G\M\T', time() + 33600),
        );
        return Response::make($response, 200, $headers);
    }
}
