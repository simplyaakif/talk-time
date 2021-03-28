@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.talent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.talent.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.id') }}
                        </th>
                        <td>
                            {{ $talent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.name') }}
                        </th>
                        <td>
                            {{ $talent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.mobile') }}
                        </th>
                        <td>
                            {{ $talent->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.dob') }}
                        </th>
                        <td>
                            {{ $talent->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.profession') }}
                        </th>
                        <td>
                            {{ $talent->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.city') }}
                        </th>
                        <td>
                            {{ $talent->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.user') }}
                        </th>
                        <td>
                            {{ $talent->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.talent.fields.profile_picture') }}
                        </th>
                        <td>
                            @if($talent->profile_picture)
                                <a href="{{ $talent->profile_picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $talent->profile_picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.talent.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection