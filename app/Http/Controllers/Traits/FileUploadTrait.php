<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use ZipArchive;
use Illuminate\Support\Facades\File;
use RarArchiver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use DirectoryIterator;
use Illuminate\Support\Str;
use App\Models\Ground;
use App\Models\Project\text_pano;
use Illuminate\Support\Collection;
use Closure;
use App\Jobs\deleteBeforeUpdate;
use App\Jobs\copyFileQueue;

trait FileUploadTrait
{

    public function uploadImageResize($image, $width, $height)
    {
        $image_resize = Image::make($image->getRealPath());

        $image_width =    $image_resize->width();
        $image_height =  $image_resize->height();
        $filename = time() . '-' . $image->getClientOriginalName();

        if ($image_width > $width && $image_height > $height) {
            Image::make($image)->resize($width, $height)->save(public_path('uploads/images') . '/' . $filename);
        } else {
            Image::make($image)->save(public_path('uploads/images') . '/' . $filename);
        }

        return 'uploads/images/' . $filename;
    }

    public function updateImageResize($image, $width, $height, $attribute)
    {
        $filename = time() . '-' . $image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_width =    $image_resize->width();
        $image_height =  $image_resize->height();
        if ($image_width > $width && $image_height > $height) {
            Image::make($image)->resize($width, $height)->save(public_path('uploads/images') . '/' . $filename);
        } else {
            Image::make($image)->save(public_path('uploads/images') . '/' . $filename);
        }
        if ($attribute == null || file_exists($attribute) == false) {
            $path = 'uploads/images/' . $filename;
        } else {
            unlink($attribute);
            $path = 'uploads/images/' . $filename;
        }

        return $path;
    }

    public function upload($image, $name, $middlepath)
    {
        $fileName = $name . $image->getClientOriginalName();
        Image::make($image)->save(public_path($middlepath) . '/' . $fileName);
        $path = $middlepath . '/' . $fileName;

        return $path;
    }


    public function updateImage($image, $name, $middlepath, $attribute)
    {
        $fileName = $name . $image->getClientOriginalName();
        Image::make($image)->save(public_path($middlepath) . '/' . $fileName);

        if ($attribute == null || file_exists($attribute) == false) {
            $path = $middlepath . '/' . $fileName;
        } else {
            unlink($attribute);
            $path = $middlepath . '/' . $fileName;
        }
        return $path;
    }
    public function deleteImage($attribute)
    {

        if (file_exists($attribute)) {

            unlink($attribute);
        }
    }
}
