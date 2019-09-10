<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-cogs"></span> &ensp; Group Produk Detail</h4>
    </div>
    <div class="box-body">
      <div class="col-md-8"> 
        <?php if(isset($edit)): ?>
        <form action="<?=site_url('Admin/Group-Produk-Detail/Simpan-Perubahan')?>" class="form" method="post">
        <input type="hidden" name="gpr1" value="<?=$edit->FK_GPR1?>">
        <input type="hidden" name="gpr2" value="<?=$edit->FK_GPR2?>">
        <input type="hidden" name="namaLama" value="<?=$edit->FN_GPR2?>">
        <?php else: ?>
        <form action="<?=site_url('Admin/Group-Produk-Detail/Tambah')?>" class="form" method="post">
        <?php endif;?>
          <?php if(!isset($edit)): ?>
          <div class="form-group">
            <label for="">Group Produk : </label> 
            <select name="groupProduk" id="" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Group Produk">
              <option></option>
              <?php foreach ($dataGP->result() as $rgp) {
                echo "<option value='$rgp->FK_GPR1'>$rgp->FN_GPR1</option>";
              }?>
            </select> 
          </div>  
          <?php else: ?>
          <div class="form-group">
            <label for="">Group Produk : <?=$edit->FK_GPR1?>  - (<?=$edit->FN_GPR1?>)</label> 
          </div>
          <?php endif; ?>
          <div class="form-group">
            <label for="">Nama Group Produk Detail : </label>
            <?php if(isset($edit)): ?>
            <input type="text" name="namaGroupDetail" id="" class="form-control" value="<?=$edit->FN_GPR2?>" class="form-control" required="" maxlength="20">
            <?php else: ?>
            <input type="text" name="namaGroupDetail" id="" class="form-control" class="form-control" required="" maxlength="20">
            <?php endif;?>
          </div>
          <div class="form-group"> 
            <?php if(isset($edit)): ?>
              <button type="submit" class="btn btn-success btn-flat" name="ed">
                <span class="fa fa-check"></span> Simpan Perubahan Group Produk
              </button>
              <a href="<?=site_url('Admin/Group-Produk-Detail')?>" class="btn btn-danger btn-flat">
                <span class="fa fa-times"></span> Batal Merubah Data
              </a>
            <?php else: ?>
              <button type="submit" class="btn btn-success btn-flat" name="sav">
                <span class="fa fa-plus"></span> Tambah Data Group Produk
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
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Group Produk</h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Group Produk</th>
              <th>Kode Group Produk Detail</th>
              <th>Nama Group</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($dataGPD->result() as $row) {
          ?>
            <tr>
              <td width="20%"><h5><?=$row->FK_GPR1?></h5></td>
              <td width="15%"><h5><?=$row->FK_GPR2?></h5></td>
              <td><h5><?=$row->FN_GPR2?></h5></td>
              <td width="15%" align="center"> 
                <a href="<?=site_url('Admin/Group-Produk-Detail/Edit/').$row->FK_GPR1."/".$row->FK_GPR2?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data Group Produk">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Group-Produk-Detail/Hapus/').$row->FK_GPR1."/".$row->FK_GPR2?>" onclick="return confirm('Hapus Data Produk ?')">
                  <button class="btn btn-danger btn-flat" title="Hapus Data Group Produk" >
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