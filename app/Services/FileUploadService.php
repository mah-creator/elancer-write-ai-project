<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FileUploadService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function upload($key, $path = '/', $disk = 'public')
    {
        $request = app(Request::class);
        $file = $request->file($key);
        if (!$file) {
            return null;
        }
        return $file->store($path, ['disk' => $disk]);
    }

    public function delete($file_path, $disk = 'public')
    {
        if ($file_path) {
            return Storage::disk($disk)->delete($file_path);
        }
        return false;
    }
}
