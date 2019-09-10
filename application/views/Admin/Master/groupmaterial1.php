<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-houzz"></span> &ensp; Group Material</h4>
    </div>
    <div class="box-body">
      <?php if(isset($edit)) :?>
      <form action="<?=site_url('Admin/Group-Material/Simpan-Perubahan')?>" method="post" class="form">
      <input type="hidden" name="kode" value="<?=$edit->FK_GMAT1?>">
      <input type="hidden" name="namaLama" value="<?=$edit->FN_GMAT1?>">
      <?php else: ?>
      <form action="<?=site_url('Admin/Group-Material/Tambah')?>" method="post" class="form">
      <?php endif;?>
        <div class="col-md-8">
          <div class="form-group">
            <label for="">Nama Group Material : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="nama" id="nama" required="" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FN_GMAT1?>">
            <?php else: ?>
            <input type="text" name="nama" id="nama" required="" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
          <div class="form-group">
            <?php if(isset($edit)): ?>
            <button type="submit" class="btn btn-success btn-flat" name="ed">
              <span class="fa fa-check"></span> Simpan Perubahan
            </button>
            <a href="<?=site_url('Admin/Group-Material')?>" class="btn btn-danger btn-flat">
              <span class="fa fa-undo"></span> Batalkan Perubahan Data
            </a>
            <?php else: ?>
            <button type="submit" class="btn btn-success btn-flat" name="sav">
              <span class="fa fa-plus"></span> Tambah Data Group Material
            </button>
            <button type="reset" class="btn btn-danger btn-flat">
              <span class="fa fa-times"></span> Reset Input
            </button>
            <?php endif;?>
          </div>
        </div>
      </form>
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
        <table class="table table-striped table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Material</th>
              <th>Nama Material</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          foreach ($dataGM->result() as $row) {
          ?>
            <tr>
              <td width="15%"><h5><?=$row->FK_GMAT1?></h5></td>
              <td><h5><?=$row->FN_GMAT1?></h5></td>
              <td width="10%" align="center">
                <a href="<?=site_url('Admin/Group-Material/Edit/').$row->FK_GMAT1?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Group-Material/Hapus/').$row->FK_GMAT1?>">
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