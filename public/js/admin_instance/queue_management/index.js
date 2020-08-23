var today = moment().format("YYYY-MM-DD");
var data = { start: today, end: today };

$(function () {
    $("#btn_filter_by_today").click(function () {
        $("#filter_by").html("Hari ini");
        filterByToday();
    });

    $("#btn_filter_table_by_today").click(function () {
        $("#filter_table_by").html("Hari ini");
        today = moment().format("YYYY-MM-DD");
        data = { start: today, end: today };
        createDatatable();
    });

    $("#btn_filter_by_week").click(function () {
        $("#filter_by").html("Minggu ini");
        filterByThisWeek();
    });

    $("#btn_filter_table_by_week").click(function () {
        $("#filter_table_by").html("Minggu ini");
        startOfWeek = moment(moment().startOf("isoWeek").toDate()).format(
            "YYYY-MM-DD"
        );
        endOfWeek = moment(moment().endOf("isoWeek").toDate()).format(
            "YYYY-MM-DD"
        );
        data = { start: startOfWeek, end: endOfWeek };
        createDatatable();
    });

    $("#btn_filter_by_month").click(function () {
        $("#filter_by").html("Bulan ini");
        filterByThisMonth();
    });

    $("#btn_filter_table_by_month").click(function () {
        $("#filter_table_by").html("Bulan ini");
        startOfMonth = moment(moment().startOf("month").toDate()).format(
            "YYYY-MM-DD"
        );
        endOfMonth = moment(moment().endOf("month").toDate()).format(
            "YYYY-MM-DD"
        );
        data = { start: startOfMonth, end: endOfMonth };
        createDatatable();
    });

    filterByToday();
    getInstances();
    // getQueueTotal();
    createDatatable();
});

function createDatatable() {
    var table = $("#main-table");
    table.DataTable().clear().destroy();
    table = $("#main-table").DataTable({
        language: {
            emptyTable: "Data tidak tersedia",
            zeroRecords: "Tidak ada data yang ditemukan",
            infoEmpty: "Data tidak tersedia",
            paginate: {
                next:
                    '<a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></i></a>',
                previous:
                    '<a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></i></a>',
            },
            info: "Menampilkan _START_ dari _END_ data",
        },
        processing: true,
        serverSide: false,
        lengthChange: false,
        searching: true,
        retrieve: true,
        ajax: {
            url: "/api/queue/find",
            dataType: "json",
            type: "POST",
            data: data,
        },
        columns: [
            {
                data: "id",
                name: "id",
                className: "text-center",
                render: function (data, type, row, meta) {
                    // console.log(data);
                    return meta.row + meta.settings._iDisplayStart + 1; //row number
                },
            },
            {
                data: "date",
                name: "date",
                render: function (data) {
                    moment.locale("id");
                    return moment(data).format("dddd, D MMMM YYYY");
                },
                className: "text-center",
            },
            {
                data: "total_queue",
                name: "total_queue",
                className: "text-center",
            },
            {
                data: "total_queue_finished",
                name: "total_queue_finished",
                className: "text-center",
            },
            {
                data: "total_queue_cancelled",
                name: "total_queue_cancelled",
                className: "text-center",
            },
            {
                data: "id",
                name: "id",
                render: function (data, type, row) {
                    var actions =
                        '<span onClick="showMoreButton(this)" class="more-action dropdown" data-toggle="dropdown">' +
                        '<i class="fa fa-ellipsis-h" aria-hidden="true"></i>' +
                        '<ul class="dropdown-menu">' +
                        '<li class="dropdown-action-item"><a onClick="detail(\'' +
                        data +
                        "')\">Detail</a></li>" +
                        "</ul>" +
                        "</span>";
                    return actions;
                },
            },
        ],
        order: [[0, "asc"]],
    });

    var table = $("#main-table").DataTable();
    $("#search-box").keyup(function () {
        table.search($(this).val()).draw();
    });
}

function showMoreButton(el) {
    $(el).toggleClass("active");
}

function filterByToday() {
    var today = moment().format("YYYY-MM-DD");

    $.ajax({
        type: "POST",
        url: "/api/queue/get_queue_total",
        data: { start: today, end: today },
        success: function (response) {
            console.log("Total antrian hari ini : " + response.all_queue_total);
            $("#queue_total").text(response.all_queue_total);
            $("#present_queue_total").text(response.present_queue_total);
            $("#unpresent_queue_total").text(response.unpresent_queue_total);
        },
        error: function (request, status, error) {
            console.log(error);
            console.log(status);
        },
    });
}

function filterByThisWeek() {
    var startOfWeek = moment(moment().startOf("isoWeek").toDate()).format(
        "YYYY-MM-DD"
    );
    var endOfWeek = moment(moment().endOf("isoWeek").toDate()).format(
        "YYYY-MM-DD"
    );

    $.ajax({
        type: "POST",
        url: "/api/queue/get_queue_total",
        data: { start: startOfWeek, end: endOfWeek },
        success: function (response) {
            console.log(
                "Total antrian minggu ini : " + response.all_queue_total
            );
            $("#queue_total").text(response.all_queue_total);
            $("#present_queue_total").text(response.present_queue_total);
            $("#unpresent_queue_total").text(response.unpresent_queue_total);
        },
        error: function (request, status, error) {
            console.log(error);
            console.log(status);
        },
    });
}

function filterByThisMonth() {
    var startOfMonth = moment(moment().startOf("month").toDate()).format(
        "YYYY-MM-DD"
    );
    var endOfMonth = moment(moment().endOf("month").toDate()).format(
        "YYYY-MM-DD"
    );

    console.log(startOfMonth);
    console.log(endOfMonth);

    $.ajax({
        type: "POST",
        url: "/api/queue/get_queue_total",
        data: { start: startOfMonth, end: endOfMonth },
        success: function (response) {
            console.log(
                "Total antrian bulan ini : " + response.all_queue_total
            );
            $("#queue_total").text(response.all_queue_total);
            $("#present_queue_total").text(response.present_queue_total);
            $("#unpresent_queue_total").text(response.unpresent_queue_total);
        },
        error: function (request, status, error) {
            console.log(error);
            console.log(status);
        },
    });
}

function getInstances() {
    $.ajax({
        type: "GET",
        processData: false,
        contentType: false,
        url: "/user-management/get-instance-collections",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                response.data.forEach(function (data, index) {
                    $("#instance-collections").append(
                        '<option value="' +
                            data.id +
                            '">' +
                            data.name +
                            "</option>"
                    );
                });
            }
        },
        error: function (request, status, error) {},
    });
}

function setFormDetail(data, readonly) {
    $("#btn-save-user").css("display", "");
    if (readonly) {
        $("#modal-title-form-user").html("Detail User");
        $("#btn-save-user").css("display", "none");
        $("#btn-cancel").css("display", "none");
    }

    $("#modal-form-user input").attr("readonly", readonly).trigger("change");
    $("#modal-form-user select").attr("disabled", readonly).trigger("change");

    if (data !== null) {
        $("#id").val(data.id).trigger("change");
        $('input[name="fullname"]').val(data.fullname).trigger("change");
        $('select[name="role_code"]').val(data.role_code).trigger("change");
        $('select[name="instance_id"]').val(data.instance_id).trigger("change");
        $('input[name="username"]').val(data.username).trigger("change");
        $('input[name="email"]').val(data.email).trigger("email");
        $('input[name="address"]').val(data.address).trigger("change");
    } else {
        $("#id").val("").trigger("change");
    }
}

function detail(historyId) {
    // window.location.href = "/detail/" + historyId;
    window.location.replace(window.location.href + "/detail/" + historyId);
}
