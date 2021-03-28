<?php

namespace App\Http\Requests;

use App\Models\Talent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTalentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('talent_edit');
    }

    public function rules()
    {
        return [
            'name'       => [
                'string',
                'nullable',
            ],
            'mobile'     => [
                'string',
                'required',
            ],
            'dob'        => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'profession' => [
                'string',
                'nullable',
            ],
            'city'       => [
                'string',
                'nullable',
            ],
        ];
    }
}
