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

        .pac-container {
            background-color: #FFF;
            z-index: 2000;
            position: fixed;
            display: inline-block;
            float: left;
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
                <div class="col-md-9">
                    <button type="button" class="main-action-button float-left text-center form-control" onclick="addInstances()">
                        Tambah Instansi
                    </button>
                </div>
                <div class="col-md-3">
                    <input class="form-control search-box float-right" placeholder="&#xF002;  Cari nama instansi..." type="text" id="search" name="search_nama">
                </div>
            </div>
            <div class="table-responsive">
                <table id="tableInstansi" class="table">
                    <thead>
                        <tr class="table-header text-center">
                            <th style="width:1%">No</th>
                            <th style="width:30%">Nama Instansi</th>
                            <th style="width:25%">Alamat</th>
                            <th style="width:10%">Format Antrian Depan</th>
                            <th style="width:10%">Format Antrian Belakang</th>
                            <th style="width:5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@endsection
    <!-- Modal -->
    <div class="modal fade" id="modalInstansi">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalInstansiTitle">Tambah Instansi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form class="form-horizontal" id="formAddInstansi" nctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" style="padding: 0">
                        <label class="control-label label-modal lb-field">Nama Instansi : </label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Ex: RSHS-Jantung"
                            id="name"
                            name="name"/>
                    </div>
                </div>
                <!-- end field _______________________ -->
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" style="padding: 0">
                        <label class="control-label label-modal lb-field">Alamat Lengkap : </label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Ex: Jl. Soekarno-Hatta No.1A Bandung"
                            id="address"
                            name="address"
                            />
                    </div>
                </div>
                <div class="form-group" hidden>
                    <input maxlength="100" type="text" class="form-control form-modal" id="location" />
                </div>
                <!-- end field _______________________ -->
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" id="map" style="padding: 0px; height:300px; width:100%" >

                    </div>
                </div>
                <!-- end field _______________________ -->
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" style="padding: 0">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Longitude"
                            id="lng"
                            name="lng"
                            readonly/>
                    </div>
                </div>
                <!-- end field _______________________ -->
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" style="padding: 0">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Latitude"
                            id="lat"
                            name="lat"
                            readonly/>
                    </div>
                </div>
                <!-- end field _______________________ -->
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" style="padding: 0">
                        <label class="control-label label-modal lb-field">Format Antrian Depan : </label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="EX: RSHS Jantung"
                            id="queue_front_format"
                            name="queue_front_format"
                            />
                    </div>
                </div>
                <!-- end field _______________________ -->
                <!-- field _______________________ -->
                <div class="form-group">
                    <div class="col-md-12 center-horizontal" style="padding: 0">
                        <label class="control-label label-modal lb-field">Format Belakang : </label>
                            <input
                            type="text"
                            class="form-control"
                            placeholder="EX: A"
                            id="queue_back_format"
                            name="queue_back_format"
                            />
                    </div>
                </div>
                <!-- end field _______________________ -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-batal" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="btn-save-instansi">Simpan</button>
            </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Modal Confirm Delete -->
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
                    <p>Apakah anda yakin ingin menghapus data instansi?</p>
                    <!-- HIDDEN INPUTS -->
                    <input type="hidden" id="delete-instansi-id" value="" />
                    <!-- END OF HIDDEN INPUTS -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onClick="hapusInstansi()">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@section('pagespecificscripts')
    <script src="{{ asset ("/js/instances/index.js") }}"></script>
    <!-- Google API MAPS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyZfAJSxbeiIfHoZY3o347zxWFS35xuAI&v=3.exp&sensor=false&libraries=places&callback=initMap" async defer></script>

    {{-- Jangan Hapus location yang freemium dipake di function initializa() --}}
    {{-- <script src="http://maps.googleapis.com/maps/api/js"></script> --}}
    {{-- <script>
        $(document).ready(function () {
            //Search
            $("#search").on("keyup paste", function () {
                tableInstansi.search($(this).val()).draw();
            });
            datatable();
            //initMap();
            $('#queue_front_format').on('keyup', function(e){
                var validasiHuruf = /^[A-Z]+$/;
                var queue_front_format = $(this).val();
                var capital = queue_front_format.toUpperCase();
                if (!capital.match(validasiHuruf)) {
                    console.log('Please input letters only');
                    $('#queue_front_format').attr('placeholder','Format antrian depan harus huruf ! Silakan isi ulang kembali .').css("background-color", "#f2f1f0");
                    $('#queue_front_format').val('');
                    return ;
                }
                $('#queue_front_format').css("background-color", "");
                $('#queue_front_format').val(capital);
            });

            $('#queue_back_format').on('keyup paste', function(){
                var validasiHuruf = /^[A-Z]+$/;
                var queue_back_format = $(this).val();
                var capital = queue_back_format.toUpperCase();
                if (!capital.match(validasiHuruf)) {
                    console.log('Please input letters only');
                    $('#queue_back_format').attr('placeholder','Format antrian belakang harus huruf ! Silakan isi ulang kembali .').css("background-color", "#f2f1f0");
                    $('#queue_back_format').val('')
                    return ;
                }
                $('#queue_back_format').css("background-color", "");
                $('#queue_back_format').val(capital);
            });
            //ADD
            $('#formAddInstansi').submit(function (e) {
                e.preventDefault();
                var name = $('#name').val()
                var address = $('#address').val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                if(name == ''){
                    $.confirm({
                        title : "Pesan",
                        content: "Nama instansi wajib diisi !",
                        buttons: {
                            cancel: {
                                text: "Ok",
                                btnClass: "btn-default"
                            }
                        }
                    });
                    return;
                }
                if(address == ''){
                    $.confirm({
                        title : "Pesan",
                        content: "Alamat instansi wajib diisi !",
                        buttons: {
                            cancel: {
                                text: "Ok",
                                btnClass: "btn-default"
                            }
                        }
                    });
                    return;
                }
                if( (lat == '') || (lng == '') ){
                    $.confirm({
                        title : "Pesan",
                        content: "Silakan klik titik lokasi !",
                        buttons: {
                            cancel: {
                                text: "Ok",
                                btnClass: "btn-default"
                            }
                        }
                    });
                    return;
                }
                var formData = $("#formAddInstansi").serialize();
                console.log(formData);
                //return;
                jQuery.ajax({
                    type: "post",
                    url: "/api/instance/create",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#btn-save-instansi").attr("disabled", true);
                    },
                    success: function (response) {
                        console.log(response);
                        document.getElementById("formAddInstansi").reset();
                        $(".toast-body").addClass("alert-success");
                        $("#message").html("Data berhasil disimpan");
                        $("#message-body").toast("show");
                        $("#modalInstansi").modal("toggle");
                        location.reload();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
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
        var tableInstansi
        //Geocoding Premium Start From here
        var marker;
        var geocoder;
        let map;
        x = navigator.geolocation;

        function initMap(type, lat, long) {
            if(type == "add"){
                var input = document.getElementById('address');
                var map_id = document.getElementById('map');
                var latitude = -6.914744;
                var longitude = 107.609810;
                // if (navigator.geolocation) {
                //     navigator.geolocation.getCurrentPosition(function (position) {
                //         initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                //         var latitude = position.coords.latitude;
                //         var longitude = position.coords.longitude;
                //         map.setCenter(initialLocation);
                //     });
                // } else {
                //     var latitude = -6.914744;
                //     var longitude = 107.609810;
                // }
                var location =  $("#location");
            }
            else {
                var input = document.getElementById('address');
                var map_id = document.getElementById('map');
                var latitude = lat;
                var longitude = long;
                var location =  $("#location");
            }

            // var myLatlng = new google.maps.LatLng(-6.914744, 107.609810);
            var myLatlng = new google.maps.LatLng(latitude, longitude);
            var map = new google.maps.Map(map_id, {
                center: myLatlng,
                scrollwheel: false,
                zoom: 15
            });

            // var input = document.getElementById('outlet_address');
            var searchBox = new google.maps.places.SearchBox(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            // Setting icon untuk marker
            var icon = {
                url: 'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Menentukan marker
            var markers = [];
            if(type == "add" || type == "edit"){
                // Create a marker for place
                var mark = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    position: myLatlng,
                    draggable: true,
                });
                markers.push(mark);
                google.maps.event.addListener(mark, 'dragend', function(e) {
                    location.val(this.getPosition());
                    geocodePosition(mark.getPosition(), type);
                });
                searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();
                    if (places.length == 0) {
                        return;
                    }
                    for (var i = 0, marker; marker = markers[i]; i++) {
                        marker.setMap(null);
                    }
                    markers = [];
                    // Get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        // Create a marker for each place.
                        var marker = new google.maps.Marker({
                            map: map,
                            icon: icon,
                            title: place.name,
                            position: place.geometry.location,
                            draggable: true,
                        });

                        // Mengambil nama lokasi berdasarkan perpindahan marker
                        google.maps.event.addListener(marker, 'dragend', function(e) {
                            location.val(this.getPosition());
                            geocodePosition(marker.getPosition(), type);
                        });

                        markers.push(marker);
                        bounds.extend(place.geometry.location);

                        // $("#location").val(place.geometry.location);
                        location.val(place.geometry.location);
                        updateLatLng();
                    });

                    map.fitBounds(bounds);

                    var listener = google.maps.event.addListener(map, "idle", function() {
                        if (map.getZoom() > 16) map.setZoom(16);
                        google.maps.event.removeListener(listener);
                    });

                });
            }else{
                // Create a marker for place
                var mark = new google.maps.Marker({
                    map: map,
                    icon: icon,
                    position: myLatlng,
                    draggable: false,
                });
                markers.push(mark);
            }
        }
        // Fungsi untuk memperoleh nama tempat berdasarkan perpindahan marker google maps
        function geocodePosition(pos, type) {
            var address = $('#address');
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                updateLatLng();
                if (responses && responses.length > 0) {
                    address.val(responses[0].formatted_address);
                } else {
                    address.val(address.val());
                }
            });
        }

        function updateLatLng(){
            var lokasi = $('#location').val();
            lokasi = lokasi.replace(/[{()}]/g, '');
            lokasi = lokasi.split(", ");
            var lat = lokasi[0];
            var lng = lokasi[1];
            $('#lat').val(lat);
            $('#lng').val(lng);
        }

        // function initMap() {
        //     geocoder = new google.maps.Geocoder();
        //     var infowindow = new google.maps.InfoWindow;
        //
        //     map = new google.maps.Map(document.getElementById("map"), {
        //         // center: {
        //         //     lat: -6.914744,
        //         //     lng: 107.609810 },
        //         center: getLocation(),
        //         zoom: 12,
        //         mapTypeId:google.maps.MapTypeId.ROADMAP
        //     });
        //
        //     // event input cari lokasi
        //     document.getElementById('address').onkeyup = function (e) {
        //         geocodeAddress(geocoder, map);
        //         console.log(geocodeAddress());
        //     };
        //     // even listner ketika map diklik
        //     google.maps.event.addListener(map, 'click', function(event) {
        //         setMarker(this, event.latLng);
        //     });
        // }
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            map.setCenter(new google.maps.LatLng(lat, lng));
        }
        function geocodeAddress(geocoder, resultsMap) {
            geocoder = new google.maps.Geocoder();
            const address = document.getElementById("address").value;
            geocoder.geocode({ address: address }, function (results, status) {
                if (status === "OK") {
                    resultsMap.setCenter(results[0].geometry.location);
                    new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                console.log("Geocode was not successful for the following reason: " + status);
                }
            });
        }

        function setMarker(peta, posisiTitik){
            if( marker ){
                // pindahkan marker
                marker.setPosition(posisiTitik);
            } else {
                // buat marker baru
                marker = new google.maps.Marker({
                    position: posisiTitik,
                    map: map
                });
            }
            // isi nilai koordinat ke form
            document.getElementById("lat").value = posisiTitik.lat();
            document.getElementById("lng").value = posisiTitik.lng();
        }
        //End Geolocation Premium


        function addInstances(){
            $('#modalInstansi').modal({
                backdrop: 'static',
                keyboard: false
            });
            initMap("add");
            $('#id').val('');
            $('#name').val('');
            $('#address').val('');
            $('#lng').val('');
            $('#lat').val('');
            $('#queue_front_format').val('');
            $('#queue_back_format').val('');
            $('#modalInstansi').modal("toggle");
        }

        function datatable(){
            $("#tableInstansi").DataTable().clear().destroy();
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
                columns: [
                    {
                        data: null,
                        "width": "1%"
                    },
                    {
                        data: "name",
                        "width": "30%"
                    },
                    {
                        data: "address",
                        "width": "25%"
                    },
                    {
                        data: "queue_front_format",
                        "width": "10%"
                    },
                    {
                        data: "queue_back_format",
                        "width": "10%"
                    },
                    {
                        data: null,
                        "width": "5%"
                    },
                ],
                    ajax: {
                        url: "/api/instance/datatable",
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
                            //console.log(response);
                            return response.data;
                        }
                    },
                    columns: [
                        {
                            "title": "No",
                            "data": null,
                            orderable: false
                        },
                        {
                            "title": "Nama Instansi",
                            data: "name",
                            orderable: false
                        },
                        {
                            "title": "Alamat",
                            data: "address",
                            orderable: false
                        },
                        {
                            "title": "Format Antrian Depan",
                            data: "queue_front_format",
                            orderable: false
                        },
                        {
                            "title": "Format Antrian Belakang",
                            data: "queue_back_format",
                            orderable: false
                        },
                        {
                            "title": "Aksi",
                            "data": "id",
                            "render": function (data, type, row) {
                                /*
                                label =
                                    '<button type="button" title="Edit" class="btn bg-color-green txt-color-white btn-update background_transparent no_padding" data-id="' + data + '" onclick="editInstansi(\'' + data + '\')"><i class="fas fa-edit color_D4D"></i></button> ' +
                                    '<button type="button" title="Hapus" class="btn bg-color-green txt-color-white btn-delete background_transparent no_padding" data-id="' + data + '"  onclick="konfirmasiHapus(\'' + data + '\')"><i class="fa fa-trash color_D4D"></i></button>'
                                return label;
                                */
                                var actions =
                                    '<span onClick="showMoreButton(this)" class="more-action dropdown" data-toggle="dropdown">' +
                                    '<i class="fa fa-ellipsis-h" aria-hidden="true"></i>' +
                                    '<ul class="dropdown-menu">' +
                                    '<li class="dropdown-action-item"><a onClick="detail(\'' + data + "')\">Detail</a></li>" +
                                    '<li class="dropdown-action-item"><a onClick="editInstansi(\'' +
                                    data +
                                    "')\">Edit</a></li>" +
                                    '<li class="dropdown-action-item"><a onClick="konfirmasiHapus(\'' +
                                    data +
                                    "')\">Hapus</a></li>" +
                                    "</ul>" +
                                    "</span>";
                                return actions;
                            },
                            orderable: false
                        },
                    ],
                    columnDefs: [{
                            targets: 0,
                            searchable: false,
                            orderable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass("text-center");
                                $(td).html(tableInstansi.page.info().start + row + 1);
                            }
                        },
                        {
                            targets: 1,
                            searchable: false,
                            orderable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass("text-wrap");
                            }
                        },
                        {
                            targets: 2,
                            searchable: false,
                            orderable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass("text-wrap");
                            }
                        },
                        {
                            targets: 3,
                            searchable: false,
                            orderable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass("text-center");
                                if(rowData.queue_front_format == null){
                                    $(td).html('-');
                                }
                            }
                        },
                        {
                            targets: 4,
                            searchable: false,
                            orderable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass("text-center");
                                if(rowData.queue_back_format == null){
                                    $(td).html('-');
                                }
                            }
                        },
                        {
                            targets: 5,
                            searchable: false,
                            orderable: false,
                            createdCell: function (td, cellData, rowData, row, col) {
                                $(td).addClass("text-wrap");
                                /*
                                var html =
                                    "<button type='button' onClick='editInstansi(" +
                                    rowData.id +
                                    ")' class='btn btn-success btn-sm' style='margin-left: 10px;' id='btn-edit-instansi'><i class='fas fa-pencil-alt' style='padding-right: 6px'></i>Ubah</button>";
                                html +=
                                    "<button class='btn btn-danger btn-sm' onClick='konfirmasiHapus(" +
                                    rowData.id +
                                    ");' style='margin-left: 10px;' data-toggle='modal' data-target='' id='btn-hapus-instansi'><i class='fa fa-trash' style='padding-right: 6px'></i>Hapus</button>";
                                $(td).html(html);
                                */
                            }
                        }
                    ]
                });
        }

        function taruhMarker(peta, posisiTitik){
            if( marker ){
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
                center:new google.maps.LatLng(-6.914744, 107.609810),
                zoom:9,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);
            // even listner ketika peta diklik
            google.maps.event.addListener(peta, 'click', function(event) {
                taruhMarker(this, event.latLng);
            });
        }
        // event jendela di-load
        //google.maps.event.addDomListener(window, 'load', initialize);

        function editInstansi(id){
            jQuery.ajax({
                type: "POST",
                url: "/api/instance/detail/" + id,
                data: {
                    id: id
                },
                beforeSend: function () {},
                success: function (response) {
                    //console.log(response.data);
                    var data =  response.data;
                    $('#id').val(data.id);
                    $("#name").val(data.name).attr('readonly', false);
                    $("#address").val(data.address).attr('readonly', false);
                    $("#lng").val(data.long).attr('readonly', false);
                    $("#lat").val(data.lat).attr('readonly', false);
                    $("#queue_front_format").val(data.queue_front_format).attr('readonly', false);
                    $("#queue_back_format").val(data.queue_back_format).attr('readonly', false);
                    $(".modal-title").html("Edit Instansi");
                    $("#btn-batal").html("Batal");
                    $('#btn-save-instansi').show();
                    $("#modalInstansi").modal("toggle");
                    initMap("edit", data.lat, data.long);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseJSON);
                    var errorMsg = "Gagal mengubah data instansi";
                    if (xhr.responseJSON) {
                        errorMsg = xhr.responseJSON.message;
                    }
                },
                complete: function () {}
            });
        }
        function detail(id){
            jQuery.ajax({
                type: "POST",
                url: "/api/instance/detail/" + id,
                data: {
                    id: id
                },
                beforeSend: function () {},
                success: function (response) {
                    //console.log(response.data);
                    var data =  response.data;
                    $('#id').val(data.id);
                    $("#name").val(data.name).attr('readonly', true);
                    $("#address").val(data.address).attr('readonly', true);
                    $("#lng").val(data.long).attr('readonly', true);
                    $("#lat").val(data.lat).attr('readonly', true);
                    $("#queue_front_format").val(data.queue_front_format).attr('readonly', true);
                    $("#queue_back_format").val(data.queue_back_format).attr('readonly', true);
                    $(".modal-title").html("Detail Instansi");
                    $("#btn-batal").html("Keluar");
                    $('#btn-save-instansi').hide();
                    $("#modalInstansi").modal("toggle");
                    initMap("edit", data.lat, data.long);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseJSON);
                    var errorMsg = "Gagal mengubah data instansi";
                    if (xhr.responseJSON) {
                        errorMsg = xhr.responseJSON.message;
                    }
                },
                complete: function () {}
            });
        }
        function konfirmasiHapus(id) {
            $("#modal-confirm-delete").modal("toggle");
            $("#delete-instansi-id").val(id);
        }
        function hapusInstansi() {
            var id = $("#delete-instansi-id").val();
            jQuery.ajax({
                type: "POST",
                url: "/api/instance/delete",
                data: {
                    id: id
                },
                success: function () {
                    $(".toast-body").addClass("alert-success");
                    $("#message").html("Data berhasil dihapus");
                    $("#message-body").toast("show");
                    $("#modal-confirm-delete").modal("hide");
                    datatable();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var errorMsg = "Gagal menghapus instansi";
                    if (xhr.responseJSON) {
                        errorMsg = xhr.responseJSON.message;
                    }

                },

            });
        }
        function showMoreButton(el) {
            $(el).toggleClass("active");
        }
    </script> --}}


@stop
