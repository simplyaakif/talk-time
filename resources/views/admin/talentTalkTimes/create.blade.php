@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.talentTalkTime.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.talent-talk-times.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="talent_id">{{ trans('cruds.talentTalkTime.fields.talent') }}</label>
                <select class="form-control select2 {{ $errors->has('talent') ? 'is-invalid' : '' }}" name="talent_id" id="talent_id">
                    @foreach($talent as $id => $talent)
                        <option value="{{ $id }}" {{ old('talent_id') == $id ? 'selected' : '' }}>{{ $talent }}</option>
                    @endforeach
                </select>
                @if($errors->has('talent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.talentTalkTime.fields.talent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minutes">{{ trans('cruds.talentTalkTime.fields.minutes') }}</label>
                <input class="form-control {{ $errors->has('minutes') ? 'is-invalid' : '' }}" type="number" name="minutes" id="minutes" value="{{ old('minutes', '') }}" step="1">
                @if($errors->has('minutes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('minutes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.talentTalkTime.fields.minutes_helper') }}</span>
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