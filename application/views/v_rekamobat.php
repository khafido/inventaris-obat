<div class="container">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-12 bg-light p-5 rounded">
      <div class="col-md-12">
        <h1>Detail Obat Keluar
          <!-- <small>List</small> -->
          <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div> -->
          <div class="float-right">
            <!-- <a class="btn btn-success" href="<?=base_url()?>rekam/form/tambah">Tambah Rekam Medis</a> -->
          </div>
        </h1>
      </div>
      <div class="col-md-12 py-3"></div>

      <br />
      <form class="col-md-12 form-inline" action="/inventaris-obat/rekam/customkeluar/detail_rekamobat/rekam_tgl" method="post">
        <?php if(isset($_POST['search'])){
          $s = $start;
          $e = $end;
          $m= ' / ';
        } else {
          $s = '';
          $e = '';
          $m = '';
        }
        ?>
        <div class="col-md-6 text-right">Tanggal Rekam : <b><?=$s?> <?=$m?> <?=$e?></b></div>
       <div class="input-daterange col-md-5 form-inline">
        <div class="col-md-6">
         <input type="text" name="start_date" id="start_date" class="form-control mr-4" required autocomplete="off"/>
        </div>
        <div class="col-md-6">
         <input type="text" name="end_date" id="end_date" class="form-control mr-4" required autocomplete="off"/>
        </div>
        </div>
        <div class="col-md-1">
          <input type="submit" name="search" id="search" value="Search" class="btn btn-info" />
        </div>
      </form>
      <br />
      <table class="table table-striped display" id="trekamobat">
        <thead>
          <tr>
            <!-- <th>Kode</th> -->
            <th>#</th>
            <th>Rekam ID</th>
            <th>Nama Pegawai</th>
            <th>Keluhan</th>
            <th>Diagnosa</th>
            <th>Tgl Rekam</th>
            <th>Nama Obat</th>
            <th>Letak Obat</th>
            <th>Jumlah</th>
            <!-- <th>Tgl Kedaluwarsa</th> -->
            <th></th>
          </tr>
        </thead>
        <tbody id="show_data">
          <?php $i=1; foreach ($rekam as $r) { ?>
            <tr style="font-weight:normal;">
              <th><?=$i?></th>
              <th><?=$r->rekam_id?></th>
              <th><?=$r->pegawai_nama?></th>
              <th style="white-space:pre-line;"><?=$r->rekam_keluhan?></th>
              <th><?=$r->rekam_diagnosa?></th>
              <th><?=$r->rekam_tgl?></th>
              <th><?=$r->obat_nama?></th>
              <th><?=$r->letak_nama?></th>
              <th><?=$r->keluar_jumlah?></th>
              <!-- <th><?php//$r->obat_tglkedaluwarsa?></th> -->
              <th>
                <button onclick='confirmDelete("<?=base_url()?>rekam/deletek/<?=$r->rekam_id?>/<?=$r->keluar_obatid?>")' class="btn btn-danger btn-sm">Hapus</button>
              </th>
            </tr>
          <?php
              $i++;
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div class="modal fade" id="tampilObat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:500px; overflow-y: auto;">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Daftar Obat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped display">
            <thead>
              <tr>
                <th style="font-weight:bold;">#</th>
                <th style="font-weight:bold;">Nama</th>
                <th style="font-weight:bold;">Letak</th>
                <th style="font-weight:bold;">Qty</th>
              </tr>
            </thead>
            <tbody id="lObat">
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <!-- <button type="button" id="btn-pilih" class="btn btn-success">Selesai</a> -->
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function tampilObat(id){
    var html = '';
    var data = $('#'+id).data("obat");
    console.log(data);
    for (var i = 0; i < data.length; i++) {
      html += '<tr><th>'+(i+1)+'</th><th>'+data[i].obat_nama+'</th><th>'+data[i].letak_nama+'</th><th>'+data[i].keluar_jumlah+'</th></tr>';
    }
    $('#lObat').html(html);
    $("#tampilObat").modal("show");
  }
  </script>
