<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/antriqhuy/icon.png') }}"/>
    <title>AntriQhuy - Aktivasi Akun</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Template CSS -->
    <link href="{{ asset ("/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset ("/css/components.css") }}" rel="stylesheet">
    <style type="text/css">
        .input-group>label{
            position:absolute;
            top:-10px;
            left:20px;
            background-color:white;
            padding-left: 5px;
            padding-right: 5px;
        }

        .card-shadow{
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.2);
        }

        .home-body{
            background-color: white;
        }

        .login-label{
            margin-bottom: 10px;
        }

        .login-btn{
            background-color: #05837F;
            padding: 5px 45px;
            border-radius: 20px;
            width: 70%;
        }

        .login-btn:hover{
            background-color: #05837F !important;
        }

        .login-btn:active{
            background-color: #05837F !important;
        }

        .icon {
            width: 110px;
            height: 81px;
        }

        .icon-wrapper {
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="home-body">

    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 50px;">
        <div class="toast mt-3 mr-3" id="message-body" style="position: fixed; top: 0; right: 0;" data-delay="8000">
            <div class="toast-body">
                <span id="message"></span>
            </div>
        </div>
    </div>

    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-5" style="margin-top: 10%;">
                <div class="card card-shadow" style="border-radius: 25px; padding: 30px;">

                    <div class="card-body">
                        <form method="POST" id="form-verify-password">
                            @csrf
                            <div class="row icon-wrapper">
                                <div class="col-md-12">
                                    <img class="icon" src="{{ asset('img/antriqhuy/icon.png') }}"/>
                                </div>
                            </div>

                            <div class="row login-label">
                                <div class="col-md-12">
                                    <label><b>Aktivasi</b></label>
                                </div>
                                <div class="col-md-12">
                                    <label>Silahkan aktivasi akun anda</label>
                                </div>
                            </div>

                            <div class="form-group row" >
                                <div class="input-group col-md-12">
                                    <input disabled id="fullname" type="text" placeholder="Nama" class="form-control" name="username" value="" required autocomplete="username" autofocus>
                                    <div class="input-group-btn" style="border-bottom: 1px solid #DCDCDC">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="input-group col-md-12">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="input-group col-md-12">
                                    <input id="confirm-password" type="password" placeholder="Konfirmasi Password" class="form-control" name="confirm-password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12" >
                                    <button type="button" onClick="verify()" class="btn btn-primary login-btn">
                                        Aktivasi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset ("/js/admin/user_management/verify_password.js") }}"></script>
</html>


