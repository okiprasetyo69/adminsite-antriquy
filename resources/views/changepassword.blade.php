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
    @yield('specifics-style')
    <style type="text/css">
        body {
            /* background-color: #F0FBF4; */
            background-image: url("../../img/background1.png");
            background-attachment: fixed;
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
    </style>
    @yield('pagespecificstyle')
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            @include('landingpage_navbar')
            <div class="row">
                <div class="col-md-12 text-center" style="padding-top: 10px;">
                    <p style="font-size: 20px; font-weight: 700;">RESET PASSWORD</p>
                    <p style="font-size: 14px; font-weight: 100;">Anda akan menggunakan alamat email dan password ini untuk masuk.</p>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-left" style="padding: 0px 100px;">
                            <form id="form-reset" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="<?php echo $nama ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Baru</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" id="mask_password" type="button" style="cursor: pointer;">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="Konfirmasi Password">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" id="mask_konfirmasi" type="button" style="cursor: pointer;">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="hidden" id="id_personalia" value="<?php echo $id ?>" name="id">
                                    <input type="hidden" id="id_perusahaan" value="<?php echo $id_perusahaan ?>" name="id_perusahaan">
                                    <button id="btn-submit" class="btn btn-danger" style="width: 150px;" type="button">Reset Password</button>
                                </div>



                            </form>

                        </div>
                        <div class="col-md-3"></div>

                    </div>



                    <br>
                </div>

            </div>

        </div>


    </div>


    <!-- Page Specific JS File -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            // console.log(APP_URL + "/login");
        });
        $('#btn-submit').on('click', function() {
            let form_data = $('#form-reset').serializeArray();
            if ($('#password').val() == $('#konfirmasi').val()) {
                jQuery.ajax({
                    type: 'post',
                    "url": "/submitRegister",
                    data: form_data,
                    success: function(result) {
                        if (result['errors'] == true) {
                            $.alert({
                                title: 'Error',
                                content: 'Password Gagal Disimpan</br>' + result['message'],
                                type: 'red'
                            });
                        } else {
                            $.alert({
                                title: 'Sukses',
                                content: 'Password Berhasil Disimpan',
                                type: 'green'
                            });
                            // window.location.href = APP_URL + "/login";
                            window.location.href = APP_URL + "/logout";
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $.alert({
                            title: 'Error',
                            content: 'Password Gagal Disimpan</br>' + thrownError,
                            type: 'red'
                        });
                        // alert('error');
                    }
                });
            } else {
                $.alert({
                    title: 'Error',
                    content: 'Password Tidak Cocok',
                    type: 'red'
                });
            }

        });
        $('#mask_password').on('click', function() {
            var valPassword = $('#password').val();
            if ($('#password').prop('type') == 'password') {
                $('#password').prop('type', 'text');
                $('#password').val(valPassword);
                $(this).find('i').removeClass('fa-eye');
                $(this).find('i').addClass('fa-eye-slash');
            } else {
                $('#password').prop('type', 'password');
                $('#password').val(valPassword);
                $(this).find('i').removeClass('fa-eye-slash');
                $(this).find('i').addClass('fa-eye');
            }
        })
        $('#mask_konfirmasi').on('click', function() {
            var valPassword = $('#konfirmasi').val();
            if ($('#konfirmasi').prop('type') == 'password') {
                $('#konfirmasi').prop('type', 'text');
                $('#konfirmasi').val(valPassword);
                $(this).find('i').removeClass('fa-eye');
                $(this).find('i').addClass('fa-eye-slash');
            } else {
                $('#konfirmasi').prop('type', 'password');
                $('#konfirmasi').val(valPassword);
                $(this).find('i').removeClass('fa-eye-slash');
                $(this).find('i').addClass('fa-eye');
            }
        })
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-86867069-5"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-86867069-5');
	</script>
</body>

</html>