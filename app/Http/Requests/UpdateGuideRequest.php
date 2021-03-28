<?php

namespace App\Http\Requests;

use App\Models\Guide;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGuideRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('guide_edit');
    }

    public function rules()
    {
        return [
            'name'   => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
        ];
    }
}
