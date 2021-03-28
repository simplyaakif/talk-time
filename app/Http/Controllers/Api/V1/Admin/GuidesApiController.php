<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGuideRequest;
use App\Http\Requests\UpdateGuideRequest;
use App\Http\Resources\Admin\GuideResource;
use App\Models\Guide;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuidesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('guide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuideResource(Guide::with(['user'])->get());
    }

    public function store(StoreGuideRequest $request)
    {
        $guide = Guide::create($request->all());

        if ($request->input('profile_picture', false)) {
            $guide->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
        }

        return (new GuideResource($guide))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Guide $guide)
    {
        abort_if(Gate::denies('guide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GuideResource($guide->load(['user']));
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

        return (new GuideResource($guide))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Guide $guide)
    {
        abort_if(Gate::denies('guide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $guide->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
