<?php
namespace App\Services;

use Exception;
use File;
use Illuminate\Support\Str;

class UploadService
{
    public static function uploadFilesGeneral($file){
        try{
          $date = now()->format('dmYHis');
          $original_name = $file->getClientOriginalName();
          $original_size = $file->getSize();
          $filename = $original_name;
          while (file_exists('/upload_tmp/'.$date.'/'.$filename)) {
            $original_name;
          }
          $folderpath = public_path('/upload_tmp/'.$date.'/');
          $file->move($folderpath, $filename);
          $data = [
            'path' => 'upload_tmp/'.$date.'/'.$filename,
            'filename' => $original_name,
            'capacity' => $original_size,
            'key' => Str::random(10)
          ];
          return $data;
        } catch (Exception $exception) {
          abort(402, 'Upload fails.' );
        }
      }

    public static function uploadImage($code, $file, $width = 300, $height = 300)
    {
        try {
            $random = Str::random(8);
            $date = now()->format('Y-m-d');
            $name = $file->getClientOriginalName();
            $filename = $date.'_'.$random.'-'.$name;
            while (file_exists('/uploads/'.$code.'/'.$filename)) {
                $filename = $date.'_'.$random.'-'.$name;
            }

            $folderpath = public_path('/uploads/'.$code.'/');
            File::makeDirectory($folderpath, $mode = 0777, true, true);
            $file->move($folderpath, $filename);
            $imageUrl = '/uploads/'.$code.'/'.rawurlencode($filename);
            return $imageUrl;
        } catch (Exception $exception) {
            abort(402, 'Upload fails.');
        }
    }
    public static function uploadVideo($code, $file)
    {
        try {
            $random = Str::random(16);
            $date = now()->format('Y-m-d');
            $etx = $file->getClientOriginalExtension();
            $filename = $date.'_'.$random.'.'.$etx;
            while (file_exists('/uploads/'.$code.'/'.$filename)) {
                $filename = $date.'_'.$random.'.'.$etx;
            }

            $folderpath = public_path('/uploads/'.$code.'/');
            $path = File::makeDirectory($folderpath, $mode = 0777, true, true);
            $imageVideo = '/uploads/'.$code.'/'.$filename;
            $file->move($folderpath, $imageVideo);

            return $imageVideo;
        } catch (Exception $exception) {
            abort(402, 'Upload fails.');
        }
    }
    public static function moveImagetoPublic($file_path, $end_point)
    {
        $img_name = basename($file_path);
        $public_path = '/uploads/'.$end_point;
        if(!File::exists(public_path($public_path))){
            File::makeDirectory(public_path($public_path), $mode = 0777, true, true);
        }
        $tmp_path = public_path('/tmp/uploads/').'/'.$img_name;
        if (File::exists($tmp_path)) {
            File::copy($tmp_path, public_path($public_path) . '/' . $img_name);
            unlink($tmp_path);
            return $public_path .'/'. $img_name;
        }
        return $file_path;
    }

}
