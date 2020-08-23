@extends('layouts.app')

@section('specifics-style')
@endsection

@section('content')

<div class="row actions">
    <div class="col-7">
        <h4 class="primary-color mt-5 mb-3">Antrian {{ $queue_data->date->translatedFormat('l, d F Y') }}</h4>
    </div>
    <div class="col-1"></div>
    <div class="col-4"></div>
</div>

@foreach ($detail_histories as $detail_history)
<div class="row queue mb-2">
    <div class="marker on-going"></div>

    <div class="col-md-4 mt-3">
        <p class="text content">{{ $detail_history->date->translatedFormat('d F Y') }}</p>
        <p class="text title">{{ $detail_history->name }}</p>
    </div>

    <div class="col-md-2 mt-3">
        <p class="text content">Nomor Antrean</p>
        <p class="text title">{{ $detail_history->queue_no }}</p>
    </div>

    @if($detail_history->status == -1 || $detail_history->status == 2)
    <div class="col-md-2 mt-4 ml-3 text-center">
        <a href="javascript:void(0)" class="btn text-nowrap" id="present_indicator">SELESAI</a>
    </div>
    @elseif($detail_history->status == 0 || $detail_history->status == 1)
    <div class="col-md-2 mt-4 ml-3 text-center">
        <a href="javascript:void(0)" class="btn text-nowrap" id="waiting_indicator" style="width: 127px;">BELUM SELESAI</a>
    </div>
    @endif

    @if($detail_history->status == -1)
    <div class="col-md-2 mt-4 ml-3 text-center">
        <a href="javascript:void(0)" class="btn text-nowrap" id="unpresent_indicator">TIDAK HADIR</a>
    </div>
    @elseif($detail_history->status == 0)
    <div class="col-md-2 mt-4 ml-3 text-center">
        <a href="javascript:void(0)" class="btn text-nowrap" id="waiting_indicator">MENUNGGU</a>
    </div>
    @elseif($detail_history->status == 1)
    <div class="col-md-2 mt-4 ml-3 text-center">
        <a href="javascript:void(0)" class="btn text-nowrap" id="on_going_indicator">PROSES</a>
    </div>
    @elseif($detail_history->status == 2)
    <div class="col-md-2 mt-4 ml-3 text-center">
        <a href="javascript:void(0)" class="btn text-nowrap" id="present_indicator">HADIR</a>
    </div>
    @endif
</div>
@endforeach

@endsection

@section('pagespecificscripts')

<script src="{{ asset ("/js/admin_instance/queue_management/index.js") }}"></script>

@stop