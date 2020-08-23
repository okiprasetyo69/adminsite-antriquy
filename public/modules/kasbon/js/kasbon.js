function setDate(date){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; 

  var yyyy = today.getFullYear();
  if(dd<10){
    dd='0'+dd;
  } 
  if(mm<10){
    mm='0'+mm;
  } 
  today = yyyy+'-'+mm+'-'+dd;     

  return today;
}
$("#btn-modal").fireModal({
  title: 'Kasbon',
  body: $("#modal-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
  removeOnDismiss:true,
  modalOnDismiss: function(){
    $('#form')[0].reset();
    $('table#cicilan tbody').html('');
    $('#tanggal_pengajuan').val(setDate());
    $('#group_personalia').hide();
    $('#select_personalia').html('');

    $('#form input').attr('readonly', false);
    $('#form button#btn_minus').attr('readonly', false);
    $('#form button#btn_plus').attr('readonly', false);
    $('#lama_cicilan').attr('readonly', true);
    $('#form select').attr('readonly', false);
  },
  onFormSubmit: function(modal, e, form) {
    e.preventDefault();
    let form_data = $('#form').serializeArray();
    jQuery.ajax({
      type: 'post',
      "url": "/kasbon/tambah",
      data: form_data,
      success: function(result) {
        var data = JSON.parse(result);

        $('#form')[0].reset();
        form.stopProgress();

        modal.modal('toggle');
        createDatatable();

      },
      error: function(xhr, ajaxOptions, thrownError) {
        form.stopProgress();
        alert('error');
      }
    });
  },
  shown: function(modal, form) {
  },
  buttons: [
  {
    text: 'Simpan',
    submit: true,
    display:"{{$permission->create}}",
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      $('#tanggal_pengajuan').val(setDate());
    }
  },
  {
    text: 'Tolak',
    submit: false,
    display:"{{$permission->status}}",
    class: 'btn btn-danger btn-shadow',
    handler: function(modal) {

      $('#kasbon_id').val($('#id').val());
      $("#btn-catatan").trigger('click');
      modal.modal('toggle');
    }
  },
  {
    text: 'Setujui',
    submit: false,
    display:"{{$permission->status}}",
    class: 'btn btn-success btn-shadow',
    handler: function(modal) {
      setujui($('#id').val());

      modal.modal('toggle');
      $('#form')[0].reset();
    }
  }
  ]
});
$("#btn-catatan").fireModal({
  title: 'Catatan',
  body: $("#modal-catatan"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
  removeOnDismiss:true,
  modalOnDismiss: function(){
  },
  onFormSubmit: function(modal, e, form) {
    e.preventDefault();
    jQuery.ajax({
      type: 'post',
      "url": "/kasbon/tolak",
      data: {
        catatan: $('#catatan').val(),
        id:$('#kasbon_id').val()
      },
      async:false,
      success: function(result) {
        var data = JSON.parse(result);

        $('#form-catatan')[0].reset();
        form.stopProgress();

        modal.modal('toggle');
        createDatatable();

      },
      error: function(xhr, ajaxOptions, thrownError) {
        form.stopProgress();
        alert('error');
      }
    });
  },
  shown: function(modal, form) {
  },
  buttons: [

  {
    text: 'Batal',
    submit: false,
    display:true,
    class: 'btn btn-default btn-shadow',
    handler: function(modal) {
      console.log('masuk');
    }
  },
  {
    text: 'Simpan',
    submit: true,
    display:true,
    class: 'btn btn-primary btn-shadow',
    handler: function(modal) {
      $('#tanggal_pengajuan').val(setDate());
    }
  }
  ]
});
function createDatatable(){
  var table = $('#outlet_datatable');
  table.DataTable().clear().destroy();
  table.DataTable({
    language: {
      paginate: {
        next: '<a href="#"><i class="fa fa-chevron-right"></i></a>',
        previous: '<a href="#"><i class="fa fa-chevron-left"></i></a>'  
      },
      "info": "Menampilkan _PAGE_ dari _PAGES_ data"
    },
    "processing": true,
    "serverSide": true,
    'searching'   : true,
    "retrieve": true,
    "ajax":{
      "url": "/kasbon/createDatatable",
      "dataType": "json",
      "type": "GET",
    },
    "columns": [
    {
      data: "DT_RowIndex",
      name: "DT_RowIndex",
      orderable: false,
      searchable: false,
      "width":"5%"
    },
    { "data": "pegawai_id" , name:"outlet"},
    { "data": "nama" , name:"nama"  },
    { "data": "tanggal_pengajuan" , name:"personalia"},
    { "data": "jumlah" , name:"total_gaji"},
    { "data": "lama_cicilan" , name:"total_gaji"},
    { "data": "status_pengajuan" , name:"status"},
    { 
      "data": "option" , 
      name:"option",
      "width":"10%"
    },

    ],
    "order": [[ 0, "desc" ]]
  });

  var table = $('#outlet_datatable').DataTable();
  $('#search-btn').click(function () {
    table
    .columns(2)
    .search( $('#search-value').val() )
    .draw();
  } );

}
$('#select_outlet').change(function(){

  jQuery.ajax({
    type: 'get',
    async: false,
    "url": "/personalia/getListPersonaliaByIdOutlet",
    data: {
      id_outlet:$('#select_outlet').val()
    },
    beforeSend: function(){
      $('#group_personalia').hide();
      $('#select_personalia').html('');
    },
    success: function(result) {
      var hasil = JSON.parse(result);
      var option = '';
      hasil.forEach( function(element, index) {
        option += '<option value="'+element.id+'">'+element.nama+'</option>'
      });
      $('#select_personalia').append(option);
      if (hasil.length > 0) {
        $('#group_personalia').show();
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
      form.stopProgress();
      alert('error');
    }
  });
});
function edit(row_id){
  jQuery.ajax({
    type: 'get',
    "url": "/kasbon/getDataById",
    data: {
      id:row_id
    },
    beforeSend: function(){
      $('#form')[0].reset();

      $('#form input').attr('readonly', false);
      $('#form button#btn_minus').attr('readonly', false);
      $('#form button#btn_plus').attr('readonly', false);
      $('#form select').attr('readonly', false);
    },
    success: function(result) {
      var hasil = JSON.parse(result);
      console.log(hasil.status);
      $('#id').val(hasil.id);
      $('#select_outlet').val(hasil.id_outlet);
      $('#select_outlet').trigger('change');
      $('#select_personalia').val(hasil.id_personalia);
      $('#tanggal_pengajuan').val(hasil.tanggal_pengajuan);
      $('#keperluan').val(hasil.keperluan);
      $('#jumlah').val(hasil.jumlah);
      $('#lama_cicilan').val(hasil.lama_cicilan);
      $('#lama_cicilan').attr('readonly', true);
      $('#jaminan').val(hasil.jaminan);
      editDetailCicilan(hasil.id);
      $('#btn-modal').click();
    },
    error: function(xhr, ajaxOptions, thrownError) {
      form.stopProgress();
      alert('error');
    }
  });

}
function hapus(row_id){
  $.confirm({
    title: 'Hapus kasbon',
    content: 'Apakah anda yakin akan menghapus data kasbon?',
    buttons: {
      cancel: function () {
      },

      confirm: function () {
        jQuery.ajax({
          type: 'get',
          "url": "/kasbon/hapus",
          data: {
            id:row_id
          },
          beforeSend: function(){
          },
          success: function(result) {
            createDatatable();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert('error');
          }
        });         
      },
    }
  });
}
function detail(row_id){
  console.log(row_id);
  jQuery.ajax({
    type: 'get',
    "url": "/kasbon/getDataById",
    data: {
      id:row_id
    },
    beforeSend: function(){
      $('#form')[0].reset();
    },
    success: function(result) {
      var hasil = JSON.parse(result);
      console.log(hasil);
      $('#id').val(hasil.id);
      $('#select_outlet').val(hasil.id_outlet);
      $('#select_outlet').trigger('change');
      $('#select_personalia').val(hasil.id_personalia);
      $('#tanggal_pengajuan').val(hasil.tanggal_pengajuan);
      $('#keperluan').val(hasil.keperluan);
      $('#jumlah').val(hasil.jumlah);
      $('#lama_cicilan').val(hasil.lama_cicilan);
      $('#jaminan').val(hasil.jaminan);
      detailCicilan(hasil.id);
      $('#btn-modal').click();
      $('#form input').attr('readonly', true);
      $('#form button#btn_minus').attr('readonly', true);
      $('#form button#btn_plus').attr('readonly', true);
      $('#lama_cicilan').attr('readonly', true);
      $('#form select').attr('readonly', true);
    },
    error: function(xhr, ajaxOptions, thrownError) {
      form.stopProgress();
      alert('error');
    }
  });

}
function editDetailCicilan(row_id){
  jQuery.ajax({
    type: 'get',
    "url": "/kasbon/cicilan/getDataByIdKasbon",
    async:false,
    data: {
      id:row_id
    },
    beforeSend: function(){
    },
    success: function(result) {
      var hasil = JSON.parse(result);
      console.log(hasil);
      var table = $('table#cicilan tbody');
      table.html('');
      hasil.forEach( function(element, index) {
        table.append(
          '<tr >'+
          '<td>Bulan '+(index+1)+'</td>'+
          '<td>'+
          '<input type="text" name="cicilanId[]" class="form-control" style="display: none;" value="'+element.id+'">'+
          '<input type="text" name="cicilan[]" class="form-control" value="'+element.jumlah+'">'+
          '</td>'+
          '</tr>'
          );
      });
    },
    error: function(xhr, ajaxOptions, thrownError) {
      form.stopProgress();
      alert('error');
    }
  });
}
function detailCicilan(row_id){
  jQuery.ajax({
    type: 'get',
    "url": "/kasbon/cicilan/getDataByIdKasbon",
    async:false,
    data: {
      id:row_id
    },
    beforeSend: function(){
    },
    success: function(result) {
      var hasil = JSON.parse(result);
      console.log(hasil);
      var table = $('table#cicilan tbody');
      table.html('');
      hasil.forEach( function(element, index) {
        table.append(
          '<tr >'+
          '<td>Bulan '+(index+1)+'</td>'+
          '<td>'+
          '<input type="text" name="cicilanId[]" class="form-control" style="display: none;" value="'+element.id+'">'+
          '<input type="text" name="cicilan[]" class="form-control" value="'+element.jumlah+'">'+
          '</td>'+
          '<td>'+
          '<input type="text" name="cicilan[]" class="form-control" value="'+(element.status_bayar == 1?'Sudah Dibayar': 'Belum Dibayar')+'" readonly>'+
          '</td>'+
          '</tr>'
          );
      });
    },
    error: function(xhr, ajaxOptions, thrownError) {
      form.stopProgress();
      alert('error');
    }
  });
}
function cicilan(tipe){
  var val = parseInt($('#lama_cicilan').val());
  var jumlah = $('#jumlah').val();
  if(tipe == 'min'){
    if (val - 1 < 0) {
      return false;
    }
    $('#lama_cicilan').val(val - 1 );
    removeBarisCicilan();
    setValue((jumlah/(val-1)));
  } else{
    $('#lama_cicilan').val(val + 1 );
    addBarisCicilan();
    setValue((jumlah/(val+1)));
  }
}
function addBarisCicilan(){
  var lastvalue = parseInt($('table#cicilan tbody').children('tr:last').index()) + 2;
  var table = $('table#cicilan tbody');
  table.append(
    '<tr >'+
    '<td>Bulan '+lastvalue+'</td>'+
    '<td>'+
    '<input type="text" name="cicilanId[]" class="form-control" style="display: none;">'+
    '<input type="text" name="cicilan[]" class="form-control">'+
    '</td>'+
    '</tr>'
    );
}
function removeBarisCicilan(){
  $('table#cicilan tbody').children('tr:last').remove();
}
function setValue(jumlah){
  $('input[name="cicilan[]"]').val(Math.ceil(jumlah));

}
function setujui(row_id){
  jQuery.ajax({
    type: 'get',
    async: false,
    "url": "/kasbon/setujui",
    data: {
      id:row_id
    },
    beforeSend: function(){
    },
    success: function(result) {
      var hasil = JSON.parse(result);
      console.log(hasil);
      createDatatable();
    },
    error: function(xhr, ajaxOptions, thrownError) {
    }
  });
}