<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HR & Payroll</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    


    <!-- <link href="{{ asset ("/bower_components/bootstrap-calendar/css/calendar.css") }}" rel="stylesheet"> -->


    <!-- Template CSS -->
    <link href="{{ asset ("/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset ("/css/components.css") }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    
    @yield('specifics-style')
    <style type="text/css">
        body {
            /* background-color: #F0FBF4; */
            /*background-image: url("../../img/background.png");
            background-attachment: fixed;*/
            background-color: white;
        }

        .navbar-bg {
            background-color: #FBFEFD;
        }

        .navbar .nav-link.nav-link-user {
            color: #707070;
        }

        .navbar-bg {
            height: 140px;
        }

        .main-content {
            margin-top: 50px;
            padding-left: 0px;
            padding-right: 0px;
        }

        .navbar {
            height: auto;
        }

        .main-sidebar .sidebar-brand a img {
            margin-top: 40px;
        }

        .main-sidebar .sidebar-brand a p {
            font-size: 10px;
            color: #4D7F62;
            font-weight: bold;
            text-transform: capitalize;
        }

        .main-sidebar {
            width: 200px;
        }

        .nav-item {}

        .nav-item a span {
            font-size: 12px;
        }

        .nav-item a img {
            width: 16px;
            margin: 0px 10px;
        }

        .active ul li.active a {
            background-color: #F8FDFA;
            border-left: 5px solid #4D7F62;
            color: #4D7F62 !important;
        }

        .active .has-dropdown {
            color: #4D7F62 !important;
        }

        .section-body {
            padding-top: 50px;
        }

        .btn-success {
            background-color: #4D7F62;
        }

        .btn-primary {
            background-color: #43A79D;
        }

        tbody tr td a,
        tbody tr td button {
            margin: 0px 5px;
            border: 0px;
            padding: 2px 5px;
            background-color: #D9F5E6;
            border-radius: 5px;
            color: #4D7F62;
            cursor: pointer;
        }

        td {
            white-space: nowrap;
        }

        .table.table-bordered td,
        .table.table-bordered th {
            border-color: black;
        }

        .modal-dialog {
            max-width: 600px;
            margin: 1.75rem auto;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px !important;
            border: 1px solid #4D7F62 !important;
            margin: 5px !important;
            color: #4D7F62 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            padding: 5px;

            border: 1px solid #DDDDDD !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled a {
            color: #DDDDDD !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #4D7F62 !important;
            background: #4D7F62 !important;
            color: white !important;
        }

        .dataTables_filter {
            visibility: hidden !important;
        }

        .input-group button {
            margin: 0px 10px;
        }

        .btn-danger i {
            color: white;
        }
        .service div{
            padding: 20px;
            margin-top: 10px;
        }
        .service-title{
            color:#4D7F62;
            font-size: 25px;
            font-weight: bold;
            text-align: center;
        }
        .service-description{
            object-fit: contain;
            text-align: center;
        }

        .cursor-hover:hover{
            cursor:pointer;
        }

        .field-icon {
            float: right;
            margin-left: -35px;
            margin-top: -34px;
            position: relative;
            margin-right: 25px;
            z-index: 2;
        }

        .container{
            padding-top:50px;
            margin: auto;
        }

        .modal {
            overflow: auto !important;
        }
        .modal-open {
            overflow: auto !important;
            padding-right: 0px !important;
        }

    </style>
    @yield('pagespecificstyle')
</head>

