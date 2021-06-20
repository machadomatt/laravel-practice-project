<?php

namespace App\Support;

use CoffeeCode\Cropper\Cropper as CropperCropper;

class Cropper
{
    public static function thumb(string $uri, int $width, int $height = null)
    {
        $cropper = new CropperCropper('../public/storage/cache');
        $pathThumb = $cropper->make(config('filesystems.disks.public.root') . "/" . $uri, $width, $height);

        return 'cache/' . collect(explode('/', $pathThumb))->last();
    }
}
