@extends('layouts.app')

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #FBFEFD;">
                    <div class="card-header">
                        <div class="row" style="width: 100%;padding: 40px;">
                            <div class="col-md-12" style="margin-bottom: 30px;">
                                <div id="read-sg" class="pull-right"><button class="btn" onclick="readAll()"><span style="color: green;"><i class="fas fa-check-circle"></i>  Tandai semua sudah dibaca</span></button></div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 30px;">
                                <div id="notification-all" class="dropdown-list-content dropdown-list-icons">
                                </div>
                            </div>
                            <div class="col-md-6"><div id="info-page"></div></div>
                            <div class="col-md-6">
                                <div class="container">
                                    @foreach ($result as $user)
                                        {{ $user->name }}
                                    @endforeach
                                </div>
                                {{ $result->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('pagespecificscripts')
<script type="text/javascript">
    $(document).ready(function() {
        var url = $(location).attr('href').split("/")[3];
        var getPage = url.split("?")[1] ? url.split("?")[1].slice(5) : 1;
        console.log(getPage);
        $(function(){
            $.ajax({
                type    : 'get',
                url     : '/latest',
                data    : {
                    page : getPage
                },
                success: function(response) {
                    console.log(response.data);
                    var data        = response.data.data;
                    var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'November', 'Desember'];
                    $("#info-page").empty();
                    $("#info-page").html('');
                    $("#info-page").html('Menampilkan '+data.length+' data dari '+response.data.total+' notifikasi');
                    
                    var has_unread  = false;
                    data.forEach(function(notification, i){
                        if(!notification.is_read){
                            has_unread  = true;
                            return false;
                        }
                    });
                    data.forEach(function(notification, i){
                        var is_read             = '';
                        var read             = '';
                        if(!notification.is_read){
                            is_read             = 'dropdown-item-unread';
                        } else {
                            read                = 'style="color: #c0c9d0;"';
                        }
                        var notificationItem    = '<a href="'+notification.url+'" class="dropdown-item '+is_read+'"><div class="row">';
                        var bg                  = '';
                        var src                 = '';
                        var tanggal             = new Date(notification.created_at.split(' ')[0]);
                        var nDate               = tanggal.getDate() + ' ' + month[tanggal.getMonth()] + ' ' + tanggal.getFullYear();
                        

                        var message     = notification.message.toLowerCase();
                        if(message.includes("menyetujui") || message.includes("setujui") || message.includes("setuju")){
                            bg          = 'ic-approved-notification';
                            src         = '/img/notification/ic_notif_disetujui.png';
                        } else if(message.includes("menolak") || message.includes("tolak")){
                            bg          = 'ic-rejected-notification';
                            src         = '/img/notification/ic_notif_ditolak.png';
                        } else {
                            if(notification.module == 'perizinan'){
                                bg      = 'ic-module-perizinan';
                                src     = '/img/notification/ic_notif_perizinan.png';
                            } else if(notification.module == 'penggajian'){
                                bg      = 'ic-module-penggajian';
                                src     = '/img/notification/ic_notif_penggajian.png';
                            } else if(notification.module == 'kasbon'){
                                bg      = 'ic-module-kasbon';
                                src     = '/img/notification/ic_notif_kasbon.png';
                            } else if(notification.module == 'jadwal'){
                                bg      = 'ic-module-jadwal';
                                src     = '/img/notification/ic_notif_penjadwalan.png';
                            } else if(notification.module == 'kehadiran'){
                                bg      = 'ic-module-kehadiran';
                                src     = '/img/notification/ic_notif_kehadiran.png';
                            } else if(notification.module == 'personalia'){
                                bg      = 'ic-module-personalia';
                                src     = '/img/notification/ic_notif_personalia.png';
                            }
                        }

                        var icon        = '<div class="col-md-1"><div class="dropdown-item-icon '+bg+' text-white icon-notification">'
                                                    + '<img src="'+src+'" style="margin: 14px;"></i>'
                                                + '</div></div>';
                        var message     = '<div class="col-md-10"><div class="dropdown-item-desc div-notification"><span class="desc-notification" '+read+'>'
                                            + notification.message
                                            + '</span><div class="time-notification" '+read+'>'+ nDate + ' ' + notification.created_at.split(' ')[1]+'</div>'
                                        + '</div></div>';

                        notificationItem    += icon + message + '<div class="col-md-1" style="margin: auto;"><i class="fas fa-chevron-right" '+read+'></i></div></div></a><hr style="margin: 0;">';
                        
                        $('#notification-all').append(notificationItem);
                    });
                    
                    
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log('Error while fetching notification');
                    console.log(xhr);
                }
            });
        });

    });
    
    function readAll(){
        $.ajax({
            type    : 'post',
            url     : '/updateAll',
            data    : {
            },
            success: function(response) {
                console.log(response);
                if(response.message == "success"){
                    $.alert({
                        title: 'Sukses',
                        content: 'Notifikasi ditandai baca semua',
                        type: 'green',
                        buttons: {
                            ok: {
                                text: 'OK',
                                action: function(){
                                    window.location.href = '/notification';
                                }
                            }
                        }
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log('Error while fetching notification');
                console.log(xhr);
                $.alert({
                    title: 'Error',
                    content: 'Update read notifikasi gagal',
                    type: 'red'
                });
            }
        });
    }
</script>
@stop
