<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Concerns\InteractsWithInput;

class FileHelper
{
    public static $directory = 'temp';

    /**
     * InteractsWithInput::file $file
     */
    public static function upload($file)
    {
        if ($file != null) {
            $name = now()->toDateString() . '-' . uniqid() . '.' . $file->extension();
            $file->move('storage/' . self::$directory, $name);
            return asset('storage/' . self::$directory . '/' . $name);
        }
        return null;
    }

    public static function move($file, $toDirectory,$rename = null)
    {
        self::deleteold();
        $file  = collect(explode('/', $file))->last();
        if($rename){
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $rename .='.'.$ext;
        }else{
            $rename = $file;
        }
        if (Storage::disk('public')->exists(self::$directory . '/' . $file)) {
            Storage::disk('public')->delete($toDirectory . '/' . $rename);
            Storage::disk('public')->copy(self::$directory . '/' . $file, $toDirectory . '/' . $rename);
            return asset('storage/' . $toDirectory . '/' . $rename);
        }
        return null;
    }

    public static function deleteold()
    {
        $files = collect();
        foreach (Storage::disk('public')->allFiles(self::$directory) as  $file) {
            $filename = public_path('storage/' . $file);

            if (file_exists($filename)) {
                $data = File::lastModified($filename);
                if (now() > Carbon::parse($data)->addDays(2)) {
                    unlink($filename);
                } else {
                    $files->add([
                        'date' => Carbon::parse($data)->format('Y-m-d'),
                        'file' => $filename,
                        'can_delete' => now() > Carbon::parse($data)->addDays(2)
                    ]);
                }
            }
        }
        return $files;
    }
}
