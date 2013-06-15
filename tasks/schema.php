<?php

class Thumburl_Schema_Task {

    public function __construct()
    {
        Bundle::register('settings');
        Bundle::start('settings');

        Bundle::register('modules');
        Bundle::start('modules');
    }

    public function install()
    {
        $module = Modules\Model\Module::where_slug('thumburl')->first();
        
        $thumburl_cache_status = array(
            'title'       => 'Image Caching', 
            'slug'        => 'thumburl_cache_status', 
            'description' => 'Enable or Disable image cache', 
            'type'        => 'select', 
            'default'     => 1, 
            'value'       => 1, 
            'options'     => '{"1":"Enabled","0":"Disabled"}', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => 1, 
            'module_slug' => 'thumburl', 
            'module_id'   => $module->id, 
            'order'       => 999, 
        );
        $thumburl_cache_status = Settings\Model\Setting::create($thumburl_cache_status);

        $thumburl_cache_time = array(
            'title'       => 'Cache Expiration (days)', 
            'slug'        => 'thumburl_cache_time', 
            'description' => 'If image caching is enabled this will set the image cache expiration time', 
            'type'        => 'text', 
            'default'     => 30, 
            'value'       => 30, 
            'options'     => '', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => 1, 
            'module_slug' => 'thumburl', 
            'module_id'   => $module->id, 
            'order'       => 999, 
        );
        $thumburl_cache_time = Settings\Model\Setting::create($thumburl_cache_time);

        $thumburl_allowed_image_extensions = array(
            'title'       => 'Allowed Image Extensions', 
            'slug'        => 'thumburl_allowed_image_extensions', 
            'description' => 'Allowed image extensions. Eg: png,jpg,jpeg,gif. Add extensions separated by a comma', 
            'type'        => 'text', 
            'default'     => 'png,jpg,jpeg,gif', 
            'value'       => 'png,jpg,jpeg,gif', 
            'options'     => '', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => 1, 
            'module_slug' => 'thumburl', 
            'module_id'   => $module->id, 
            'order'       => 999, 
        );
        $thumburl_allowed_image_extensions = Settings\Model\Setting::create($thumburl_allowed_image_extensions);

        $thumburl_image_library = array(
            'title'       => 'Image Library', 
            'slug'        => 'thumburl_image_library', 
            'description' => 'Select the image library to be used to create the thumbnails The options are Gd, Imagick and Gmagick; but the dropdown only show options that are currently available in your system If an option is missing for you; you may need to install it;', 
            'type'        => 'select', 
            'default'     => 'Gd', 
            'value'       => 'Gd',
            'options'     => '{"Gd":"GD","Imagick":"ImageMagick","Gmagick":"GraphicsMagick"}', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => 1, 
            'module_slug' => 'thumburl', 
            'module_id'   => $module->id, 
            'order'       => 999, 
        );
        $thumburl_image_library = Settings\Model\Setting::create($thumburl_image_library);

        $thumburl_image_mode = array(
            'title'       => 'Image Mode', 
            'slug'        => 'thumburl_image_mode', 
            'description' => 'Defines how the thumbnail will be generated.', 
            'type'        => 'select', 
            'default'     => 'outbound', 
            'value'       => 'outbound',
            'options'     => '{"outbound":"Outbound","inset":"Inset"}', 
            'class'       => '', 
            'section'     => '',
            'validation'  => '', 
            'is_gui'      => 1, 
            'module_slug' => 'thumburl', 
            'module_id'   => $module->id, 
            'order'       => 999, 
        );
        $thumburl_image_mode = Settings\Model\Setting::create($thumburl_image_mode);
    }

    public function uninstall()
    {
        //
        // REMOVE SETTINGS
        // 
        $settings = Settings\Model\Setting::where_module_slug('thumburl')->get();
        
        if(isset($settings) and !empty($settings))
        {
            foreach ($settings as $setting) 
            {
                $setting->delete();
            }
        }
    }

    public function __destruct()
    {
        Bundle::disable('settings');
        Bundle::disable('modules');
    }
}