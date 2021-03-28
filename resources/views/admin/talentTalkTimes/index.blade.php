@extends('layouts.admin')
@section('content')
@can('talent_talk_time_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.talent-talk-times.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.talentTalkTime.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.talentTalkTime.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TalentTalkTime">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.talentTalkTime.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.talentTalkTime.fields.talent') }}
                        </th>
                        <th>
                            {{ trans('cruds.talentTalkTime.fields.minutes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($talentTalkTimes as $key => $talentTalkTime)
                        <tr data-entry-id="{{ $talentTalkTime->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $talentTalkTime->id ?? '' }}
                            </td>
                            <td>
                                {{ $talentTalkTime->talent->name ?? '' }}
                            </td>
                            <td>
                                {{ $talentTalkTime->minutes ?? '' }}
                            </td>
                            <td>
                                @can('talent_talk_time_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.talent-talk-times.show', $talentTalkTime->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('talent_talk_time_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.talent-talk-times.edit', $talentTalkTime->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('talent_talk_time_delete')
                                    <form action="{{ route('admin.talent-talk-times.destroy', $talentTalkTime->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('talent_talk_time_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.talent-talk-times.massDestroy') }}",
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
  let table = $('.datatable-TalentTalkTime:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection