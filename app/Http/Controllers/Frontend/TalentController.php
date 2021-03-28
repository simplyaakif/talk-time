<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTalentRequest;
use App\Http\Requests\StoreTalentRequest;
use App\Http\Requests\UpdateTalentRequest;
use App\Models\Talent;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TalentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('talent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent = Talent::with(['user', 'media'])->get();

        return view('frontend.talent.index', compact('talent'));
    }

    public function create()
    {
        abort_if(Gate::denies('talent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.talent.create', compact('users'));
    }

    public function store(StoreTalentRequest $request)
    {
        $talent = Talent::create($request->all());

        if ($request->input('profile_picture', false)) {
            $talent->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $talent->id]);
        }

        return redirect()->route('frontend.talent.index');
    }

    public function edit(Talent $talent)
    {
        abort_if(Gate::denies('talent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $talent->load('user');

        return view('frontend.talent.edit', compact('users', 'talent'));
    }

    public function update(UpdateTalentRequest $request, Talent $talent)
    {
        $talent->update($request->all());

        if ($request->input('profile_picture', false)) {
            if (!$talent->profile_picture || $request->input('profile_picture') !== $talent->profile_picture->file_name) {
                if ($talent->profile_picture) {
                    $talent->profile_picture->delete();
                }

                $talent->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
            }
        } elseif ($talent->profile_picture) {
            $talent->profile_picture->delete();
        }

        return redirect()->route('frontend.talent.index');
    }

    public function show(Talent $talent)
    {
        abort_if(Gate::denies('talent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent->load('user');

        return view('frontend.talent.show', compact('talent'));
    }

    public function destroy(Talent $talent)
    {
        abort_if(Gate::denies('talent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent->delete();

        return back();
    }

    public function massDestroy(MassDestroyTalentRequest $request)
    {
        Talent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('talent_create') && Gate::denies('talent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Talent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
