<?php


if (!function_exists('uploadImage')) {
    function uploadImage($image, $path = 'uploads/images')
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $imageName);
        return $path . '/imges' . $imageName;
    }
}

