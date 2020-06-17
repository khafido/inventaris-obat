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
            <table class="table table-striped display" id="tobat">
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
                      <th>Tgl Input</th>
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
                        <th class="text-left"><?=$o->obat_tglkedaluwarsa?>&ensp;<span class="btn btn-warning btn-sm"><?="$hari Hari Lagi"?></span></span></th>
                        <th class="text-right"><?=$o->obat_jumlah?></th>
                        <th><?=$o->satuan_nama?></th>
                        <th><?=$o->jenis_nama?></th>
                        <th><?=$o->letak_nama?></th>
                        <th><?=$o->obat_tglinput?></th>
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
