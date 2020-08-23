var url = new URL(window.location.href);
var userId = url.searchParams.get("id");

$(function(){
    $.ajax({
        type: 'GET',
        processData: false,
        contentType: false,
        url: '/api/user/detail?id=' + userId,
        data: {},
        success:function(response) {
            if(response.data.length > 0){
                var data = response.data[0];
                $('#fullname').val(data.fullname);
            }
        }, error: function (request, status, error) {
        }
    });

    $('#password').keyup(function(){
        if($('#password').val() !== $('#confirm-password').val()){
            $('#password').addClass('is-invalid');
            $('#confirm-password').addClass('is-invalid');
        } else {
            $('#password').removeClass('is-invalid');
            $('#confirm-password').removeClass('is-invalid');
        }
    });

    $('#confirm-password').keyup(function(){
        if($('#password').val() !== $('#confirm-password').val()){
            $('#password').addClass('is-invalid');
            $('#confirm-password').addClass('is-invalid');
        } else {
            $('#password').removeClass('is-invalid');
            $('#confirm-password').removeClass('is-invalid');
        }
    });
});

function verify(){
    if($('#password').val() !== $('#confirm-password').val()){
        $(".toast-body").addClass("alert-danger");
        $("#message").html("Password dan konfirmasi password harus sama!");
        $("#message-body").toast("show");
    }
    else{
        $.ajax({
            type: 'POST',
            url: '/api/user/verify?id=' + userId + '&' + $('#form-verify-password').serialize(),
            contentType: "application/json",
            data: {},
            success:function(response) {
                if(response.status == 200){
                    $(".toast-body").addClass("alert-success");
                    $("#message").html("Data berhasil disimpan");
                    $("#message-body").toast("show");

                    document.location.href = '/';
                }
            }, error: function (request, status, error) {
                alert('Terjadi kesalahan');
                console.log(request.responseJSON);
            }
        });
    }
}
