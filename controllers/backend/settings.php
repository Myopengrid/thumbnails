<?php

class Thumbnails_Backend_Settings_Controller extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->data['section_bar'] = array(
            Lang::line('thumbnails::lang.Settings')->get(ADM_LANG)    => URL::base().'/'.ADM_URI.'/thumbnails',
        );

        $this->data['bar'] = array(
            'title'       => Lang::line('thumbnails::lang.Thumbnail URL')->get(ADM_LANG),
            'url'         => URL::base().'/'.ADM_URI.'/thumbnails',
            'description' => Lang::line('thumbnails::lang.Allow users to modify the thumbnails module configuration')->get(ADM_LANG),
        );
    }
    
    public function get_index()
    {
        $this->data['section_bar_active'] = Lang::line('thumbnails::lang.Settings')->get(ADM_LANG);
        
        $this->data['settings'] = Settings\Model\Setting::where('module_slug', '=', 'thumbnails')
                                    ->order_by('order', 'asc')
                                    ->get();
        foreach ($this->data['settings'] as $setting) 
        {
            if($setting->slug == 'thumbnails_image_library')
            {
                $this->is_available($setting);
            }
        }

        return $this->theme->render('thumbnails::backend.settings.index',$this->data);
    }

    private function is_available(&$setting)
    {
        $result = array();

        $options = json_decode($setting->options, true);
        if(isset($options) and !empty($options))
        {
            foreach ($options as $key => $value) 
            {
                if($key == 'Gd')
                {
                    if(function_exists('gd_info'))
                    {
                        $result[$key] = $value;
                    }
                }
                else
                {
                    if(class_exists($key))
                    {
                        $result[$key] = $value;
                    }
                }
            }
        }
        $setting->options = json_encode($result);
    }
}