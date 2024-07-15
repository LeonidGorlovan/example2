<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageRequestService
{
    private string $path = 'images';

    public function upload($image): null|string
    {
        if (empty($image)) {
            return null;
        }

        $fileName = $this->uniqueName($image->getClientOriginalExtension());
        $image->storeAs($this->path, $fileName);

        return $fileName;
    }

    public function delete($image): void
    {
        $pathToImg = $this->path . '/' . $image;

        if(!empty($image) && Storage::exists($pathToImg)) {
            Storage::delete($pathToImg);
        }
    }

    private function uniqueName(string $ext): string
    {
        return Str::random() . '.' . $ext;
    }
}
