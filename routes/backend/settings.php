<?php

Route::get(ADM_URI.'/(:bundle)', function()
{
    return Controller::call('thumbnails::backend.settings@index');
});

Route::put(ADM_URI.'/(:bundle)', function()
{
    return Controller::call('settings::backend.settings@update');
});