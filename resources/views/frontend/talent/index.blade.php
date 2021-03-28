@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('talent_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.talent.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.talent.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.talent.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Talent">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.talent.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.mobile') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.dob') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.profession') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.city') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.talent.fields.profile_picture') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($talent as $key => $talent)
                                    <tr data-entry-id="{{ $talent->id }}">
                                        <td>
                                            {{ $talent->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->mobile ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->dob ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->profession ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->city ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $talent->user->email ?? '' }}
                                        </td>
                                        <td>
                                            @if($talent->profile_picture)
                                                <a href="{{ $talent->profile_picture->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $talent->profile_picture->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('talent_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.talent.show', $talent->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('talent_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.talent.edit', $talent->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('talent_delete')
                                                <form action="{{ route('frontend.talent.destroy', $talent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('talent_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.talent.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Talent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection