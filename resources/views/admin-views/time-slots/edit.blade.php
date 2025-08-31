@extends('layouts.admin.app')

@section('title','Update TimeSlot')

@push('css_or_js')

@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-edit"></i> {{__('Time Slot')}} {{__('messages.update')}}</h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <form action="{{route('admin.timeslot.update',[$timeslot['id']])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1">{{__('messages.name')}}</label>
                                <input type="text" name="name" value="{{$timeslot['name']}}" class="form-control"
                                       placeholder="{{__('messages.new_timeslot')}}" required maxlength="191">
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                    for="exampleFormControlInput1">{{ __('messages.available') }}
                                    {{ __('messages.time') }} {{ __('messages.starts') }}</label>
                                <input type="time" value="{{ $timeslot['available_time_starts'] }}"
                                    name="available_time_starts" class="form-control" id="available_time_starts"
                                    placeholder="Ex : 10:30 am" required>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="form-group">
                                <label class="input-label"
                                    for="exampleFormControlInput1">{{ __('messages.available') }}
                                    {{ __('messages.time') }} {{ __('messages.ends') }}</label>
                                <input type="time" value="{{ $timeslot['available_time_ends'] }}"
                                    name="available_time_ends" class="form-control" id="available_time_ends"
                                    placeholder="5:45 pm" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>
                </form>
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
            $('#date_from').attr('max','{{date("Y-m-d",strtotime($timeslot["expire_date"]))}}');
            $('#date_to').attr('min','{{date("Y-m-d",strtotime($timeslot["start_date"]))}}');
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
            // INITIALIZATION OF FLATPICKR
            // =======================================================
            $('.js-flatpickr').each(function () {
                $.HSCore.components.HSFlatpickr.init($(this));
            });
        });

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
    </script>
@endpush
