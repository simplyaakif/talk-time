@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.conversation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.conversations.update", [$conversation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="talent_id">{{ trans('cruds.conversation.fields.talent') }}</label>
                <select class="form-control select2 {{ $errors->has('talent') ? 'is-invalid' : '' }}" name="talent_id" id="talent_id">
                    @foreach($talent as $id => $talent)
                        <option value="{{ $id }}" {{ (old('talent_id') ? old('talent_id') : $conversation->talent->id ?? '') == $id ? 'selected' : '' }}>{{ $talent }}</option>
                    @endforeach
                </select>
                @if($errors->has('talent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.conversation.fields.talent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guide_id">{{ trans('cruds.conversation.fields.guide') }}</label>
                <select class="form-control select2 {{ $errors->has('guide') ? 'is-invalid' : '' }}" name="guide_id" id="guide_id">
                    @foreach($guides as $id => $guide)
                        <option value="{{ $id }}" {{ (old('guide_id') ? old('guide_id') : $conversation->guide->id ?? '') == $id ? 'selected' : '' }}>{{ $guide }}</option>
                    @endforeach
                </select>
                @if($errors->has('guide'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guide') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.conversation.fields.guide_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_time">{{ trans('cruds.conversation.fields.start_time') }}</label>
                <input class="form-control datetime {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time', $conversation->start_time) }}">
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.conversation.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_time">{{ trans('cruds.conversation.fields.end_time') }}</label>
                <input class="form-control datetime {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time', $conversation->end_time) }}">
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.conversation.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guide_remarks">{{ trans('cruds.conversation.fields.guide_remarks') }}</label>
                <textarea class="form-control {{ $errors->has('guide_remarks') ? 'is-invalid' : '' }}" name="guide_remarks" id="guide_remarks">{{ old('guide_remarks', $conversation->guide_remarks) }}</textarea>
                @if($errors->has('guide_remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guide_remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.conversation.fields.guide_remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="talent_remarks">{{ trans('cruds.conversation.fields.talent_remarks') }}</label>
                <textarea class="form-control {{ $errors->has('talent_remarks') ? 'is-invalid' : '' }}" name="talent_remarks" id="talent_remarks">{{ old('talent_remarks', $conversation->talent_remarks) }}</textarea>
                @if($errors->has('talent_remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('talent_remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.conversation.fields.talent_remarks_helper') }}</span>
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