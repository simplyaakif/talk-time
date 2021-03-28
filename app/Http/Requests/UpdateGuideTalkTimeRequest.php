<?php

namespace App\Http\Requests;

use App\Models\GuideTalkTime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuideTalkTimeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guide_talk_time_edit');
    }

    public function rules()
    {
        return [
            'minutes' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
