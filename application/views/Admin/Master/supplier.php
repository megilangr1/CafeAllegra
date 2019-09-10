<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-users"></span> &ensp; Supplier</h4>
    </div>
    <div class="box-body">
      <?php if(isset($edit)) :?>
      <form action="<?=site_url('Admin/Supplier/Simpan-Perubahan')?>" method="post" class="form">
      <input type="hidden" name="kode" value="<?=$edit->FK_SUP?>">
      <input type="hidden" name="namaLama" value="<?=$edit->FNA_SUP?>">
      <?php else: ?>
      <form action="<?=site_url('Admin/Supplier/Tambah')?>" method="post" class="form">
      <?php endif;?>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Nama Supplier : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="nama" id="nama" required="" placeholder="Nama Supplier" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FNA_SUP?>" >
            <?php else: ?>
            <input type="text" name="nama" id="nama" required="" placeholder="Nama Supplier" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label for="">Alamat Supplier : </label>
            <?php if(isset($edit)) :?> 
              <textarea name="alamat" id="" class="form-control" maxlength="100" required="" placeholder="Alamat Supplier" rows="4"><?=$edit->FALAMAT?></textarea>
            <?php else: ?>
              <textarea name="alamat" id="" class="form-control" maxlength="100" required="" placeholder="Alamat Supplier" rows="4"></textarea>
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Kota : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="kota" id="kota" required="" placeholder="Kota Supplier" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FKOTA?>">
            <?php else: ?>
            <input type="text" name="kota" id="kota" required="" placeholder="Kota Supplier" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">No. Telfon : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="telp" id="telp" required="" placeholder="Nomor Telfon Supplier" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FTEL?>">
            <?php else: ?>
            <input type="text" name="telp" id="telp" required="" placeholder="Nomor Telfon Supplier" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Contact Person : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="cp" id="cp" required="" placeholder="Contact Person Supplier" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FCP?>">
            <?php else: ?>
            <input type="text" name="cp" id="cp" required="" placeholder="Contact Person Supplier" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Lama Bayar : </label>
            <?php if(isset($edit)) :?>
            <input type="number" name="lamaBayar" id="lamaBayar" min="0" required="" placeholder="Lama Bayar" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FLAMA_BAYAR?>">
            <?php else: ?>
            <input type="number" name="lamaBayar" id="lamaBayar" min="0" required="" placeholder="Lama Bayar" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Penerima : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="penerima" id="penerima" required="" placeholder="Penerima" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FPENERIMA?>">
            <?php else: ?>
            <input type="text" name="penerima" id="penerima" required="" placeholder="Penerima" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Bank : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="bank" id="bank" required="" placeholder="Bank Supplier" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FBANK?>">
            <?php else: ?>
            <input type="text" name="bank" id="bank" required="" placeholder="Bank Supplier" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="">No Account : </label>
            <?php if(isset($edit)) :?>
            <input type="text" name="noacc" id="noacc" required="" placeholder="Nomor Account" autofocus="" class="form-control" maxlength="20" value="<?=$edit->FNO_ACC?>">
            <?php else: ?>
            <input type="text" name="noacc" id="noacc" required="" placeholder="Nomor Account" autofocus="" class="form-control" maxlength="20">
            <?php endif;?>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="form-group">
            <?php if(isset($edit)): ?>
            <button type="submit" class="btn btn-success btn-flat" name="ed">
              <span class="fa fa-check"></span> Simpan Perubahan
            </button>
            <a href="<?=site_url('Admin/Supplier')?>" class="btn btn-danger btn-flat">
              <span class="fa fa-undo"></span> Batalkan Perubahan Data
            </a>
            <?php else: ?>
            <button type="submit" class="btn btn-success btn-flat" name="sav">
              <span class="fa fa-plus"></span> Tambah Data Supplier
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
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Supplier</h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Supplier</th>
              <th>Nama Supplier</th>
              <th>Alamat Supplier</th>
              <th>Kota</th>
              <th>Telfon</th>
              <th>CP</th>
              <th>Lama Bayar</th>
              <th>Penerima</th>
              <th>Bank</th>
              <th>No. Acc</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          foreach ($dataS->result() as $row) {
          ?>
            <tr>
              <td width="5%"><h5><?=$row->FK_SUP?></h5></td>
              <td><h5><?=$row->FNA_SUP?></h5></td>
              <td><h5><?=$row->FALAMAT?></h5></td>
              <td><h5><?=$row->FKOTA?></h5></td>
              <td><h5><?=$row->FTEL?></h5></td>
              <td><h5><?=$row->FCP?></h5></td>
              <td><h5><?=$row->FLAMA_BAYAR?></h5></td>
              <td><h5><?=$row->FPENERIMA?></h5></td>
              <td><h5><?=$row->FBANK?></h5></td>
              <td><h5><?=$row->FNO_ACC?></h5></td>
              <td width="10%" align="center">
                <a href="<?=site_url('Admin/Supplier/Edit/').$row->FK_SUP?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Supplier/Hapus/').$row->FK_SUP?>">
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