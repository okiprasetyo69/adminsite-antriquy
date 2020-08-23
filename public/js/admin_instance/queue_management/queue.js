$(function () {
    $("#btn-save-offline").click(function () {
        submitOffline();
    });

    // Refresh data every x second
    setInterval(function () {
        getQueuesDailyCount();
        getQueueLists();
    }, 15000);

    getQueuesDailyCount();
    getQueueLists();
});

function getQueuesDailyCount() {
    $.ajax({
        type: "GET",
        url: "/webadmin/queue-live",
        contentType: "application/json",
        data: {},
        success: function (response) {
            if (response.status == 200) {
                if (response.data.length > 0) {
                    var data = response.data[0];
                    $("#count-total-queues").text(data.total_queue_today);
                    $("#count-processed-queues").text(data.total_queue_process);
                    $("#count-finished-queues").text(data.total_queue_finish);
                }
            } else {
                $(".toast-body").addClass("alert-danger");
                $("#message").html(response.message);
                $("#message-body").toast("show");
            }
        },
        error: function (request, status, error) {
            $(".toast-body").addClass("alert-danger");
            $("#message").html(request.responseJSON.message);
            $("#message-body").toast("show");
            console.log(request.responseJSON);
        },
    });
}

function getQueueLists() {
    var month = new Array();
    month[0] = "Januari";
    month[1] = "Februari";
    month[2] = "Maret";
    month[3] = "April";
    month[4] = "Mei";
    month[5] = "Juni";
    month[6] = "Juli";
    month[7] = "Agustus";
    month[8] = "September";
    month[9] = "Oktober";
    month[10] = "November";
    month[11] = "Desember";

    var d = new Date();
    var currentDate =
        d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear();

    $.ajax({
        type: "GET",
        url: "/webadmin/queue-list",
        contentType: "application/json",
        data: {},
        success: function (response) {
            if (response.status == 200) {
                //clear datas
                $("#queues-wrapper").html("");

                if (response.data.length > 0) {
                    var serveThis = true;

                    response.data.forEach(function (row, index) {
                        var label = "";
                        var actionButton = "";
                        var marker = "";

                        if (row.status == 1) {
                            marker = '<div class="marker processed"></div>';
                            label =
                                '<center><div class="status-label processed">PROSES</div></center>';
                            actionButton =
                                '<button class="btn btn-primary action" onClick="showConfirmProcess(\'' +
                                row.id +
                                "', 'finish', " +
                                index +
                                ')">Selesai</a>';
                        } else {
                            marker = '<div class="marker on-going"></div>';
                            label =
                                '<center><div class="status-label waiting">MENUNGGU</div></center>';

                            if (serveThis) {
                                actionButton =
                                    '<button class="btn btn-secondary action" onClick="showConfirmProcess(\'' +
                                    row.id +
                                    "', 'cancel', " +
                                    index +
                                    ')">Tidak Hadir</a>' +
                                    '<button class="btn btn-primary action" onClick="showConfirmProcess(\'' +
                                    row.id +
                                    "', 'process', " +
                                    index +
                                    ')">Proses</a>';
                            }

                            if (!serveThis) {
                                //isOffline
                                if (row.user_mobile_id == null) {
                                    actionButton =
                                        '<p class="text-medium title">ANTREAN OFFLINE <i class="fa fa-circle" style="color: #D1D1D1;" aria-hidden="true"></i</p>>';
                                }
                            }

                            serveThis = false;
                        }

                        var rowQueue =
                            '<div id="queue-' +
                            index +
                            '" class="row queue">' +
                            '<input id="q-id-' +
                            index +
                            '" type="hidden" value="' +
                            row.id +
                            '"/>' +
                            marker +
                            '<div class="col-md-4 queue-section">' +
                            '<p class="text content">Hari ini, ' +
                            currentDate +
                            "</p>" +
                            '<p class="text title">' +
                            row.name +
                            "</p>" +
                            "</div>" +
                            '<div class="col-md-2 queue-section">' +
                            '<p class="text content">Nomor Antrean</p>' +
                            '<p class="text title">' +
                            row.queue_no +
                            "</p>" +
                            "</div>" +
                            '<div class="col-md-2 queue-section label small">' +
                            label +
                            "</div>" +
                            '<div class="col-md-3 queue-section action">' +
                            actionButton;
                        "</div>" + "</div>";

                        $("#queues-wrapper").append(rowQueue);
                    });
                } else {
                    var rowQueue =
                        '<div id="queue-0" class="row queue">' +
                        '<input id="q-id-0" type="hidden" value=""/>' +
                        '<div class="marker processed"></div>' +
                        '<div class="col-md-4 queue-section">' +
                        "</div>" +
                        '<div class="col-md-2 queue-section">' +
                        "</div>" +
                        '<div class="col-md-2 queue-section label small">' +
                        "</div>" +
                        '<div class="col-md-3 queue-section action">' +
                        "</div>" +
                        "</div>";

                    $("#queues-wrapper").append(rowQueue);
                }
            } else {
                $(".toast-body").addClass("alert-danger");
                $("#message").html(response.message);
                $("#message-body").toast("show");
            }
        },
        error: function (request, status, error) {
            $(".toast-body").addClass("alert-danger");
            $("#message").html(request.responseJSON.message);
            $("#message-body").toast("show");
            console.log(request.responseJSON);
        },
    });
}

