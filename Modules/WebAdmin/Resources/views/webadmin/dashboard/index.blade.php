@extends('layouts.app')

@section('specifics-style')
<style type="text/css">
    .welcome-heading {
        color: #4E80B2;
        font-weight: bold;
        font-size: 24px;
    }

    .welcome-date {
        color: #4D4D4D;
        font-weight: bold;
        font-size: 14px;
    }

    .info-card {
        border-radius: 15px;
        background-color: #F8F9FB;
        border: 0.1em solid #707070;
        height: 126px;
        opacity: 33%;
        margin: 0px !important;
    }

    .info-card>.section-card {
        border-right: 0.1em solid #707070;
        height: 126px;
    }

    .info-card>.section-card>.section-card-content {
        opacity: 100% !important;
    }
</style>
@endsection

@section('content')
<div class="section-body">
    <div>
        <p class="welcome-heading">Halo, {{ @Auth::user()->fullname }}</p>
    </div>
    <div>
        <p class="welcome-date">Lihat antrean hari ini, {{Carbon\Carbon::now()->toDateString()}}</p>
    </div>
</div>

<div class="section-body">
    <div class="info-card row">
        <div class="col-md-4 section-card">
            <div class="section-card-content">
                6
            </div>
        </div>
        <div class="col-md-4 section-card">
            <div class="section-card-content">
                5
            </div>
        </div>
        <div class="col-md-4 section-card" style="border-right: 0px solid black;">
            <div class="section-card-content">
                1
            </div>
        </div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
        </div>
    </div>
</div>

@endsection
@section('pagespecificscripts')

@stop