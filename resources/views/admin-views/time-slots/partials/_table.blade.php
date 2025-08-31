<table id="columnSearchDatatable"
        class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
        data-hs-datatables-options='{
        "order": [],
        "orderCellsTop": true,

        "entries": "#datatableEntries",
        "isResponsive": false,
        "isShowPaging": false,
        "pagination": "datatablePagination"
        }'>
    <thead class="thead-light">
    <tr>
        <th>{{__('messages.#')}}</th>
        <th>{{__('messages.name')}}</th>
        <th>{{__('messages.start')}} {{__('messages.date')}}</th>
        <th>{{__('messages.expire')}} {{__('messages.date')}}</th>
        <th>{{__('messages.status')}}</th>
        <th>{{__('messages.action')}}</th>
    </tr>
    </thead>

    <tbody id="set-rows">
    @foreach($timeslots as $key=>$timeslot)
        <tr>
            <td>{{$key+1}}</td>
            <td>
            <span class="d-block font-size-sm text-body">
                {{Str::limit($timeslot['name'],15,'...')}}
            </span>
            </td>
            <td>{{$timeslot['start_date']}}</td>
            <td>{{$timeslot['expire_date']}}</td>
            <td>
                <label class="toggle-switch toggle-switch-sm" for="timeslotCheckbox{{$timeslot->id}}">
                    <input type="checkbox" onclick="location.href='{{route('admin.timeslot.status',[$timeslot['id'],$timeslot->status?0:1])}}'" class="toggle-switch-input" id="timeslotCheckbox{{$timeslot->id}}" {{$timeslot->status?'checked':''}}>
                    <span class="toggle-switch-label">
                        <span class="toggle-switch-indicator"></span>
                    </span>
                </label>
            </td>
            <td>
                <a class="btn btn-sm btn-white" href="{{route('admin.timeslot.update',[$timeslot['id']])}}"title="{{__('messages.edit')}} {{__('messages.timeslot')}}"><i class="tio-edit"></i>
                </a>
                <a class="btn btn-sm btn-white" href="javascript:" onclick="form_alert('timeslot-{{$timeslot['id']}}','Want to delete this timeslot ?')" title="{{__('messages.delete')}} {{__('messages.timeslot')}}"><i class="tio-delete-outlined"></i>
                </a>
                <form action="{{route('admin.timeslot.delete',[$timeslot['id']])}}"
                            method="post" id="timeslot-{{$timeslot['id']}}">
                        @csrf @method('delete')
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
<table>
    <tfoot>

    </tfoot>
</table>