function process(instanceHistoryId, action, row) {
    var param = "instance_history_queue_detail_id=" + instanceHistoryId;
    $.ajax({
        type: "POST",
        url: "/api/queue/" + action + "?" + param,
        contentType: "application/json",
        data: {},
        success: function (response) {
            if (response.status == 200) {
                $("#modal-confirm-process").modal("toggle");
                $("#modal-confirm-process").toggleClass("modal-progress");

                getQueuesDailyCount();
                getQueueLists();
            } else {
                $(".toast-body").addClass("alert-danger");
                $("#message").html(response.message);
                $("#message-body").toast("show");
                $("#modal-confirm-process").toggleClass("modal-progress");
            }
        },
        error: function (request, status, error) {
            $(".toast-body").addClass("alert-danger");
            $("#message").html(request.responseJSON.message);
            $("#message-body").toast("show");
            $("#modal-confirm-process").toggleClass("modal-progress");
            console.log(request.responseJSON);
        },
    });
}

function showConfirmProcess(instanceHistoryId, action, row) {
    $("#hidden-instanceHistoryId").val(instanceHistoryId);
    $("#hidden-action").val(action);
    $("#hidden-row").val(row);

    var processAction = "Apakah anda yakin ingin memproses antrian ini?";
    if (action == "finish") {
        processAction = "Apakah anda yakin ingin menyelesaikan antrian ini?";
    } else if (action == "cancel") {
        processAction = "Apakah anda yakin ingin membatalkan antrian ini?";
    } else if (action == "process") {
        processAction = "Apakah anda yakin ingin memproses antrian ini?";
    }

    $("#confirm-process-content").text(processAction);
    $("#modal-confirm-process").modal("toggle");
}

function showOfflineForm() {
    $("#modal-form-offline").modal("toggle");
}

function submitOffline() {
    $("#modal-form-offline").toggleClass("modal-progress");
    $.ajax({
        type: "POST",
        url: "/api/booking/book_offline?name=" + $('input[name="name"]').val(),
        contentType: "application/json",
        data: {},
        success: function (response) {
            if (response.status == 200) {
                $("#modal-form-offline").toggleClass("modal-progress");
                $("#form-add-offline")[0].reset();

                $(".toast-body").removeClass("alert-danger");
                $(".toast-body").addClass("alert-success");
                $("#message").html("Data berhasil disimpan");
                $("#message-body").toast("show");

                $("#modal-form-offline").modal("toggle");

                $.alert({
                    title: "",
                    content:
                        '<div class="text-center">' +
                        '<div class="text-center" style="color: #05837f;"><i style="font-size: 80px; margin: 15px;" class="fa fa-check-circle-o" aria-hidden="true"></i></div>' +
                        '<div style="font-size: 18px;">Nomor antrean anda adalah</div>' +
                        '<div style="font-size: 20px;"><b>' +
                        response.data.queue_no +
                        "</b></div>" +
                        "</div>",
                    type: "white",
                    buttons: {
                        ok: {
                            text: "OK",
                            action: function () {
                                // location.replace("{{ route('webadmin') }}");
                            },
                        },
                    },
                });

                getQueueLists();
                getQueuesDailyCount();
            } else {
                $("#modal-form-offline").toggleClass("modal-progress");

                $(".toast-body").addClass("alert-danger");
                $("#message").html(response.message);
                $("#message-body").toast("show");
            }
        },
        error: function (request, status, error) {
            $("#modal-form-offline").toggleClass("modal-progress");

            $(".toast-body").addClass("alert-danger");
            $("#message").html(request.responseJSON.message);
            $("#message-body").toast("show");
            console.log(request.responseJSON);
        },
    });
}

function confirmProcess() {
    var instanceHistoryId = $("#hidden-instanceHistoryId").val();
    var action = $("#hidden-action").val();
    var row = $("#hidden-row").val();

    $("#modal-confirm-process").toggleClass("modal-progress");
    process(instanceHistoryId, action, row);
}
