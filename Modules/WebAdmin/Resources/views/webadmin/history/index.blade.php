@extends('layouts.app')

@section('content')

<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
    <div class="toast mt-3 mr-3" id="message-body" style="position: fixed; top: 0; right: 0;" data-delay="8000">
        <div class="toast-body">
            <span id="message"></span>
        </div>
    </div>
</div>

<div class="row actions">
    <div class="col-4">
        <h4 class="primary-color mb-3">Rangkuman</h4>
    </div>
    <div class="col-4"></div>
    <div class="col-4 pr-3">
        <div class="dropdown float-right pr-3">
            <button class="btn btn-secondary dropdown-toggle text-left shadow" type="button" id="filter_by" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hari ini<i class="fas fa-sort-down primary-color float-right pt-1"></i>
            </button>
            <div class="dropdown-menu mt-2" aria-labelledby="filter_by" id="dropdown_filter">
                <a class="dropdown-item" href="javascript:void(0)" id="btn_filter_by_today">Hari ini</a>
                <a class="dropdown-item" href="javascript:void(0)" id="btn_filter_by_week">Minggu ini</a>
                <a class="dropdown-item" href="javascript:void(0)" id="btn_filter_by_month">Bulan ini</a>
            </div>
        </div>
    </div>
</div>

<div class="card-columns mb-5">
    <div class="col-lg-12">
        <div class="card card-rounded">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-3">
                        <img src="{{ asset('img/antriqhuy/users-green.svg') }}" alt="" class="rounded-circle" id="assets">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-secondary text-nowrap">Total Antrian</h5>
                            <h3 class="text-dark"><span id="queue_total"></span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-rounded">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-3">
                        <img src="{{ asset('img/antriqhuy/users-blue.svg') }}" alt="" class="rounded-circle" id="assets">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-secondary text-nowrap">Hadir</h5>
                            <h3 class="text-dark"><span id="present_queue_total"></span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-rounded">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-3">
                        <img src="{{ asset('img/antriqhuy/users-yellow.svg') }}" alt="" class="rounded-circle" id="assets">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-secondary text-nowrap">Tidak Hadir</h5>
                            <h3 class="text-dark"><span id="unpresent_queue_total"></span></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<h4 class="primary-color">Riwayat Antrian</h4>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="row actions">
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4 pr-3">
                    <div class="dropdown float-right pr-3">
                        <button class="btn btn-secondary dropdown-toggle text-left shadow" type="button" id="filter_table_by" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hari ini<i class="fas fa-sort-down primary-color float-right pt-1"></i>
                        </button>
                        <div class="dropdown-menu mt-2" aria-labelledby="filter_by" id="dropdown_filter">
                            <a class="dropdown-item" href="javascript:void(0)" id="btn_filter_table_by_today">Hari ini</a>
                            <a class="dropdown-item" href="javascript:void(0)" id="btn_filter_table_by_week">Minggu ini</a>
                            <a class="dropdown-item" href="javascript:void(0)" id="btn_filter_table_by_month">Bulan ini</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <table id="main-table" class="table" style="width: 100%;">
                    <thead>
                        <tr class="table-header">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Total Antrian</th>
                            <th>Antrian Hadir</th>
                            <th>Antrian Tidak Hadir</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pagespecificscripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/id.js"></script>
<script src="{{ asset ("/js/admin_instance/queue_management/index.js") }}"></script>

@stop