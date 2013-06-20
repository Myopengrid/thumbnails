<?php

Event::listen('thumbnails.delete', function($image_path)
{
    if(is_array($image_path))
    {
        foreach ($image_path as $path) 
        {
            File::delete($path);
        }
    }
    else
    {
        File::delete($image_path);
    }
});