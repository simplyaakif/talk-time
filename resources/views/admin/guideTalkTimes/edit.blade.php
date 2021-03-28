@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.guideTalkTime.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.guide-talk-times.update", [$guideTalkTime->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="guide_id">{{ trans('cruds.guideTalkTime.fields.guide') }}</label>
                <select class="form-control select2 {{ $errors->has('guide') ? 'is-invalid' : '' }}" name="guide_id" id="guide_id">
                    @foreach($guides as $id => $guide)
                        <option value="{{ $id }}" {{ (old('guide_id') ? old('guide_id') : $guideTalkTime->guide->id ?? '') == $id ? 'selected' : '' }}>{{ $guide }}</option>
                    @endforeach
                </select>
                @if($errors->has('guide'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guide') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guideTalkTime.fields.guide_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minutes">{{ trans('cruds.guideTalkTime.fields.minutes') }}</label>
                <input class="form-control {{ $errors->has('minutes') ? 'is-invalid' : '' }}" type="number" name="minutes" id="minutes" value="{{ old('minutes', $guideTalkTime->minutes) }}" step="1">
                @if($errors->has('minutes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('minutes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.guideTalkTime.fields.minutes_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection