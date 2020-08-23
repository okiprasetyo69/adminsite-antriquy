<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('img/antriqhuy/icon.png') }}" />
  <title>AntriQhuy{{ isset($title)? (empty($title)? '' : ' - ' . $title) : '' }}</title>

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
  <link href="{{ asset ("/css/notification.css") }}" rel="stylesheet">
  <link href="{{ asset ("/css/antriqhuy.css") }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
  @yield('specifics-style')

  @yield('pagespecificstyle')
</head>

<body>
  <div id="app">

    <div class="main-wrapper">
      @include('inc.navbar')
      @include('inc.sidebar')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section ml-5">
          @yield('content')
        </section>
      </div>
    </div>
  </div>
  @include('inc.footer')

  <!-- Page Specific JS File -->
</body>

</html>