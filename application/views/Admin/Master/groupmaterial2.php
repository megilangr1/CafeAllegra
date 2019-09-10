<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-cogs"></span> &ensp; Group Material Detail</h4>
    </div>
    <div class="box-body">
      <div class="col-md-8"> 
        <?php if(isset($edit)): ?>
        <form action="<?=site_url('Admin/Group-Material-Detail/Simpan-Perubahan')?>" class="form" method="post">
        <input type="hidden" name="gmat1" value="<?=$edit->FK_GMAT1?>">
        <input type="hidden" name="gmat2" value="<?=$edit->FK_GMAT2?>">
        <input type="hidden" name="namaLama" value="<?=$edit->FN_GMAT2?>">
        <?php else: ?>
        <form action="<?=site_url('Admin/Group-Material-Detail/Tambah')?>" class="form" method="post">
        <?php endif;?>
          <?php if(!isset($edit)): ?>
          <div class="form-group">
            <label for="">Group Material : </label> 
            <select name="gmat1" id="" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Group Material">
              <option></option>
              <?php foreach ($dataGM->result() as $rgp) {
                echo "<option value='$rgp->FK_GMAT1'>$rgp->FN_GMAT1</option>";
              }?>
            </select> 
          </div>  
          <?php else: ?>
          <div class="form-group">
            <label for="">Group Material : <?=$edit->FK_GMAT1?>  - (<?=$edit->FN_GMAT1?>)</label> 
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label for="">Nama Group Material Detail : </label>
            <?php if(isset($edit)): ?>
            <input type="text" name="nama" id="" class="form-control" value="<?=$edit->FN_GMAT2?>" class="form-control" required="" maxlength="20">
            <?php else: ?>
            <input type="text" name="nama" id="" class="form-control" class="form-control" required="" maxlength="20">
            <?php endif;?>
          </div>
          <div class="form-group"> 
            <?php if(isset($edit)): ?>
              <button type="submit" class="btn btn-success btn-flat" name="ed">
                <span class="fa fa-check"></span> Simpan Perubahan Group Material
              </button>
              <a href="<?=site_url('Admin/Group-Material-Detail')?>" class="btn btn-danger btn-flat">
                <span class="fa fa-times"></span> Batal Merubah Data
              </a>
            <?php else: ?>
              <button type="submit" class="btn btn-success btn-flat" name="sav">
                <span class="fa fa-plus"></span> Tambah Data Group Material
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
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Group Material</h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Group Material</th>
              <th>Kode Group Material Detail</th>
              <th>Nama Group</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($dataGMD->result() as $row) {
          ?>
            <tr>
              <td width="20%"><h5><?=$row->FK_GMAT1?></h5></td>
              <td width="15%"><h5><?=$row->FK_GMAT2?></h5></td>
              <td><h5><?=$row->FN_GMAT2?></h5></td>
              <td width="15%" align="center"> 
                <a href="<?=site_url('Admin/Group-Material-Detail/Edit/').$row->FK_GMAT1."/".$row->FK_GMAT2?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data Group Material">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Group-Material-Detail/Hapus/').$row->FK_GMAT1."/".$row->FK_GMAT2?>" onclick="return confirm('Hapus Data Material ?')">
                  <button class="btn btn-danger btn-flat" title="Hapus Data Group Material" >
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