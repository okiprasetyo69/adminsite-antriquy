
function createDatatableRiwayat(){
  var table = $('#riwayat_datatable');
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
      "url": "/kasbon/createDatatableRiwayat",
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
    { "data": "sisa" , name:"sisa"},
    { "data": "sisa_bulan" , name:"sisa_bulan"},
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