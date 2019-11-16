<?php

namespace App\Helpers;

use File;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    public static function uploadImage(UploadedFile $uploadedFile, $idName, $folder)
    {
        setlocale(LC_TIME, 'id_ID');

        $path = storage_path('app/public/');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path);
        }
        
        if (!File::isDirectory($path . '/' . $folder)) {
            File::makeDirectory($path . '/' . $folder);
        }

        $fileName = !is_null($idName) ? $idName . '_' . Carbon::now()->timestamp . '_' . uniqId() : str_random(25);

        $image = Image::make($uploadedFile)->save($path . '/' . $folder . '/' . $fileName);

        if ($image) {
            return $folder . '/' . $fileName;

        } else {
            return response()->json("Failed");
        }
    }

    public static function deleteFile($fileName)
    {
        if (Storage::delete('public/'.$fileName)) {
            return true;
        }
    }

    public static function uploadFile(UploadedFile $uploadedFile, $idName, $folder)
    {
        setlocale(LC_TIME, 'id_ID');

        $fileName = !is_null($idName) ? $idName . '_' . Carbon::now()->timestamp . '_' . uniqId() : str_random(25);

        if ($uploadedFile->storeAs('public/' . $folder, $fileName)) {

            return $folder . '/' . $fileName;
        
        } else {
            return false;
        }
    }
}