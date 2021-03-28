<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTalentTalkTimeRequest;
use App\Http\Requests\StoreTalentTalkTimeRequest;
use App\Http\Requests\UpdateTalentTalkTimeRequest;
use App\Models\Talent;
use App\Models\TalentTalkTime;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TalentTalkTimeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('talent_talk_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talentTalkTimes = TalentTalkTime::with(['talent'])->get();

        return view('admin.talentTalkTimes.index', compact('talentTalkTimes'));
    }

    public function create()
    {
        abort_if(Gate::denies('talent_talk_time_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent = Talent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.talentTalkTimes.create', compact('talent'));
    }

    public function store(StoreTalentTalkTimeRequest $request)
    {
        $talentTalkTime = TalentTalkTime::create($request->all());

        return redirect()->route('admin.talent-talk-times.index');
    }

    public function edit(TalentTalkTime $talentTalkTime)
    {
        abort_if(Gate::denies('talent_talk_time_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent = Talent::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $talentTalkTime->load('talent');

        return view('admin.talentTalkTimes.edit', compact('talent', 'talentTalkTime'));
    }

    public function update(UpdateTalentTalkTimeRequest $request, TalentTalkTime $talentTalkTime)
    {
        $talentTalkTime->update($request->all());

        return redirect()->route('admin.talent-talk-times.index');
    }

    public function show(TalentTalkTime $talentTalkTime)
    {
        abort_if(Gate::denies('talent_talk_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talentTalkTime->load('talent');

        return view('admin.talentTalkTimes.show', compact('talentTalkTime'));
    }

    public function destroy(TalentTalkTime $talentTalkTime)
    {
        abort_if(Gate::denies('talent_talk_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talentTalkTime->delete();

        return back();
    }

    public function massDestroy(MassDestroyTalentTalkTimeRequest $request)
    {
        TalentTalkTime::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
