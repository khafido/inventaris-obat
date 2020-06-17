<div class="container">
	<!-- Page Heading -->
    <div class="row">
        <div class="col-12 bg-light p-5 rounded">
            <div class="col-md-12">
                <h1>Daftar Pegawai
                    <!-- <small>List</small> -->
                    <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-success" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div> -->
                    <div class="float-right">
                      <a class="btn btn-success" href="<?=base_url()?>pegawai/form/tambah">Tambah Pegawai</a>
                    </div>
                </h1>
            </div>
						<div class="col-md-12 py-3"></div>
            <table class="table table-striped display" id="tpegawai">
                <thead>
                  <tr>
                      <!-- <th>Kode</th> -->
                      <th>#</th>
                      <th>Nama</th>
                      <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody id="show_data">
                  <?php $i=1; foreach ($pegawai as $p) {?>
                    <tr>
                        <th><?=$i?></th>
                        <th><?=$p->pegawai_nama?></th>
                        <th style="text-align: right;">
                          <a href="<?=base_url()?>pegawai/form/ubah/<?=$p->pegawai_id?>" class="btn btn-info btn-sm">Ubah</a>
                          <button onclick='confirmDelete("<?=base_url()?>pegawai/delete/<?=$p->pegawai_id?>")' class="btn btn-danger btn-sm">Hapus</button>
                        </th>
                    </tr>
                  <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
