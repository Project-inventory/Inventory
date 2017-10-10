<?php
namespace App;

use File;
use Storage;
class FileUpload
{
    /**
     * @param $request
     * @param $fileName
     * @param string $default
     * @return string
     */
    public static function photo($request, $fileName, $default="") {

        $photo = $request->$fileName;
        if($request->hasFile($fileName)){

            $extension = $photo->getClientOriginalExtension();
            $photoName = rand(11111, 99999).".".date('Y-m-d').".".time().".".$extension;
            Storage::disk('local')->put($photoName, File::get($photo));
            $photoName = $photoName;

        }else {
            $photoName = $default;
        }
        return $photoName;
    }
}