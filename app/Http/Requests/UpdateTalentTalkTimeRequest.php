<?php

namespace App\Http\Requests;

use App\Models\TalentTalkTime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTalentTalkTimeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('talent_talk_time_edit');
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
