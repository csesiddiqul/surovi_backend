<?php

namespace App\Helpers;

use Intervention\Image\Laravel\Facades\Image;

class ImageHelper
{
    public static function resizeAndSave($file, $path, $width = 1296, $height = 505)
    {
        // ইউনিক নাম বানাও
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        // Save করার লোকেশন
        $fullPath = public_path($path . $fileName);
        // Resize & Save
        $img = Image::read($file);
        $img->resize($width, $height);
        $img->save($fullPath);

        return $path . $fileName; // database এ path save করার জন্য
    }
}
