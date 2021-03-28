<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuideTalkTimeRequest;
use App\Http\Requests\UpdateGuideTalkTimeRequest;
use App\Http\Resources\Admin\GuideTalkTimeResource;
use App\Models\GuideTalkTime;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuideTalkTimeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guide_talk_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuideTalkTimeResource(GuideTalkTime::with(['guide'])->get());
    }

    public function store(StoreGuideTalkTimeRequest $request)
    {
        $guideTalkTime = GuideTalkTime::create($request->all());

        return (new GuideTalkTimeResource($guideTalkTime))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GuideTalkTime $guideTalkTime)
    {
        abort_if(Gate::denies('guide_talk_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuideTalkTimeResource($guideTalkTime->load(['guide']));
    }

    public function update(UpdateGuideTalkTimeRequest $request, GuideTalkTime $guideTalkTime)
    {
        $guideTalkTime->update($request->all());

        return (new GuideTalkTimeResource($guideTalkTime))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GuideTalkTime $guideTalkTime)
    {
        abort_if(Gate::denies('guide_talk_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guideTalkTime->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
