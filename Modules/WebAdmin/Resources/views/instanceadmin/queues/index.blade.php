@extends('layouts.app')

@section('specifics-style')

<link href="{{ asset ("/css/queue.css") }}" rel="stylesheet">

@endsection

@section('content')
<div class="section-body">
    <div>
        <p class="welcome-heading">Halo, {{ @Auth::user()->fullname }}</p>
    </div>
    <div>
        <p class="welcome-date">Lihat antrean hari ini, {{Carbon\Carbon::now()->translatedFormat('d F Y')}}
    </div>
</div>

<div class="section-body">
    <div class="info-card row">
        <div class="col-md-4 section-card">
            <div class="row">
                <div id="count-total-queues" class="col-md-4 section-card-heading text-center">
                    0
                </div>
                <div class="col-md-7 section-card-content" style="">
                    <p class="card-title">Total Antrean</p>
                    <p class="card-content">Hari Ini</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 section-card">
            <div class="row">
                <div id="count-processed-queues" class="col-md-4 section-card-heading text-center">
                    0
                </div>
                <div class="col-md-7 section-card-content" style="">
                    <p class="card-title">Proses Antre</p>
                    <p class="card-content">Sedang berjalan</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 section-card" style="border-right: 0px solid black;">
            <div class="row">
                <div id="count-finished-queues" class="col-md-4 section-card-heading text-center">
                    0
                </div>
                <div class="col-md-7 section-card-content" style="">
                    <p class="card-title">Antrean Selesai</p>
                    <p class="card-content">Saat ini</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-5">
            <div class="card info">
                <div class="card-body">
                    <div class="banner-info">
                        <p class="text title">Tambahkan pasien ke dalam antrean</p>
                        <p class="text content">Tambahkan antrean pasien yang tidak menggunakan aplikasi</p>
                    </div>
                    <div class="banner-footer">
                        <button class="btn main-action-button float-left" onClick="showOfflineForm()">Antrean Offline</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card info green" tabindex="1">
                <div class="card-body">
                    <div class="col-md-5 float-left banner-info">
                        <p class="text title">Terapkan Protokol Kesehatan</p>
                        <p class="text content">Harap beri himbauan kepada seluruh pengantre untuk tetap menjaga jarak 1-2m dan wajib menggunakan masker.</p>
                    </div>
                    <div class="col-md-7 banner-img-wrapper float-right">
                        <img src="{{ asset('img/antriqhuy/getting-started.png') }}" class="banner-img float-right" tabindex="2" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-body">
    <div>
        <p class="welcome-heading">Daftar Antrean</p>
    </div>

    <div id="queues-wrapper">
    </div>
</div>

<div tabindex="99" aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
    <div class="toast mt-3 mr-3" id="message-body" style="position: fixed; top: 0; right: 0;" data-delay="8000">
        <div class="toast-body">
            <span id="message"></span>
        </div>
    </div>
</div>

@endsection
@section('pagespecificscripts')

<script src="{{ asset ("/js/admin_instance/queue_management/queue.js") }}"></script>

<!-- Modal -->
<div class="modal fade" id="modal-form-offline" tabindex="-1" role="dialog" aria-labelledby="modal-form-offline" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-form-offline">Tambah Antrean Offline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="form-add-offline">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <!-- field _______________________ -->
                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Nama Pengantre </label>
                            <input type="text" class="form-control" placeholder="Nama" required name="name" required />

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save-offline">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirm-process" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-process" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Proses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p id="confirm-process-content"></p>
                <!-- HIDDEN INPUTS -->
                <input type="hidden" id="delete-user-id" value="" />
                <!-- END OF HIDDEN INPUTS -->
            </div>

            <input id="hidden-instanceHistoryId" type="hidden" value=""/>
            <input id="hidden-action" type="hidden" value=""/>
            <input id="hidden-row" type="hidden" value=""/>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onClick="confirmProcess()">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>

@stop