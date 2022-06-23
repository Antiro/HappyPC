<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
//    public static function uploadFile($file, $defaultFile = 'default.jpg', $folder='')
//    {
//        if ($file !== null) {
//            $path = $file->store($folder, 'public');
//        } else {
//            $path = $defaultFile;
//        }
//        return $path;
//    }

    public static function uploadImgService($file, $defaultFile = 'default.jpg', $folder='/services')
    {
        if ($file !== null) {
            $path = $file->store($folder, 'public');
        } else {
            $path = $defaultFile;
        }
        return $path;
    }

    public static function uploadImgWorker($file, $defaultFile = 'default.jpg', $folder='/workers')
    {
        if ($file !== null) {
            $path = $file->store($folder, 'public');
        } else {
            $path = $defaultFile;
        }
        return $path;
    }

    public static function deleteImgService($file)
    {
        $path = $file->img;
//        dd($path);
//        dd(Storage::disk('public')->has('$path'));
        if ($path !='services/default.jpg') {
            Storage::delete($path);
//            dd('da');
        }
//        dd('net');
    }

//    public static function deleteFile($file, $folder='', $defaultFiles=['default.jpg'])
//    {
//        $path = $folder . $file;
//        if (Storage::exists($path) && !in_array($file, $defaultFiles)) {
//            Storage::delete($path);
//        }
//    }
}
