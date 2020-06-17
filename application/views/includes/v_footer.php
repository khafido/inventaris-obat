<!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script> -->
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>

<!--MODAL DELETE-->
<!-- <form> -->
<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <strong>Apakah anda yakin?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="#" id="btn-delete" class="btn btn-success">Hapus</a>
      </div>
    </div>
  </div>
</div>
<!-- </form> -->
<!--END MODAL DELETE-->

    <script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datepicker.css">
    <script>
    window.datao = '[]';
    window.undef;

    $('.input-daterange').datepicker({
     todayBtn:'linked',
     format: "yyyy-mm-dd",
     orientation: "bottom",
     autoclose: true
    });

// =====================================================================================

    $('#mydata').dataTable({
      dom: 'Bfrtip',
      buttons: ['excel']
    });

    $('#trekam').dataTable({
      dom: 'Bfrtip',
      // "bInfo": false,
      buttons: [{
        extend: 'excel',
        footer: true,
        exportOptions: {
          columns: [0,1,2,3,4,5]
        },
        filename: '<?php echo "Rekam Medis "; echo date('Y-m-d');?>'
      }]
    });

    $('#trekamobat').dataTable({
      dom: 'Bfrtip',
      // "bInfo": false,
      buttons: [{
        extend: 'excel',
        footer: true,
        exportOptions: {
          columns: [0,1,2,3,4,5,6,7,8]
          // columns: [0,1,2,3,4,5,6,7,8,9]
        },
        filename: '<?php echo "Rekam Medis Obat "; echo date('Y-m-d');?>'
      }]
    });

    $('#tpegawai').dataTable({
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excel',
        footer: true,
        exportOptions: {
          columns: [0,1]
        },
        filename: '<?php echo "Pegawai "; echo date('Y-m-d');?>'
      }]
    });

    $('#tobat').dataTable({
      dom: 'Bfrtip',
      paging: false,
      buttons: [{
        extend: 'excel',
        footer: true,
        exportOptions: {
          columns: [0,1,2,3,4,5,6]
        },
        filename: '<?php echo "Obat Tersedia "; echo date('Y-m-d');?>'
      }]
    });

    $('#tobatkeluar').dataTable({
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excel',
        footer: true,
        exportOptions: {
          columns: [0,1,2,3,4,5,6]
        },
        filename: '<?php echo "Obat Keluar "; echo date('Y-m-d');?>'
      }]
    });

    var table = $('#tkedaluwarsa').DataTable({
      dom: 'Bfrtip',
      buttons: [{
        extend: 'excel',
        footer: true,
        exportOptions: {
          columns: [0,1,2,3,4,5,6]
        },
        filename: '<?php echo "Obat Kedaluwarsa "; echo date('Y-m-d');?>'
      }],
      bFilter: false,
      "iDisplayLength": 5
    });

    $("#pilihObat").dataTable({
      // "fnDrawCallback": function (oSettings) {
      //   if ($('#readnews tr').length < 5) {
      //     $('.dataTables_paginate').hide();
      //   }
      // },

      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false,
      "iDisplayLength": 3,

    });

    function confirmDelete(url){
      $('#btn-delete').attr('href', url);
      $('#Modal_Delete').modal();
    }

    function confirmDeleteK(url){
      table.button('.buttons-excel').trigger();
      $('#btn-delete').attr('href', url);
      $('#Modal_Delete').modal();
    }

    function kurangiStok(url, jumlah){
      $('#stok').val(jumlah);
      $('#form-stok').attr('action', url);
      $('#Modal_Stok').modal();
      // $('#kurangi').focus();
    }

    function increaseValue() {
      var value = parseInt(document.getElementById('number').value, 10);
      value = parseFloat(document.getElementById('number').value.replace(/\D/g, ""));
      value = isNaN(value) ? 1 : value;
      value++;
      //   document.getElementById('number').value = parseInt(value).toLocaleString();
      document.getElementById('number').value = formatNumber(parseInt(value));
    }

    function decreaseValue() {
      var value = parseInt(document.getElementById('number').value, 10);
      value = parseFloat(document.getElementById('number').value.replace(/\D/g, ""));
      value = isNaN(value) ? 1 : value;
      value < 2 ? value = 2 : '';
      value--;
      //   document.getElementById('number').value = parseInt(value).toLocaleString();
      document.getElementById('number').value = formatNumber(parseInt(value));
    }

    function setFormat(id) {
      if (document.getElementById(id).value !== "") {
        var hasil = parseFloat(document.getElementById(id).value.replace(/\D/g, ""))
        .toString()
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        if(hasil == "NaN" || hasil===0){
          document.getElementById(id).value = 1;
        } else {
          document.getElementById(id).value = parseFloat(document.getElementById(id).value.replace(/\D/g, ""))
          .toString()
          .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
      } else {
        document.getElementById(id).value = '';
      }
    }

    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }

    $('#btnTambah').click(function(event){
      $("#modalObat").modal("show");
    });

    function simpanObat(id){
      var ido = $('#'+id).data("id");
      var nama = $('#'+id).data("namao");
      var jenis = $('#'+id).data("jeniso");
      var stok = $('#'+id).data("stok");
      var qty = $('#'+id+"-qty").val();

      var data = JSON.parse(window.datao);
      data.push({"id":ido, "nama":nama, "jenis":jenis, "qty":qty, "stok":stok});
      window.datao = JSON.stringify(data);
      showObat(window.datao);
      // $("#modalObat").modal("hide");
    }

    function showObat(data){
      var html = '';
      $("input[name='daftarobat']").val(data);
      data = JSON.parse(data);
      var panjang = 0;
      if(data!==window.undef){
        panjang = data.length;
      }
      for(var i=0; i < panjang; i++){
        html += '<tr><td>'+(i+1)+'</td><td>'+data[i].nama+'</td><td>'+data[i].jenis+'</td><td>'+data[i].qty+'</td>';
        html += '<td><a id="hapusObat" data-hapus="'+i+'" class="text text-xl-right text-danger"><i class="fa fa-remove"></i>&nbsp; Hapus</a></td></tr>';
      }
      $('#listObat').html(html);
    }

    $('#listObat').on('click','#hapusObat',function(){
        var id = $(this).data('hapus');
        var data = JSON.parse(window.datao);
        data.splice(id,1);
        window.datao = JSON.stringify(data);
        showObat(window.datao);
    });
    </script>
    <!--
    <footer>
    <div class="row">
    <div class="col-md-6">
    <p>Copyright &copy; 2019 Tutorial Republic</p>
  </div>
  <div class="col-md-6 text-md-right">
  <a href="#" class="text-dark">Terms of Use</a>
  <span class="text-muted mx-2">|</span>
  <a href="#" class="text-dark">Privacy Policy</a>
</div>
</div>
</footer> -->
</div>
</body>
</html>
