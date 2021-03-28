<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGuideRequest;
use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;
use App\Models\Guide;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GuidesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('guide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guides = Guide::with(['user', 'media'])->get();

        return view('admin.guides.index', compact('guides'));
    }

    public function create()
    {
        abort_if(Gate::denies('guide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.guides.create', compact('users'));
    }

    public function store(StoreGuideRequest $request)
    {
        $guide = Guide::create($request->all());

        if ($request->input('profile_picture', false)) {
            $guide->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $guide->id]);
        }

        return redirect()->route('admin.guides.index');
    }

    public function edit(Guide $guide)
    {
        abort_if(Gate::denies('guide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $guide->load('user');

        return view('admin.guides.edit', compact('users', 'guide'));
    }

    public function update(UpdateGuideRequest $request, Guide $guide)
    {
        $guide->update($request->all());

        if ($request->input('profile_picture', false)) {
            if (!$guide->profile_picture || $request->input('profile_picture') !== $guide->profile_picture->file_name) {
                if ($guide->profile_picture) {
                    $guide->profile_picture->delete();
                }

                $guide->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
            }
        } elseif ($guide->profile_picture) {
            $guide->profile_picture->delete();
        }

        return redirect()->route('admin.guides.index');
    }

    public function show(Guide $guide)
    {
        abort_if(Gate::denies('guide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guide->load('user');

        return view('admin.guides.show', compact('guide'));
    }

    public function destroy(Guide $guide)
    {
        abort_if(Gate::denies('guide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guide->delete();

        return back();
    }

    public function massDestroy(MassDestroyGuideRequest $request)
    {
        Guide::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('guide_create') && Gate::denies('guide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Guide();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
