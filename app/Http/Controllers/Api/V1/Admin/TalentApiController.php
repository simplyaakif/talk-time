<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTalentRequest;
use App\Http\Requests\UpdateTalentRequest;
use App\Http\Resources\Admin\TalentResource;
use App\Models\Talent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TalentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('talent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TalentResource(Talent::with(['user'])->get());
    }

    public function store(StoreTalentRequest $request)
    {
        $talent = Talent::create($request->all());

        if ($request->input('profile_picture', false)) {
            $talent->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_picture'))))->toMediaCollection('profile_picture');
        }

        return (new TalentResource($talent))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Talent $talent)
    {
        abort_if(Gate::denies('talent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TalentResource($talent->load(['user']));
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

        return (new TalentResource($talent))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Talent $talent)
    {
        abort_if(Gate::denies('talent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $talent->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
