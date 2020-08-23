$(function () {
    $("#btn-save-user").click(function () {
        save();
    });

    getInstances();
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
                next: '<a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></i></a>',
                previous: '<a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></i></a>',
            },
            info: "Menampilkan _START_ dari _END_ data",
        },
        processing: true,
        serverSide: true,
        bLengthChange: false,
        searching: false,
        ajax: {
            url: "/api/user/find",
            type: "POST",
            contentType: "application/json",
            data: function (d) {
                console.log(d);
                var dataparam = {
                    draw: d.draw,
                    page: d.start / d.length + 1,
                    length: d.length,
                    search_text: $("#search-box").val(),
                };
                return JSON.stringify(dataparam);
            },
            dataSrc: function (response) {
                //console.log(response);
                return response.data;
            },
        },
        columns: [{
                data: "id",
                name: "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1; //row number
                },
                orderable: false,
            },
            {
                data: "fullname",
                name: "fullname",
                orderable: false,
            },
            {
                data: "address",
                name: "address",
                render: function (data, type, row) {
                    if (data !== null) {
                        var max_karakter = 50;
                        if (data.length > max_karakter) {
                            return data.substring(0, max_karakter) + "...";
                        } else {
                            return data;
                        }
                    } else {
                        return data;
                    }
                },
                orderable: false,
            },
            {
                data: "instance_name",
                name: "instance_name",
                orderable: false,
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
                        '<li class="dropdown-action-item"><a onClick="edit(\'' +
                        data +
                        "')\">Edit</a></li>" +
                        '<li class="dropdown-action-item"><a onClick="hapus(\'' +
                        data +
                        "')\">Hapus</a></li>" +
                        "</ul>" +
                        "</span>";
                    return actions;
                },
                orderable: false,
            },
        ],
        columnDefs: [{
                targets: 0,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                    $(td).html(table.page.info().start + row + 1);
                },
            },
            {
                targets: 1,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-wrap");
                },
            },
            {
                targets: 2,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-wrap");
                },
            },
            {
                targets: 3,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                },
            },
            {
                targets: 4,
                searchable: false,
                orderable: false,
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass("text-center");
                },
            },
        ],
        order: [
            [0, "asc"]
        ],
    });

    var table = $("#main-table").DataTable();
    $("#search-box").keyup(function (event) {
        if (event.key === "Enter") {
            table.search($(this).val()).draw();
        }
    });
}

function showMoreButton(el) {
    $(el).toggleClass("active");
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

/**
 * CRUD functions
 */

function showSaveForm() {
    $("#modal-form-user").modal("toggle");
    $("#form-add-user")[0].reset();
    setFormDetail(null, false);
}

function detail(userId) {
    $("#modal-form-user").modal("toggle");

    $.ajax({
        type: "GET",
        processData: false,
        contentType: false,
        url: "/api/user/detail?id=" + userId,
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                setFormDetail(response.data[0], true);
            }
        },
        error: function (request, status, error) {},
    });
}

function edit(userId) {
    $("#modal-form-user").modal("toggle");
    $("#modal-title-form-user").html("Edit User");

    $.ajax({
        type: "GET",
        processData: false,
        contentType: false,
        url: "/api/user/detail?id=" + userId,
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                setFormDetail(response.data[0], false);
            }
        },
        error: function (request, status, error) {},
    });
}

function hapus(userId) {
    $("#modal-confirm-delete").modal("toggle");
    $("#delete-user-id").val(userId);
}

function save() {
    var formData = $("#form-add-user").serializeArray();
    var action = "add";
    var method = "POST";
    var param = "?";

    var data = {};
    if (formData[1].value !== "") {
        action = "edit";
        method = "PUT";

        var userId = $("#id").val();

        data = {
            id: userId,
            fullname: formData[2].value,
            role_code: formData[3].value,
            instance_id: formData[4].value,
            username: formData[5].value,
            email: formData[6].value,
            address: formData[7].value,
        };

        param += Object.entries(data)
            .map((e) => e.join("="))
            .join("&");
    } else {
        data = {
            fullname: formData[2].value,
            role_code: formData[3].value,
            instance_id: formData[4].value,
            username: formData[5].value,
            email: formData[6].value,
            address: formData[7].value,
        };

        param += Object.entries(data)
            .map((e) => e.join("="))
            .join("&");
    }

    $.ajax({
        type: method,
        processData: false,
        contentType: false,
        url: "/api/user/" + action + "" + param,
        data: {},
        success: function (response) {
            if (response.status == 200) {
                $(".toast-body").addClass("alert-success");
                $("#message").html("Data berhasil disimpan");
                $("#message-body").toast("show");

                $("#modal-form-user").modal("hide");
                createDatatable();
            } else {
                alert(response.message);
            }
        },
        error: function (request, status, error) {
            $(".toast-body").addClass("alert-success");
            $("#message").html("Data berhasil disimpan");
            $("#message-body").toast("show");

            $("#modal-form-user").modal("hide");
            createDatatable();
        },
    });
}

function confirmDelete() {
    var userId = $("#delete-user-id").val();

    $.ajax({
        type: "DELETE",
        processData: false,
        contentType: false,
        url: "/api/user/delete?id=" + userId,
        data: {},
        success: function (response) {
            $("#modal-confirm-delete").modal("toggle");
            createDatatable();
        },
        error: function (request, status, error) {},
    });
}
