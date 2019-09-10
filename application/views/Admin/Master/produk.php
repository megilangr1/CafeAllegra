<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-cubes"></span> &ensp; Master Produk </h4>
    </div>
    <div class="box-body">
      <div class="col-md-12"> 
        <?php if(isset($edit)): ?>
        <form action="<?=site_url('Admin/Produk/Simpan-Perubahan')?>" method="post" class="form">
        <input type="hidden" name="kode" value="<?=$edit['produk']->FK_BPR?>">
        <input type="hidden" name="namaLama" value="<?=$edit['produk']->FN_BPR?>" >
        <?php else: ?>
        <form action="<?=site_url('Admin/Produk/Tambah')?>" method="post" class="form">
        <?php endif; ?>
          <div class="col-md-6">     
            <?php if(isset($edit)): ?>
            <div class="form-group">
              <label for="">Group Produk : <?=$edit['gpr1']->FK_GPR1?> - <?=$edit['gpr1']->FN_GPR1?> </label>
              <br>
              <label for="">Group Produk Detail : <?=$edit['gpr2']->FN_GPR2?></label>
            </div>
            <?php else: ?>
            <div class="form-group">
              <label for="">Group Produk</label>
              <select name="gpr1" id="gpr1" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Group Produk" required="">
                <option value=""></option>
                <?php 
                foreach ($dataGP->result() as $gp) {
                ?>  
                <?php 
                echo "<option value='$gp->FK_GPR1'> $gp->FN_GPR1 - $gp->FK_GPR1 </option>";
                }
                ?>
              </select>
            </div>   
            <div class="form-group">
              <label for="">Group Produk Detail</label>
              <select name="gpr2" id="gpr2" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Group Produk Detail" required="">
                <option value=""></option>
              </select> 
            </div>
            <?php endif; ?> 
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label for="">Nama Produk</label>
              <?php if(isset($edit)): ?>
              <input type="text" name="nama" id="" class="form-control" placeholder="Nama Produk" required="" value="<?=$edit['produk']->FN_BPR?>">
              <?php else: ?>
              <input type="text" name="nama" id="" class="form-control" placeholder="Nama Produk" required="" maxlength="50">
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="">Satuan Produk</label>
              <?php if(isset($edit)): ?>
              <input type="text" name="satuan" id="" class="form-control" placeholder="Satuan Produk" required="" value="<?=$edit['produk']->FSAT?>" maxlength="6">
              <?php else: ?>
              <input type="text" name="satuan" id="" class="form-control" placeholder="Satuan Produk" required="" maxlength="6">
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-5">
            <div class="input-group">
              <label for="">Harga Produk</label> 
            </div> 
            <div class="input-group">
              <span class="input-group-addon">Rp. </span>
              <?php if(isset($edit)): ?>
              <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga Produk" required="" value="<?=number_format($edit['produk']->FHARGA, 0, '.', ',')?>">
              <?php else: ?>
              <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga Produk" required="">
              <?php endif; ?>
            </div> 
          </div>
          <div class="col-md-12">
            <?php if(isset($edit)): ?>
            <button type="submit" class="btn btn-success btn-flat" name="ed">
              <span class="fa fa-check"></span> Simpan Perubahan
            </button>
            <a href="<?=site_url('Admin/Produk')?>" class="btn btn-danger btn-flat">
              <span class="fa fa-times"></span> Batal Melakukan Perubahan
            </a>
            <?php else:?>
            <button type="submit" class="btn btn-success btn-flat" name="sav">
              <span class="fa fa-plus"></span> Tambah Data Produk
            </button>
            <button type="reset" class="btn btn-danger btn-flat">
              <span class="fa fa-undo"></span> Reset Input
            </button>
            <?php endif;?>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Produk </h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Satuan</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($dataProduk->result() as $dp) {
          ?>
            <tr>
              <td><h5><?=$dp->FK_BPR?></h5></td>
              <td><h5><?=$dp->FN_BPR?></h5></td>
              <td><h5><?=$dp->FSAT?></h5></td>
              <td><h5>Rp. <?=number_format($dp->FHARGA, 0, ",", ".")?></h5></td>
              <td width="10%" align="center">
                <a href="<?=site_url('Admin/Produk/Edit/').$dp->FK_BPR?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Produk/Hapus/').$dp->FK_BPR?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut ?');">
                  <button class="btn btn-danger btn-flat" title="Hapus Data">
                    <span class="fa fa-trash"></span>
                  </button>
                </a>
              </td>
            </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url('jquery/jquery-3.3.1.js')?>"></script>
<script>
  $(document).ready(function(){
    $('#gpr1').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "<?=site_url('Produk/detailGP')?>",
        method: "POST",
        data: {id: id},
        async: true,
        dataType: 'json',
        success: function(data){
          var option = '';
          var i;
          for (let i = 0; i < data.length; i++) {
            option += '<option value='+data[i].FK_GPR2+'>'+data[i].FN_GPR2+'</option>';
          }
          $('#gpr2').html(option);
        } 
      });
    });

    $("#harga").on('keyup', function(){ 
      var n = parseInt($(this).val().replace(/\D/g,''),10);
      $(this).val(n.toLocaleString());
      //do something else as per updated question 
    });
  });
</script>