<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12 bg-light p-5 rounded">
            <div class="col-md-12">
                <h1><?=$title?>
                    <!-- <small>List</small> -->
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div> -->
                    <div class="float-right">
                      <a class="btn btn-success" href="<?=base_url()?>obat/form/tambah">Tambah Obat</a>
                    </div>
                </h1>
            </div>
						<div class="col-md-12 py-3"></div>
            <br />
            <form class="col-md-12 form-inline" action="/inventaris-obat/obat/custom/detail_obatkeluar/rekam_tgl" method="post">
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
              <div class="col-md-6 text-right">Tanggal Keluar : <b><?=$s?> <?=$m?> <?=$e?></b></div>
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
            <table class="table table-striped display" id="tobatkeluar">
                <thead>
                  <tr>
                      <!-- <th>Kode</th> -->
                      <th>#</th>
                      <th>Nama</th>
                      <th class="">Tgl Kedaluwarsa</th>
                      <th class="text-right">Jumlah</th>
                      <th>Satuan</th>
                      <th>Jenis</th>
                      <th>Letak</th>
                      <th>Tgl Keluar</th>
                      <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody id="show_data">
                  <?php $i=1; foreach ($obat as $o) {?>
                    <?php
                      $now = new DateTime();
                      $kedaluwarsa = strtotime($o->obat_tglkedaluwarsa);
                      //
                      $selisih =$kedaluwarsa - time();
                      $hari = floor($selisih / (60 * 60 * 24));
                    ?>
                    <tr>
                        <!-- <th><?=$o->obat_kode?></th> -->
                        <th><?=$i?></th>
                        <th><?=$o->obat_nama?></th>
                      <th class="text-left"><?=$o->obat_tglkedaluwarsa?>&ensp;<?php if($hari>=0){?><span class="btn btn-warning btn-sm"><?="$hari Hari Lagi"?></span><?php } ?></th>
                        <th class="text-right"><?=$o->obat_jumlah?></th>
                        <th><?=$o->satuan_nama?></th>
                        <th><?=$o->jenis_nama?></th>
                        <th><?=$o->letak_nama?></th>
                        <th><?=$o->rekam_tgl?></th>
                        <th style="text-align: right;">
                          <a href="<?=base_url()?>obat/form/ubah/<?=$o->obat_kode?>" class="btn btn-info btn-sm">Ubah</a>
                          <button onclick='confirmDelete("<?=base_url()?>obat/delete/<?=$o->obat_kode?>")' class="btn btn-danger btn-sm">Hapus</button>
                        </th>
                    </tr>
                  <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
