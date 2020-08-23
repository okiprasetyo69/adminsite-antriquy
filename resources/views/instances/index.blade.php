<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instansi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- CSS Datatable-->
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>

<body>

    <div class="container">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInstansi">
                Tambah Instansi
            </button>
        </div>
        <br>
        <div class="col-md-12">
            <table id="tableInstansi" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th style="width:1%;">No</th>
                        <th style="width:10%;">Nama Instansi</th>
                        <th style="width:15%;">Alamat</th>
                        <th style="width:5%;">Format Antrian Depan</th>
                        <th style="width:5%;">Format Antrian Belakang</th>
                        <th style="width:5%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!--
                    <?php $i = 1 ?>
                    @foreach ($instansi as $inst)
                        <tr>
                            <td> {{$loop->iteration}} </td>
                            <td> {{ $inst->name}} </td>
                            <td> {{ $inst->address}} </td>
                            <td> {{ $inst->queue_front_format}} </td>
                            <td> {{ $inst->queue_back_format}} </td>
                            <td>
                                <a href="{{url('/edit')}}" class="btn btn-primary btn-sm"> Edit </a>
                                <a href="{{url('/edit')}}" class="btn btn-danger btn-sm"> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                    -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalInstansi" tabindex="-1" role="dialog" aria-labelledby="modalInstansi" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalInstansiTitle">Tambah Instansi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" id="formAddInstansi">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" style="padding: 0">

                                <label class="control-label label-modal lb-field">Nama Instansi : </label>
                                <input type="text" class="form-control" placeholder="Ex: RSHS - Jantung" id="name" name="name" />

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" style="padding: 0">

                                <label class="control-label label-modal lb-field">Alamat Lengkap : </label>
                                <input type="text" class="form-control" placeholder="Ex: Jl. Soekarno-Hatta No.1A Bandung" id="address" name="address" />

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" id="map" style="padding: 0px; height:300px; width:100%">

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" style="padding: 0">

                                <input type="text" class="form-control" placeholder="Longitude" id="lng" name="lng" readonly />

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" style="padding: 0">

                                <input type="text" class="form-control" placeholder="Latitude" id="lat" name="lat" readonly />

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" style="padding: 0">

                                <label class="control-label label-modal lb-field">Format Antrian Depan : </label>
                                <input type="text" class="form-control" placeholder="EX: RSHS-Jantung-" id="queue_front_format" name="queue_front_format" />

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                        <!-- field _______________________ -->
                        <div class="form-group">
                            <div class="col-md-12 center-horizontal" style="padding: 0">

                                <label class="control-label label-modal lb-field">Format Belakang : </label>
                                <input type="text" class="form-control" placeholder="EX: A1" id="queue_back_format" name="queue_back_format" />

                            </div>
                        </div>
                        <!-- end field _______________________ -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" id="btn-save-instansi">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Google API MAPS-->
    <!--
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyZfAJSxbeiIfHoZY3o347zxWFS35xuAI&libraries=places&callback=initMap" async defer></script>
    -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <!-- Jquery Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Jquery Datatable -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        var tableInstansi
        $(document).ready(function() {

            $("#tableInstansi").DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: false,
                searching: false,
                orderable: [
                    [0, "desc"],
                    [1, "asc"]
                ],
                language: {
                    emptyTable: "Data tidak tersedia",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    infoFiltered: "",
                    infoEmpty: "",
                    paginate: {
                        previous: "‹",
                        next: "›"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ Instansi",
                    aria: {
                        paginate: {
                            previous: "Previous",
                            next: "Next"
                        }
                    }
                },
                ajax: {
                    url: "http://admin.antriqhuy.bigio.id/api/instance/find/",
                    contentType: "application/json",
                    type: "POST",
                    data: function(d) {
                        console.log(d);
                        var dataparam = {
                            draw: d.draw,
                            page: d.start / d.length + 1,
                            length: d.length,
                            search_text: $("#search").val(),
                            for_web: "true"
                        };
                        return JSON.stringify(dataparam);
                    },
                    dataSrc: function(response) {
                        console.log(response);
                        return response.data;
                    }
                },
                columns: [{
                        data: null,
                        "width": '5%'
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "address",
                    },
                    {
                        data: "queue_front_format",
                    },
                    {
                        data: "queue_back_format",
                    },
                    {
                        data: null,
                    },
                ],
                columnDefs: [{
                        targets: 0,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                            $(td).html(tableInstansi.page.info().start + row + 1);
                        }
                    },
                    {
                        targets: 1,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 2,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 3,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 4,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 5,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    }
                ]

            });
            //datatable();
            //ADD
            $('#btn-save-instansi').click(function(e) {
                //e.preventDefault();
                console.log('test');
                var formData = $("#formAddInstansi").serialize();
                jQuery.ajax({
                    type: "post",
                    url: "api/instansi",
                    data: formData,
                    beforeSend: function() {
                        $("#btn-save-instansi").attr("disabled", true);
                    },
                    success: function() {
                        document.getElementById("formAddInstansi").reset();
                        $("#modalInstansi").modal("toggle");
                        alert("Data instansi berhasil dimasukkan");
                        location.reload();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseJSON);
                        var errorMsg = "Gagal menambahkan data instansi";
                        if (xhr.responseJSON) {
                            errorMsg = xhr.responseJSON.message;
                        }
                        $("#btn-save-instansi").attr("disabled", false);
                    }
                });
            });


        });

        function datatable() {
            tableInstansi = $("#tableInstansi").DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: false,
                searching: false,
                orderable: [
                    [0, "desc"],
                    [1, "asc"]
                ],
                language: {
                    emptyTable: "Data tidak tersedia",
                    zeroRecords: "Tidak ada data yang ditemukan",
                    infoFiltered: "",
                    infoEmpty: "",
                    paginate: {
                        previous: "‹",
                        next: "›"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ Instansi",
                    aria: {
                        paginate: {
                            previous: "Previous",
                            next: "Next"
                        }
                    }
                },
                columns: [{
                        data: null,
                        "width": '5%'
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "address",
                    },
                    {
                        data: "queue_front_format",
                    },
                    {
                        data: "queue_back_format",
                    },
                    {
                        data: null,
                    },
                ],
                /*
                ajax: {
                    url: "/api/instance/find",
                    contentType: "application/json",
                    type: "POST",
                    data: function (d) {
                        console.log(d);
                        var dataparam = {
                            draw: d.draw,
                            page: d.start / d.length + 1,
                            length: d.length,
                            search_text: $("#search").val(),
                        };
                        return JSON.stringify(dataparam);
                    },
                    dataSrc: function (response) {
                        console.log(response);
                        return response.data;
                    }
                },
                */
                columns: [{
                        data: null,
                        "width": '5%'
                    },
                    {
                        data: "name",
                    },
                    {
                        data: "address",
                    },
                    {
                        data: "queue_front_format",
                    },
                    {
                        data: "queue_back_format",
                    },
                    {
                        data: null,
                    },
                ],
                columnDefs: [{
                        targets: 0,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                            $(td).html(tableInstansi.page.info().start + row + 1);
                        }
                    },
                    {
                        targets: 1,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 2,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 3,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 4,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    },
                    {
                        targets: 5,
                        searchable: false,
                        orderable: false,
                        createdCell: function(td, cellData, rowData, row, col) {
                            $(td).addClass("text-center");
                        }
                    }
                ]
            });
        }
        // variabel global marker
        var marker;

        function taruhMarker(peta, posisiTitik) {
            if (marker) {
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: peta
                });
            }
            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
        }

        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-6.914744, 107.609810),
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
            // even listner ketika peta diklik
            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });

        }
        // event jendela di-load
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>

</html>