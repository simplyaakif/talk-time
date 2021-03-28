<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTalentTalkTimeRequest;
use App\Http\Requests\UpdateTalentTalkTimeRequest;
use App\Http\Resources\Admin\TalentTalkTimeResource;
use App\Models\TalentTalkTime;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TalentTalkTimeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('talent_talk_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TalentTalkTimeResource(TalentTalkTime::with(['talent'])->get());
    }

    public function store(StoreTalentTalkTimeRequest $request)
    {
        $talentTalkTime = TalentTalkTime::create($request->all());

        return (new TalentTalkTimeResource($talentTalkTime))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TalentTalkTime $talentTalkTime)
    {
        abort_if(Gate::denies('talent_talk_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TalentTalkTimeResource($talentTalkTime->load(['talent']));
    }

    public function update(UpdateTalentTalkTimeRequest $request, TalentTalkTime $talentTalkTime)
    {
        $talentTalkTime->update($request->all());

        return (new TalentTalkTimeResource($talentTalkTime))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TalentTalkTime $talentTalkTime)
    {
        abort_if(Gate::denies('talent_talk_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talentTalkTime->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
