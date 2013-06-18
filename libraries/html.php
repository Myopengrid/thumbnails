<?php namespace Thumbnails;

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
        $url     = isset($args[0]) ? $args[0] : 'not-found.jpg';
        $options = isset($args[1]) ? $args[1] : array();
        $alt     = isset($options['alt']) ? $options['alt'] : '';
        $attr    = isset($options['attr']) ? $options['attr'] : array();

        $image = new Thumb;

        $image_path = $image->thumbnail($url , $options);

        return HTML::image($image_path, $alt, $attr);
    }
}
