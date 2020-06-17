<div class="container">
  <div class="panel panel-primary mx-auto">
    <div class="panel-body">
      <?php
      $action = $this->uri->segment(3);
      echo form_open(base_url("obat/$action"))
      ?>
      <div class="row mx-auto col-md-5 bg-light rounded py-3">
        <h2 class="mx-auto" style="text-transform:capitalize;"><?=$action?> Obat</h2>
        <div class="col-md-12 bg-dark mb-3"></div>
        <!-- <div class="form-group col-md-12">
        <label class="">Kode Obat</label>
        <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode Obat" value="<?php echo ($obat)?$obat->obat_kode:null?>" required/>
      </div> -->
      <div class="form-group col-md-12">
        <label class="">Nama Obat</label>
        <input type="text" list="lnama" name="namao" id="namao" class="form-control" placeholder="Nama Obat" value="<?php echo ($obat)?$obat->obat_nama:null?>" required autocomplete="off"/>
        <datalist id="lnama">
          <?php foreach ($list as $n) {
            echo "<option>$n->obat_nama</option>";
          } ?>
        </datalist>
      </div>
      <div class="form-group col-md-12">
        <label class="">Tanggal Kedaluwarsa</label>
        <input type="date" name="kedaluwarsa" id="kedaluwarsa" class="form-control" placeholder="Tgl Kedaluwarsa" value="<?php echo ($obat)?$obat->obat_tglkedaluwarsa:null?>" required autocomplete="off"/>
      </div>
      <div class="form-group col-md-12">
        <label class="">Jenis</label>
        <input oninput="setNilai(this.id)" name="jnama" type="text" list="ljenis" id="jenis" class="form-control" placeholder="Jenis Obat" value="<?php echo ($obat)?$obat->jenis_nama:null?>" required autocomplete="off"/>
        <datalist id="ljenis" readonly>
          <?php foreach ($jenis as $n) {
            echo "<option data-value='$n->jenis_id'>$n->jenis_nama</option>";
          } ?>
        </datalist>
        <input type="hidden" name="jenis" id="jenis-hidden" value="<?php echo ($obat)?$obat->obat_jenis:0?>">
      </div>
      <div class="form-group col-md-12">
        <label class="">Satuan</label>
        <input oninput="setNilai(this.id)" name="snama" type="text" list="lsatuan" id="satuan" class="form-control" placeholder="Satuan Obat" value="<?php echo ($obat)?$obat->satuan_nama:null?>" required autocomplete="off"/>
        <datalist id="lsatuan">
          <?php foreach ($satuan as $n) {
            echo "<option data-value='$n->satuan_id'>$n->satuan_nama</option>";
          } ?>
        </datalist>
        <input type="hidden" name="satuan" id="satuan-hidden" value="<?php echo ($obat)?$obat->obat_satuan:0?>">
      </div>
      <div class="form-group col-md-6">
        <label class="">Jumlah Obat</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="value-button form-control btn-secondary" id="decrease" onclick="decreaseValue()" value="Decrease Value">&nbsp;-&nbsp;</div>
          </div>
          <input type="text" id="number" name="jumlah" onclick="select()" oninput="setFormat(this.id)" class="form-control text-center" value="<?php echo ($obat)?$obat->obat_jumlah:1?>" required/>
          <div class="input-group-append">
            <div class="value-button form-control btn-secondary" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
          </div>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label class="">Letak</label>
        <input oninput="setNilai(this.id)" name="lnama" type="text" list="lletak" id="letak" class="form-control" placeholder="Letak Obat" value="<?php echo ($obat)?$obat->letak_nama:null?>" required autocomplete="off"/>
        <datalist id="lletak">
          <?php foreach ($letak as $n) {
            echo "<option data-value='$n->letak_id'>$n->letak_nama</option>";
          } ?>
        </datalist>
        <input type="hidden" name="letak" id="letak-hidden" value="<?php echo ($obat)?$obat->obat_letak:0?>">
      </div>
      <div class="form-group col-md-12">
        <label class="">Tanggal Input</label>
        <input type="date" name="tglinput" id="tglinput" class="form-control" value="<?php echo ($obat)?$obat->obat_tglinput:null?>" required autocomplete="off"/>
      </div>
      <div class="form-group col-md-12 pull-right">
        <input type="hidden" name="id" value="<?php echo ($obat)?$obat->obat_kode:0; ?>">
        <button id="pasang" type="submit" class="btn btn-success btn-block">Simpan</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<script type="text/javascript">
// $(document).ready( function() {
  // $('#tglinput').val();

setNilai('jenis');
setNilai('letak');
setNilai('satuan');

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
// });​
</script>
