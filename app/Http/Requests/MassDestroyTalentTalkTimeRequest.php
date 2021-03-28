<?php

namespace App\Http\Requests;

use App\Models\TalentTalkTime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTalentTalkTimeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('talent_talk_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:talent_talk_times,id',
        ];
    }
}
