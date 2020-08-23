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
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: white;
            background-size: 100% 100%
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
            <div class="row d-flex flex-column justify-content-center align-items-center align-content-center">
                <div class="col-md-12 text-center " style="padding-top: 10px;">
                    <p style="font-size: 20px; font-weight: 700;">PENDAFTARAN HR&PAYROLL</p>
                    <p style="font-size: 14px; font-weight: 100;">Gunakan HR & Payroll untuk mengelola perusahaan anda !</p>
                    <br>
                </div>

                <div class="col-md-6 text-left" style="padding: 40px 100px; ">
                    <form id="form-registrasi" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input required type="text" class="form-control" name="nama" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input required type="email" class="form-control" name="email" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
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
                                <input required type="password" class="form-control" id="konfirmasi" name="konfirmasi">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" id="mask_konfirmasi" type="button" style="cursor: pointer;">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input required type="text" class="form-control" name="nama_perusahaan" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Bidang Usaha</label>
                            <select required class="form-control" name="bidang_usaha">
                                <option>Asuransi</option>
                                <option>Barang Hasil Kerajinan</option>
                                <option>Barang - barang konsumen</option>
                                <option>Bunga dan tanaman hias</option>
                                <option>Distribusi dan pemasaran</option>
                                <option>Elektronika</option>
                                <option>Event Organizer</option>
                                <option>Farmasi</option>
                                <option>Furniture</option>
                                <option>Hewan Peliharaan</option>
                                <option>Kayu dan pengolahannya</option>
                                <option>Keramik Porselan dan kaca</option>
                                <option>Restoran dan Katering</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Jumlah Karyawan</label>
                            <select required class="form-control" name="jumlah_karyawan">
                                <option value="1-10">1-10</option>
                                <option value="11-30">11-30</option>
                                <option value="31-50">31-50</option>
                                <option value="51-100">51-100</option>
                                <option value=">100">>100</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat Perusahaan</label>
                            <input required type="text" class="form-control" name="alamat_perusahaan" placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="number" class="form-control" name="telepon_perusahaan" placeholder="">
                        </div>

                        <div class="text-center">
                            <p id="loading-register" style="display: none;">Loading...</p>
                            <button id="btn-submit" class="btn btn-danger" style="width: 150px;" type="button">DAFTAR</button>
                        </div>



                    </form>

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
            $('form').on('focus', 'input[type=number]', function (e) {
			$(this).on('wheel.disableScroll', function (e) {
				e.preventDefault()
			})
            })
            $('form').on('blur', 'input[type=number]', function (e) {
                $(this).off('wheel.disableScroll')
            })
                // console.log(APP_URL + "/login");
        });
        $('#btn-submit').on('click', function() {
            $('#btn-submit').attr('disabled', true);

            if ($('#password').val() == $('#konfirmasi').val()) {
                let form_data = $('#form-registrasi').serializeArray();
                jQuery.ajax({
                    type: 'post',
                    "url": "/signUp",
                    data: form_data,
                    success: function(data) {
                        $('#btn-submit').attr('disabled', false);

                        let result = JSON.parse(data);
                        if (result['success'] == false) {
                            $.alert({
                                title: 'Error',
                                content: 'Terjadi kesalahan pada server!',
                                type: 'red'
                            });

                            console.log(data);
                        } else {
                            $.alert({
                                title: 'Sukses',
                                content: 'Berhasil Mendaftar, Silahkan cek email anda',
                                type: 'green'
                            });
                            window.location.href = APP_URL + "/login";
                            // window.location.href = APP_URL + "/logout";
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        $('#btn-submit').attr('disabled', false);

                        var response = JSON.parse(xhr.responseText);

                        $.alert({
                            title: 'Error',
                            content: response.message,
                            type: 'red'
                        });
                        // alert('error');
                    }
                });
            } else {
                $('#btn-submit').attr('disabled', false);

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