@extends('layouts.app')

@section('specifics-style')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
    <div class="toast mt-3 mr-3" id="message" style="position: fixed; top: 0; right: 0;" data-delay="8000">
        @foreach (['warning', 'success'] as $msg)
        @if(Session::has('alert-' . $msg))
        <div class="toast-body alert-{{ $msg }}">
            {{ Session::get('alert-' . $msg) }}
        </div>
        @endif
        @endforeach
    </div>
</div>

<div class="section">
    <div class="text-center">
        <div class="container" id="form_settings">
            <div class="card" style="width: 20rem;">
                <div class="card-body">

                    <form method="POST" action="/settings/{{$action}}">
                        @csrf
                        <!-- field _______________________ -->
                        @if ($errors->has('max_queue')) <div class="alert alert-danger alert-dismissible">{{ $errors->first('max_queue') }}<a class="close" data-dismiss="alert" aria-label="close">&times;</a></div> @endif
                        <div class="form-group">

                            <label for="queue_max">Jumlah Maksimal Antrian</label>
                            <input type="text" class="form-control" name="queue_max" id="queue_max" value="{{ @is_null($setting) ? old('max_queue') : @$instance_setting->max_queue }}">
                            <input type="hidden" name="max_queue" id="max_queue" value="{{ @is_null($setting) ? old('max_queue') : @$instance_setting->max_queue }}" />

                        </div>
                        <!-- end field _______________________ -->

                        <!-- field _______________________ -->
                        @if ($errors->has('start_time')) <div class="alert alert-danger alert-dismissible">{{ $errors->first('start_time') }}<a class="close" data-dismiss="alert" aria-label="close">&times;</a></div> @endif
                        <div class="form-group">

                            <label for="start_time">Waktu Mulai</label>
                            <input type="time" class="form-control" name="start_time" id="start_time" value="{{ @is_null($setting) ? old('start_time') : @$instance_setting->start_time }}">

                        </div>
                        <!-- end field _______________________ -->

                        <!-- field _______________________ -->
                        @if ($errors->has('end_time')) <div class="alert alert-danger alert-dismissible">{{ $errors->first('end_time') }}<a class="close" data-dismiss="alert" aria-label="close">&times;</a></div> @endif
                        <div class="form-group">

                            <label for="end_time">Waktu Selesai</label>
                            <input type="time" class="form-control" name="end_time" id="end_time" value="{{ @is_null($setting) ? old('end_time') : @$instance_setting->end_time }}">

                        </div>
                        <!-- end field _______________________ -->

                        <!-- field _______________________ -->
                        @if ($errors->has('is_close_queue')) <div class="alert alert-danger alert-dismissible">{{ $errors->first('is_close_queue') }}<a class="close" data-dismiss="alert" aria-label="close">&times;</a></div> @endif
                        <div class="form-group">

                            <label for="is_close_queue">Tutup antrian</label>
                            <br>
                            <div class="cut_off_status">
                                <input type="checkbox" name="cut_off_status" id="cut_off_status" data-toggle="toggle" data-on="Ya" data-off="Tidak" data-offstyle="outline-warning" data-style="border">
                                <input type="hidden" name="is_close_queue" id="is_close_queue" value="{{ @is_null($setting) ? old('is_close_queue') : @$instance_setting->is_close_queue }}">
                            </div>

                        </div>
                        <!-- end field _______________________ -->

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary main-action-button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('pagespecificscripts')

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
    var queue_max = document.getElementById("queue_max");
    var is_close_queue = document.getElementById("is_close_queue");
    var status_cut_off = document.getElementById("is_close_queue").value;

    $(function() {

        queue_max.onchange = function() {
            $('#max_queue').val(queue_max.value);
        };

        $('#cut_off_status').change(function() {
            if ($(this).prop('checked')) {

                if (queue_max.value.length == 0) {
                    $('#max_queue').val(0);
                    queue_max.value = 0;
                }

                queue_max.disabled = true;
                is_close_queue.value = 1;

            } else {
                queue_max.disabled = false;
                is_close_queue.value = 0;
            }

        })

        if (status_cut_off == 0)
            $('#cut_off_status').bootstrapToggle('off')
        else
            $('#cut_off_status').bootstrapToggle('on')
    })

    $('#message').toast('show')
</script>

@stop