<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12 bg-light p-5 rounded">
            <div class="col-md-12">
                <h1>Daftar Obat Kedaluwarsa
                    <!-- <small>List</small> -->
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div> -->
                    <div class="float-right">
                      <button class="btn btn-danger" onclick='confirmDeleteK("<?=base_url()?>obat/hpsKedaluwarsa")'>Hapus Semua Obat</button>
                    </div>
                </h1>
            </div>
						<div class="col-md-12 py-3"></div>
            <table class="table table-striped" id="tkedaluwarsa">
                <thead>
                  <tr>
                      <th>#</th>
                      <!-- <th>Kode</th> -->
                      <th>Nama</th>
                      <th class="">Tgl Kedaluwarsa</th>
                      <th class="text-right">Stok</th>
                      <th>Satuan</th>
                      <th>Jenis</th>
                      <th>Letak</th>
                      <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody id="show_data">
                  <?php $i=1; foreach ($obat as $o) {?>
                    <tr>
                        <th><?=$i?></th>
                        <th><?=$o->obat_nama?></th>
                        <th class="text-left"><?=$o->obat_tglkedaluwarsa?></th>
                        <th class="text-right"><?=$o->obat_jumlah?></th>
                        <th><?=$o->satuan_nama?></th>
                        <th><?=$o->jenis_nama?></th>
                        <th><?=$o->letak_nama?></th>
                        <th style="text-align: right;">                          
                          <button onclick='confirmDelete("<?=base_url()?>obat/delete/<?=$o->obat_kode?>")' class="btn btn-danger btn-sm">Hapus</button>
                        </th>
                    </tr>
                  <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
