<div class="container">
  <div class="panel panel-primary mx-auto">
    <div class="panel-body">
      <?php
      $action = $this->uri->segment(3);
      echo form_open(base_url("rekam/tambah"))
      ?>
      <div class="row mx-auto col-md-8 bg-light rounded py-3">
        <h2 class="mx-auto" style="text-transform:capitalize;">Tambah Rekam Medis</h2>
        <div class="col-md-12 bg-dark mb-3"></div>
      <div class="form-group col-md-12">
        <label class="">Nama Pegawai</label>
        <input oninput="setNilai(this.id)" name="pnama" type="text" list="lpegawai" id="pegawai" class="form-control" placeholder="Nama Pegawai" value="" required autocomplete="off"/>
        <datalist id="lpegawai">
          <?php foreach ($pegawai as $n) {
            echo "<option data-value='$n->pegawai_id'>$n->pegawai_nama</option>";
          } ?>
        </datalist>
        <input type="hidden" name="pegawai" id="pegawai-hidden" value="0">
      </div>
      <div class="form-group col-md-6">
        <label class="">Keluhan :</label>
        <textarea name="keluhan" class="form-control" placeholder=" Masukkan Keluhan" rows="5"></textarea>
      </div>
      <div class="form-group col-md-6">
        <label class="">Diagnosa :</label>
        <textarea name="diagnosa" class="form-control" placeholder=" Masukkan Diagnosa" rows="5"></textarea>
      </div>

      <div class="form-group col-md-6">
        <label class="">Tanggal Rekam</label>
        <input type="date" name="tglinput" id="tglinput" class="form-control" required autocomplete="off"/>
      </div>
      <div class="form-group col-md-12">
        <label for="text">Daftar Obat :</label>
        <button style="float:right;" type="button" id="btnTambah" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp; Obat</button>
        <div class="col-md-12 table-responsive pt-3">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jenis Obat</th>
                <th scope="col">Qty</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="listObat">
            </tbody>
          </table>
        </div>
      </div>
      <div class="form-group col-md-12 pull-right">
        <input type="hidden" name="daftarobat">
        <button id="pasang" type="submit" class="btn btn-success btn-block">Simpan</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>


<div class="modal fade" id="modalObat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:500px; overflow-y: auto;">
  <div class="modal-dialog modal-lg" role="document" style="width:900px;">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <table class="table table-striped display" id="pilihObat">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th class="">Tgl Kedaluwarsa</th>
              <th>Satuan</th>
              <th>Jenis</th>
              <th>Letak</th>
              <th>Stok</th>
              <th>Berkurang</th>
              <th class="text-right"></th>
            </tr>
          </thead>
          <tbody id="show_data">
            <?php $i=1; foreach ($listobat as $o) {?>
              <?php
                $now = new DateTime();
                $kedaluwarsa = strtotime($o->obat_tglkedaluwarsa);
                //
                $selisih =$kedaluwarsa - time();
                $hari = floor($selisih / (60 * 60 * 24));
              ?>
              <tr>
                <th><?=$i?></th>
                <th><?=$o->obat_nama?></th>
                <th class="text-left"><?=$o->obat_tglkedaluwarsa?>&ensp;<span class="btn btn-danger btn-sm"><?="$hari Lagi"?></span></span></th>
                <th><?=$o->satuan_nama?></th>
                <th><?=$o->jenis_nama?></th>
                <th><?=$o->letak_nama?></th>
                <th><?=$o->obat_jumlah?></th>
                <th><input type="number" id="obat<?=$i?>-qty" name="jumlah" onclick="select()" class="form-control text-center" min="1" value="1" required autocomplete="off"/></th>
                <th style="text-align: right;">
                  <!-- <button onclick='kurangiStok("obat/decStok/<?=$o->obat_kode?>", <?=$o->obat_jumlah?>)' class="btn btn-warning btn-sm">Kurangi Stok</button> -->
                  <button id="obat<?=$i?>" data-id="<?=$o->obat_kode?>" data-namao="<?=$o->obat_nama?>" data-stok="<?=$o->obat_jumlah?>" data-jeniso="<?=$o->jenis_nama?>" onclick="simpanObat(this.id)" class="btn btn-info btn-sm">Pilih</button>
                  <!-- <button onclick='confirmDelete("<?=base_url()?>obat/delete/<?=$o->obat_kode?>")' class="btn btn-danger btn-sm">Hapus</button> -->
                </th>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Selesai</button>
          <!-- <button type="button" id="btn-pilih" class="btn btn-success">Selesai</a> -->
          </div>
        </div>
      </div>
    </div>

<script type="text/javascript">
setNilai('pegawai');

function setNilai(id){
  document.getElementById(id).addEventListener('input', function(e) {
    var input = e.target,
    list = input.getAttribute('list'),
    options = document.querySelectorAll('#' + list + ' option'),
    hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
    inputValue = input.value;

    hiddenInput.value = inputValue;

    for(var i = 0; i < options.length; i++) {
      var option = options[i];

      if(option.innerText === inputValue) {
        hiddenInput.value = option.getAttribute('data-value');
        console.log(option.getAttribute('data-value'));
        break;
      } else {
        hiddenInput.value = 0;
      }
    }
  });
}
</script>
