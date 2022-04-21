<?php

define('PAGINATION_COUNT', 50);

if (!function_exists('upload_image')) {
    function upload_image($folder, $image)
    {
        $store = \Illuminate\Support\Facades\Storage::disk('public')->put($folder, $image);
        $url = \Illuminate\Support\Facades\Storage::disk('public')->url($store);
        return $url;

    }
}


