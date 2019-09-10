<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-cogs"></span> &ensp; Group Produk </h4>
    </div>
    <div class="box-body">
      <div class="col-md-8"> 
        <?php if(isset($edit)): ?>
        <form action="<?=site_url('Admin/Group-Produk/Simpan-Perubahan')?>" class="form" method="post">
        <input type="hidden" name="kode" value="<?=$edit->FK_GPR1?>">
        <input type="hidden" name="namaLama" value="<?=$edit->FN_GPR1?>">
        <?php else: ?>
        <form action="<?=site_url('Admin/Group-Produk/Tambah')?>" class="form" method="post">
        <?php endif;?>
          <div class="form-group">
            <label for="">Nama Group Produk : </label>
            <?php if(isset($edit)): ?>
            <input type="text" name="namaGroup" id="" class="form-control" value="<?=$edit->FN_GPR1?>" class="form-control" autofocus="" required="" maxlength="20" >
            <?php else: ?>
            <input type="text" name="namaGroup" id="" class="form-control" class="form-control" autofocus="" required="" maxlength="20" >
            <?php endif;?>
          </div>
          <div class="form-group"> 
            <?php if(isset($edit)): ?>
              <button type="submit" class="btn btn-success btn-flat" name="ed">
                <span class="fa fa-check"></span> Simpan Perubahan Group Produk
              </button>
              <a href="<?=site_url('Admin/Group-Produk')?>" class="btn btn-danger btn-flat">
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
              <th>Nama Group</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach ($dataGP->result() as $row) {
          ?>
            <tr>
              <td width="20%"><h5><?=$row->FK_GPR1?></h5></td>
              <td><h5><?=$row->FN_GPR1?></h5></td>
              <td width="15%" align="center"> 
                <a href="<?=site_url('Admin/Group-Produk/Edit/').$row->FK_GPR1?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data Group Produk">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Group-Produk/Hapus/').$row->FK_GPR1?>" onclick="return confirm('Hapus Data Produk ?')">
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