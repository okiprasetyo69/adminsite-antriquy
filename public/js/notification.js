$(function(){
    $.ajax({
        type    : 'get',
        url     : '/latest',
        data    : {
            type : 1 
        },
        success: function(response) {
            var data        = response.data;
            var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'November', 'Desember'];
        
            var has_unread  = false;
            data.forEach(function(notification, i){
                if(!notification.is_read){
                    has_unread  = true;
                    return false;
                }
            });

            if(has_unread){
                $('#notification-bar').addClass('beep');
            } else {
                $('#notification-bar').removeClass('beep');
            }

            data.forEach(function(notification, i){
                var is_read             = '';
                var read                = '';
                if(!notification.is_read){
                    is_read             = 'dropdown-item-unread';
                } else {
                    read                = 'style="color: #c0c9d0;"';
                }
                var notificationItem    = '<a href="'+notification.url+'" class="dropdown-item '+is_read+'">';
                var bg                  = '';
                var src                 = '';
                var tanggal             = new Date(notification.time.split(' ')[0]);
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

                var icon        = '<div class="dropdown-item-icon '+bg+' text-white">'
                                            + '<img src="'+src+'"></i>'
                                        + '</div>';
                var message     = '<div class="dropdown-item-desc" '+read+'>'
                                    + notification.message
                                    + '<div class="time" '+read+'>'+ nDate + ' '
                                    + notification.time.split(' ')[1]+'</div>'
                                + '</div>';

                notificationItem    += icon + message + '</a>';
                
                $('#notification-list').append(notificationItem);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            console.log('Error while fetching notification');
            console.log(xhr);
        }
    });
});