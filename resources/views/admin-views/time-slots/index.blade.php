@extends('layouts.admin.app')

@section('title','Add new TimeSlot')

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> {{__('messages.add')}} {{__('messages.new')}} {{__('Time Slot')}}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.timeslot.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1">{{__('messages.name')}}</label>
                                        <input type="text" name="name" class="form-control" placeholder="{{__('messages.name')}}" required maxlength="191">
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1">{{ __('messages.available') }}
                                            {{ __('messages.time') }} {{ __('messages.starts') }}</label>
                                        <input type="time" name="available_time_starts" class="form-control"
                                            id="available_time_starts" placeholder="Ex : 10:30 am" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1">{{ __('messages.available') }}
                                            {{ __('messages.time') }} {{ __('messages.ends') }}</label>
                                        <input type="time" name="available_time_ends" class="form-control"
                                            id="available_time_ends" placeholder="5:45 pm" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-header">
                    <h5>{{__('messages.timeslot')}} {{__('messages.list')}}<span class="badge badge-soft-dark ml-2" id="itemCount">{{$timeslots->total()}}</span></h5>
                        <form id="dataSearch">
                        @csrf
                            <!-- Search -->
                            <div class="input-group input-group-merge input-group-flush">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tio-search"></i>
                                    </div>
                                </div>
                                <input id="datatableSearch" type="search" name="search" class="form-control" placeholder="{{__('messages.search_here')}}" aria-label="{{__('messages.search_here')}}">
                                <button type="submit" class="btn btn-light">{{__('messages.search')}}</button>
                            </div>
                            <!-- End Search -->
                        </form>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive datatable-custom" id="table-div">
                        <table id="columnSearchDatatable"
                               class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               data-hs-datatables-options='{
                                "order": [],
                                "orderCellsTop": true,

                                "entries": "#datatableEntries",
                                "isResponsive": false,
                                "isShowPaging": false,
                                "paging":false,
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
                                    <td>{{$key+$timeslots->firstItem()}}</td>
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
                            {!! $timeslots->links() !!}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Table -->
        </div>
    </div>

@endsection

@push('script_2')
<script>
    $("#date_from").on("change", function () {
        $('#date_to').attr('min',$(this).val());
    });

    $("#date_to").on("change", function () {
        $('#date_from').attr('max',$(this).val());
    });

    $(document).on('ready', function () {
        $('#discount_type').on('change', function() {
         if($('#discount_type').val() == 'amount')
            {
                $('#max_discount').attr("readonly","true");
                $('#max_discount').val(0);
            }
            else
            {
                $('#max_discount').removeAttr("readonly");
            }
        });

        $('#date_from').attr('min',(new Date()).toISOString().split('T')[0]);
        $('#date_to').attr('min',(new Date()).toISOString().split('T')[0]);
        $('.js-data-example-ajax').select2({
            ajax: {
                url: '{{url('/')}}/admin/vendor/get-restaurants',
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data) {
                    return {
                    results: data
                    };
                },
                __port: function (params, success, failure) {
                    var $request = $.ajax(params);

                    $request.then(success);
                    $request.fail(failure);

                    return $request;
                }
            }
        });
            // INITIALIZATION OF DATATABLES
            // =======================================================
            var datatable = $.HSCore.components.HSDatatables.init($('#columnSearchDatatable'), {
                select: {
                    style: 'multi',
                    classMap: {
                        checkAll: '#datatableCheckAll',
                        counter: '#datatableCounter',
                        counterInfo: '#datatableCounterInfo'
                    }
                },
                language: {
                    zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src="{{asset('assets/admin/svg/illustrations/sorry.svg')}}" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
                }
            });

            // INITIALIZATION OF SELECT2
            // =======================================================
            $('.js-select2-custom').each(function () {
                var select2 = $.HSCore.components.HSSelect2.init($(this));
            });
        });
        $('#zone_wise').hide();
        function timeslot_type_change(timeslot_type) {
           if(timeslot_type=='zone_wise')
            {
                $('#restaurant_wise').hide();
                $('#zone_wise').show();
            }
            else if(timeslot_type=='restaurant_wise')
            {
                $('#restaurant_wise').show();
                $('#zone_wise').hide();
            }
            else if(timeslot_type=='first_order')
            {
                $('#zone_wise').hide();
                $('#restaurant_wise').hide();
                $('#timeslot_limit').val(1);
                $('#timeslot_limit').attr("readonly","true");
            }
            else{
                $('#zone_wise').hide();
                $('#restaurant_wise').hide();
                $('#timeslot_limit').val('');
                $('#timeslot_limit').removeAttr("readonly");
            }

            if(timeslot_type=='free_delivery')
            {
                $('#discount_type').attr("disabled","true");
                $('#discount_type').val("").trigger( "change" );
                $('#max_discount').val(0);
                $('#max_discount').attr("readonly","true");
                $('#discount').val(0);
                $('#discount').attr("readonly","true");
            }
            else{
                $('#max_discount').removeAttr("readonly");
                $('#discount_type').removeAttr("disabled");
                $('#discount').removeAttr("readonly");
            }
        }
        $('#dataSearch').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.timeslot.search')}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#table-div').html(data.view);
                    $('#itemCount').html(data.count);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
    </script>
@endpush
