<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-cubes"></span> &ensp; Master Material </h4>
    </div>
    <div class="box-body">
      <div class="col-md-12"> 
        <?php if(isset($edit)): ?>
        <form action="<?=site_url('Admin/Material/Simpan-Perubahan')?>" method="post" class="form">
        <input type="hidden" name="kode" value="<?=$edit['material']->FK_MAT?>">
        <input type="hidden" name="namaLama" value="<?=$edit['material']->FN_MAT?>" >
        <?php else: ?>
        <form action="<?=site_url('Admin/Material/Tambah')?>" method="post" class="form">
        <?php endif; ?>
          <div class="col-md-6">     
            <?php if(isset($edit)): ?>
            <div class="form-group">
              <label for="">Group Material : <?=$edit['gmat1']->FK_GMAT1?> - <?=$edit['gmat1']->FN_GMAT1?> </label>
              <br>
              <label for="">Group Material Detail : <?=$edit['gmat2']->FN_GMAT2?></label>
            </div>
            <?php else: ?>
            <div class="form-group">
              <label for="">Group Material</label>
              <select name="gmat1" id="gmat1" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Group Material" required="" autofocus="">
                <option value=""></option>
                <?php 
                foreach ($dataGM->result() as $gp) {
                ?>  
                <?php 
                echo "<option value='$gp->FK_GMAT1'> $gp->FN_GMAT1 - $gp->FK_GMAT1 </option>";
                }
                ?>
              </select>
            </div>   
            <div class="form-group">
              <label for="">Group Material Detail</label>
              <select name="gmat2" id="gmat2" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Group Material Detail" required="">
                <option value=""></option>
              </select> 
            </div>
            <?php endif; ?> 
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label for="">Nama Material</label>
              <?php if(isset($edit)): ?>
              <input type="text" name="nama" id="" class="form-control" placeholder="Nama Material" required="" value="<?=$edit['material']->FN_MAT?>">
              <?php else: ?>
              <input type="text" name="nama" id="" class="form-control" placeholder="Nama Material" required="" maxlength="50">
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="">Satuan Material</label>
              <?php if(isset($edit)): ?>
              <input type="text" name="satuan" id="" class="form-control" placeholder="Satuan Material" required="" value="<?=$edit['material']->FSAT?>" maxlength="6">
              <?php else: ?>
              <input type="text" name="satuan" id="" class="form-control" placeholder="Satuan Material" required="" maxlength="6">
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-2"> 
            <div class="form-group">
              <label for="">Stok Min</label>
              <?php if(isset($edit)): ?>
              <input type="number" name="min" id="" class="form-control" required="" min="0" placeholder="0" value="<?=$edit['material']->FSTOK_MIN?>">
              <?php else: ?>
              <input type="number" name="min" id="" class="form-control" required="" min="0" placeholder="0">
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-2"> 
            <div class="form-group">
              <label for="">Stok Max</label>
              <?php if(isset($edit)): ?>
              <input type="number" name="max" id="" class="form-control" required="" min="0" placeholder="0" value="<?=$edit['material']->FSTOK_MAX?>">
              <?php else: ?>
              <input type="number" name="max" id="" class="form-control" required="" min="0" placeholder="0">
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-12">
            <?php if(isset($edit)): ?>
            <button type="submit" class="btn btn-success btn-flat" name="ed">
              <span class="fa fa-check"></span> Simpan Perubahan
            </button>
            <a href="<?=site_url('Admin/Material')?>" class="btn btn-danger btn-flat">
              <span class="fa fa-times"></span> Batal Melakukan Perubahan
            </a>
            <?php else:?>
            <button type="submit" class="btn btn-success btn-flat" name="sav">
              <span class="fa fa-plus"></span> Tambah Data Material
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
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Material </h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Material</th>
              <th>Nama Material</th>
              <th>Satuan</th>
              <th>Stok Min</th>
              <th>Stok Max</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($dataMaterial->result() as $dp) {
          ?>
            <tr>
              <td><h5><?=$dp->FK_MAT?></h5></td>
              <td><h5><?=$dp->FN_MAT?></h5></td>
              <td><h5><?=$dp->FSAT?></h5></td>
              <td><h5><?=$dp->FSTOK_MIN?></h5></td>
              <td><h5><?=$dp->FSTOK_MAX?></h5></td>
              <td width="10%" align="center">
                <a href="<?=site_url('Admin/Material/Edit/').$dp->FK_MAT?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Material/Hapus/').$dp->FK_MAT?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut ?');">
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
    $('#gmat1').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "<?=site_url('Material/detailGM')?>",
        method: "POST",
        data: {id: id},
        async: true,
        dataType: 'json',
        success: function(data){
          var option = '';
          var i;
          for (let i = 0; i < data.length; i++) {
            option += '<option value='+data[i].FK_GMAT2+'>'+data[i].FN_GMAT2+'</option>';
          }
          $('#gmat2').html(option);
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