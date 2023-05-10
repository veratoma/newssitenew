<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;


class UploadFileService
{
    public function uploadImage(UploadedFile $uploadedFile)
    {
        $path = $uploadedFile->storeAs('news', $uploadedFile->hashName(), 'public');
        if ($path === null) {
            throw new UploadException('not save image');
        }


        return $path;
    }
}