<body>
    <div id="app">
        <div class="container-fluid" style="background-image: url('../../img/background.png'); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
            <div>
                @include('landingpage_navbar')
                <div class="row" style="height: 100vh; ">
                    <div class="col-md-9" style="padding-top: 100px; padding-left: 150px;">
                        <div class="col-md-6">
                            <p class="text-danger" style="font-size: 60px; display:inline; font-weight: 700;">HR</p><p style="font-size: 60px; display:inline; font-weight: 700;"> & Payroll</p>
                            <h5 style="margin-top: 40px; font-weight: 300;">HR & Payroll memberikan kemudahan dalam</h5>
                            <h5 style="font-weight: 300;">mengelola penggajian karyawan, pencatatan</h5>
                            <h5 style="font-weight: 300;">kehadiran, pengajuan cuti, pengurusan klaim</h5>
                            <h5 style="font-weight: 300;">dan BPJS.</h5>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
            <div>
                <p class="service-title">Kami Membantu Dalam:</p>
            </div>
            <div class="row col-md-10 d-flex flex-row justify-content-center service">
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s1.png">
                    </div>
                    <p class="service-title">Mengelola data karyawan</p>
                    <p class="service-description">
                        Kelola data karyawan mulai dari data pribadi, nomer rekening bank, hingga remunerasi (gaji dan tunjangan lainnya)
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s2.png">
                    </div>
                    <p class="service-title">Mencatat absensi karyawan</p>
                    <p class="service-description">
                        Sistem mencatat absesnsi yang terhubung langsung dengan perhitungan penggajian karyawan
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s3.png">
                    </div>
                    <p class="service-title">Pola kerja (Shift)</p>
                    <p class="service-description">
                        Memantau dan mengelola shift dan jadwal kerja karyawan
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s4.png">
                    </div>
                    <p class="service-title">Mengatur penggajian dan THR karyawan</p>
                    <p class="service-description">
                        Membantu menghitung penggajian, lembur, thr secara otomatis dan akurat
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s5.png">
                    </div>
                    <p class="service-title">Memudahkan pengajuan sakit & izin karyawan</p>
                    <p class="service-description">
                        Pengajuan sakit dan izin yang dicatat dan dihitung secara online
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s6.png">
                    </div>
                    <p class="service-title">Mengelola pencatatan & perhitungan cuti</p>
                    <p class="service-description">
                        Pengajuan dan perhitungan cuti karyawan yang dikelola secara online dan otomatis
                    </p>
                </div>
                <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
                    <div class="img-container">
                        <img src="/img/custom/landingpage/s7.png">
                    </div>
                    <p class="service-title">Menghitung BPJS karyawan</p>
                    <p class="service-description">
                        Perhitungan BPJS ketenagakerjaan dan BPJS kesehatan karyawan dengan cepat dan tepat
                    </p>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row d-flex flex-row justify-content-center" style="background-color: #707070; border-top: 10px solid #6FA887; color:white; padding: 40px 0;">
                <div class="col-md-3">
                    <p style="font-size: 25px; font-weight: bold;">Hubungi Kami</p>
                    <p><i class="fa fa-phone"> </i> (021)12341251</p>
                    <p><i class="fa fa-envelope"> </i> payroll@gmail.com</p>
                    <p><i class="fa fa-map-marker"> </i> Jl. malang</p>
                </div>
                <div class="col-md-5">
                    <p>Payroll adalah aplikasi penggajian (HR & Payroll software) di Indonesia. Payroll membantu operasional perusahaan dan mengelola data karyawan serta melakukan perhitungan dan administrasi gaji, izin, sakit, cuti, BPJS dan pengaturan shift.</p>
                    <p>@ 2019 Payroll.com All Rights Reserved</p>
                </div>
            </div>
        </div>


        
        <div class="modal fade" tabindex="-1" role="dialog" id="modal_login">
            <div class="modal-dialog" role="document" style="width:400px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_modal_alasan" >MASUK KE HR & PAYROLL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-login" method="post" action="{{ route('login') }}">
                            @csrf

                            <small id="error-message" style="display: none; color: red; text-align: center;" >  </small>
                            <div class="form-group" style="margin-bottom: 18px;">
                                <label style="border-radius: 6px; margin-left: 10px;background-color: #ffffff;color: #707d89;padding-left: 5px;padding-right: 5px;">Email</label>
                                <input style="margin-top: -16px;height: 52px;" type="text" class="form-control" name="username" id="email" required autocomplete="email" autofocus>
                            </div>
                            <div class="form-group" style="margin-bottom: 18px;">
                                <label class="col-md-4 control-label" style="width: fit-content !important; border-radius: 6px; margin-left: 10px;background-color: #ffffff;color: #707d89;padding-left: 5px;padding-right: 5px;"> Password </label>
                                <div class="col-md-6" style="max-width: 100% !important; padding-left: 0px; padding-right:0px; position: unset;">
                                    <input style="margin-top: -16px;height: 52px;" id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password cursor-hover"></span>
                                </div>
                            </div>
                            <span id="btn-lupa-password" class="cursor-hover" style="color : #6d967e;margin-left: 1px;" ><small>Lupa Password?</small></span>
                            <input type="submit" style="display:none;" />
                        </form>
                    </div>
                    <div class="modal-footer bg-whitesmoke br" style="background-color: #ffffff !important;margin-top: -20px;margin-bottom: 20px;">
                        <span style="left:0; position:absolute;margin-left: 25px;">
                            <input id="ingat_saya" type="checkbox" name="ingat_saya">
                            <span style="color: #364859; font-size:12px;vertical-align: top;">Ingat Saya</span>
                        </span>
                        <button type="submit" class="btn btn-danger" id="btn-hit-masuk"  style="background-color: #c12f2f;">MASUK</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="modal_password">
            <div class="modal-dialog" role="document" style="width:400px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_modal_password" >LUPA PASSWORD</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-password" method="post" action="">
                        @csrf
                            <div class="form-group" style="margin-bottom: 18px;">
                                <label style="border-radius: 6px; margin-left: 10px;background-color: #ffffff;color: #707d89;padding-left: 5px;padding-right: 5px;">Email</label>
                                <input style="margin-top: -16px;height: 52px;" type="text" class="form-control" name="email" id="email" required autocomplete="email" autofocus>
                            </div>
                            <small id="error-message-email" style="display: none; color: red; text-align: center;" >  </small>
                            <input type="submit" style="display:none;" />
                        </form>
                    </div>
                    <div class="modal-footer bg-whitesmoke br" style="background-color: #ffffff !important;margin-top: -20px;margin-bottom: 20px;">
                        <button type="submit" class="btn btn-danger" id="btn-send-email"  style="background-color: #c12f2f;" onclick=sendEmail()>KIRIM</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86867069-5"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        
        <!-- Template JS File -->
        <script src="{{ asset ("/js/override_stisla.js") }}"></script>
        <script src="{{ asset ("/js/scripts.js") }}"></script>
        <script src="{{ asset ("/js/custom.js") }}"></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-86867069-5');

            $(document).ready(function() {
                var remember = $.cookie('pm[remember]');
                if (remember == "true") {
                    $('#email').val($.cookie('pm[email]'));
                    $('#password').val($.cookie('pm[password]'));
                    $('#ingat_saya').attr("checked", true);
                }

                $("#btn-masuk").click(function(e){
                    $("#modal_login").modal("toggle");
                });

                $("#btn-lupa-password").click(function(e){
                    console.log("lupa password");
                    $("#modal_login").modal("hide");
                    $("#modal_password").modal("toggle");
                });

                $("#btn-hit-masuk").click(function(e){
                    $("#form-login").submit();
                });

                // $("#btn-lupa-password").click(function(e){
                //     var url = $("#form-login").attr('action');
                //     window.location.replace( url.replace("login", "password/reset") );
                // });
                
                $("#form-login").on("submit", function(e){
                    // e.preventDefault();
                    
                    $("#error-message").css("display", "none");
                    $("#error-message").text( "" );
                    $("#email").removeClass("is-invalid");
                    $("#password").removeClass("is-invalid");

                    var form = $(this);
                    var url = form.attr('action');

                    if( $("#email").val() == "" ){
                        $("#email").addClass("is-invalid");
                        $("#error-message").css("display", "block");
                        $("#error-message").text( "Harap mengisi kolom Email" );
                    }else if( $("#password").val() == "" ){
                        $("#password").addClass("is-invalid");
                        $("#error-message").css("display", "block");
                        $("#error-message").text( "Harap mengisi kolom Password" );
                    }else{
                        var expires_day = 365;
                        if ($('#ingat_saya').is(':checked')) {
                            $.cookie('pm[email]', $('#email').val(), { expires: expires_day });
                            $.cookie('pm[password]', $('#password').val(), { expires: expires_day });
                            $.cookie('pm[remember]', true, { expires: expires_day });
                        }
                        else {
                            // reset cookies.
                            $.cookie('pm[email]', null);
                            $.cookie('pm[password]', null);
                            $.cookie('pm[remember]', false);
                        }
                        
                        // $.ajax({
                        //     type: "POST",
                        //     url: url,
                        //     data: form.serialize(),  
                        // }).always(function (data) {
                        //     console.log(data);
                        //     if( typeof data.responseJSON === 'undefined' ){
                        //         $('')
                        //     }else{
                        //         $("#error-message").css("display", "block");
                        //         $("#error-message").text( data.responseJSON.errors.email[0]  );
                        //     }
                        // });
                    }


                });
    
                $(".toggle-password").click(function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $($(this).attr("toggle"));
                    if (input.attr("type") == "password") {
                    input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });

                @if(!empty(Session::get('errors')))

                var errors = "{{ (Session::get('errors')) }}";
                errors = JSON.parse(errors.replace(/&quot;/gi, '\"')); 
                $('#btn-masuk').click();

                $("#error-message").css("display", "block");
                if(errors.email != null){
                    $("#error-message").text(errors.email[0])
                } else if (errors){
                    $("#error-message").text(errors[0])
                }
                // $("#error-message").text(errors->notActivated)
                @endif
            });

            function sendEmail(){
                let form_data = $('#form-password').serializeArray();
                console.log(form_data);
                jQuery.ajax({
                    type: 'post',
                    "url": "/checkEmail",
                    data: form_data,
                    success: function(result) {
                        var data = JSON.parse(result);
                        if(data['error'] == true){
                            $("#error-message-email").css("display", "");
                            $("#error-message-email").text("Alamat email tidak tersedia");
                        }else{
                            $.alert({
                                title: 'Sukses',
                                content: 'Email terkirim!',
                                type: 'green',
                                buttons: {
                                    ok: {
                                        text: 'OK',
                                        action: function(){
                                            window.location.href = '/';
                                        }
                                    }
                                }
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        //form.stopProgress();
                        console.log(xhr);
                        alert('error');
                    }
                });
            }
        </script>
        <!-- Page Specific JS File -->
    </body>

    </html>