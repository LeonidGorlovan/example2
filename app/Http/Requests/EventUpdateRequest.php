<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int venue
 * @property string name
 * @property string poster
 * @property Carbon event_date
 */

class EventUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'venue' => 'required|numeric|exists:venues,id',
            'name' => 'required|string|max:255',
            'poster' => 'required|string|max:255',
            'event_date' => 'required|date',
            'image' => 'image|max:1024|dimensions:max_width=1200,max_height=1200',
        ];
    }
}
