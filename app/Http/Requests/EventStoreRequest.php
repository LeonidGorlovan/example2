<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Image;

/**
 * @property int venue
 * @property string name
 * @property string poster
 * @property Carbon event_date
 * @property Image image
 */

class EventStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'venue' => 'required|numeric|exists:venues,id',
            'name' => 'required|string|max:255',
            'poster' => 'required|string|max:255',
            'event_date' => 'required|date',
            'image' => 'required|image|max:1024|dimensions:max_width=2000,max_height=2000',
        ];
    }
}
