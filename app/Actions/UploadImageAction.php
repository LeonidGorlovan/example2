<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadImageAction
{
    public function __invoke(Request $request): string
    {
        $fileName = Str::random() . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('images', $fileName);

        return $fileName;
    }
}
