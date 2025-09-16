<?php

namespace App\Helpers;

use Intervention\Image\Laravel\Facades\Image;

use Illuminate\Support\Facades\File;

class ImageHelper
{
    public static function resizeAndSave($file, $path, $width = 1296, $height = 505)
    {
        // ইউনিক নাম বানাও
        $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Full path বানাও
        $directory = public_path($path);
        $fullPath  = $directory . $fileName;

        // যদি directory না থাকে তাহলে বানিয়ে ফেলো
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Resize & Save
        $img = Image::read($file);
        $img->resize($width, $height);
        $img->save($fullPath);

        return $path . $fileName; // database এ path save করার জন্য
    }
}
