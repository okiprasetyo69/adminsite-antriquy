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

<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
    <div class="toast mt-3 mr-3" id="message-body" style="position: fixed; top: 0; right: 0;" data-delay="8000">
        <div class="toast-body">
            <span id="message"></span>
        </div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="row actions">
                <!-- Actions -->
                <div class="col-md-9">
                    <button class="main-action-button float-left text-center form-control" onClick="showSaveForm()">Tambah User</button>
                </div>

                <div class="col-md-3">
                    <input class="form-control search-box float-right" placeholder="&#xF002;  Cari pengguna..." type="text" id="search-box">
                </div>
            </div>

            <div class="row">
                <table id="main-table" class="table" style="width: 100%;">
                    <thead>
                        <tr class="table-header">
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Alamat User</th>
                            <th>Instansi</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- Modal -->
<div class="modal fade" id="modal-form-user" tabindex="-1" role="dialog" aria-labelledby="modal-form-user" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-form-user">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="form-add-user">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <!-- field _______________________ -->
                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Nama : </label>
                            <input type="text" class="form-control" placeholder="Nama" required name="fullname" required />

                        </div>
                    </div>
                    <!-- end field _______________________ -->
                    @if(Auth::user()->role_code == ADMIN_INSTANSI)
                    <input type="hidden" name="role_code" value="{{@STAFF_INSTANSI}}" />
                    <input type="hidden" name="instance_id" value="{{Auth::user()->instance_id}}" />
                    @endif
                    @if(Auth::user()->role_code != ADMIN_INSTANSI)
                    <!-- field _______________________ -->
                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Role : </label>
                            <select type="text" class="select2" style="width: 100%" name="role_code" required>
                                <option value="admin">Administrator</option>
                                <option value="admin_instansi">Admin Instansi</option>
                            </select>

                        </div>
                    </div>
                    <!-- end field _______________________ -->
                    <!-- field _______________________ -->

                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Instansi : </label>
                            <select type="text" id="instance-collections" class="select2" style="width: 100%" name="instance_id" required>
                            </select>

                        </div>
                    </div>
                    <!-- end field _______________________ -->
                    @endif
                    <!-- field _______________________ -->
                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Username : </label>
                            <input type="text" class="form-control" placeholder="Username" name="username" required />

                        </div>
                    </div>
                    <!-- end field _______________________ -->
                    <!-- field _______________________ -->
                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Email : </label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required />

                        </div>
                    </div>
                    <!-- end field _______________________ -->
                    <!-- field _______________________ -->
                    <div class="form-group">
                        <div class="col-md-12 center-horizontal" style="padding: 0">

                            <label class="control-label label-modal lb-field">Alamat : </label>
                            <input type="text" class="form-control" placeholder="Alamat" name="address" required />

                        </div>
                    </div>
                    <!-- end field _______________________ -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancel">Batal</button>
                    <button type="button" class="btn btn-primary" id="btn-save-user">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal-confirm-delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data user?</p>
                <!-- HIDDEN INPUTS -->
                <input type="hidden" id="delete-user-id" value="" />
                <!-- END OF HIDDEN INPUTS -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onClick="confirmDelete()">Hapus</button>
            </div>
        </div>
    </div>
</div>

@section('pagespecificscripts')

<script src="{{ asset ("/js/admin/user_management/index.js") }}"></script>

@stop
