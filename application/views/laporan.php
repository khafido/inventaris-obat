<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Laporan Obat</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font-awesome.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/print.dataTables.min.css'?>">

  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
  <script src="<?php echo base_url().'assets/js/popper.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url().'assets/js/print.min.js' ?>"></script>
</head>
<body>
  <div class="container">
    <button onclick="printLap()" class="float-right mt-4" type="button" id="clickP" name="button">Print</button>
    <h1 class="text-center pt-2">Laporan Obat <?=$status?></h1>
    <div class="col-md-12 py-3"></div>
    <table class="table display mx-auto" id="print" class="print">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Nama</th>
          <th class="">Tgl Kedaluwarsa</th>
          <th class="text-right">Stok</th>
          <th>Jenis</th>
          <th>Letak</th>
        </tr>
      </thead>
      <tbody id="show_data">
        <?php for ($i=0; $i<50; $i++) {?>
          <?php foreach ($obat as $o) {?>
            <tr>
              <th><?=$o->obat_kode?></th>
              <th><?=$o->obat_nama?></th>
              <th class="text-left"><?=$o->obat_tglkedaluwarsa?></th>
              <th class="text-right"><?=$o->obat_jumlah?></th>
              <th><?=$o->jenis_nama?></th>
              <th><?=$o->letak_nama?></th>
            </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      <label class="float-right pt-2">dicetak tanggal :  <?php echo date("Y/m/d");?> <?=$status?></label>
      </div>
      <script type="text/javascript">
      // $(document).ready(function() {
      $('#print').dataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
      });
      //
      function printLap(){
        $('#print_filter').hide();
        $('#clickP').hide();
        window.print();
        $('#print_filter').show();
        $('#clickP').show();
      }
      // });
      </script>
    </body>
    </html>
