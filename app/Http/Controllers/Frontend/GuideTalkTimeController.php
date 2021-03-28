<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGuideTalkTimeRequest;
use App\Http\Requests\StoreGuideTalkTimeRequest;
use App\Http\Requests\UpdateGuideTalkTimeRequest;
use App\Models\Guide;
use App\Models\GuideTalkTime;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuideTalkTimeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('guide_talk_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guideTalkTimes = GuideTalkTime::with(['guide'])->get();

        return view('frontend.guideTalkTimes.index', compact('guideTalkTimes'));
    }

    public function create()
    {
        abort_if(Gate::denies('guide_talk_time_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guides = Guide::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.guideTalkTimes.create', compact('guides'));
    }

    public function store(StoreGuideTalkTimeRequest $request)
    {
        $guideTalkTime = GuideTalkTime::create($request->all());

        return redirect()->route('frontend.guide-talk-times.index');
    }

    public function edit(GuideTalkTime $guideTalkTime)
    {
        abort_if(Gate::denies('guide_talk_time_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guides = Guide::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guideTalkTime->load('guide');

        return view('frontend.guideTalkTimes.edit', compact('guides', 'guideTalkTime'));
    }

    public function update(UpdateGuideTalkTimeRequest $request, GuideTalkTime $guideTalkTime)
    {
        $guideTalkTime->update($request->all());

        return redirect()->route('frontend.guide-talk-times.index');
    }

    public function show(GuideTalkTime $guideTalkTime)
    {
        abort_if(Gate::denies('guide_talk_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guideTalkTime->load('guide');

        return view('frontend.guideTalkTimes.show', compact('guideTalkTime'));
    }

    public function destroy(GuideTalkTime $guideTalkTime)
    {
        abort_if(Gate::denies('guide_talk_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guideTalkTime->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuideTalkTimeRequest $request)
    {
        GuideTalkTime::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
