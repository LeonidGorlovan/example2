<?php

namespace App\Actions;

use Illuminate\Support\Facades\File;

class DestroyImageAction
{
    public function __invoke(string $image): void
    {
        $path = public_path('images/' . $image);

        if(!empty($image) && File::exists($path)) {
            File::delete($path);
        }
    }
}
