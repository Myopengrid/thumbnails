<?php namespace Thumbnails;;

class Html extends \Laravel\Html
{

    /**
     * call Static
     * 
     * @param string $method method
     * @param string $args   args
     * 
     * @todo testing and refatoring
     * @return Html
     */
    static public function __callStatic($method, $args) 
    {

        $conf = \Config::get('settings::core.thumbnails_image_mode', 'outbound');

        $image_name = isset($args[0]) ? $args[0] : 'not-found.jpg';
        $size       = isset($args[1]) ? $args[1] : '';
        $mode       = isset($args[2]) ? $args[2] : $conf;
        $url        = isset($args[3]) ? $args[3] : '';
        $alt        = isset($args[4]) ? $args[4] : '';
        $attr       = isset($args[5]) ? $args[5] : array();

        $image = new Thumb;

        $image_path = $image->thumbnail($url , array('size' => $size, 'mode' => $mode));

        return HTML::image($image_path, $alt, $attr);
    }
}
