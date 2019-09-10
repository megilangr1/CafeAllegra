<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-cubes"></span> &ensp; Master Barang </h4>
    </div>
    <div class="box-body">
      <div class="col-md-12">  
        <?php if(isset($edit)): ?>
        <form action="<?=site_url('Admin/Barang/Simpan-Perubahan')?>" class="form" method="post">
        <input type="hidden" name="kode" value="<?=$edit->FK_BRG?>">
        <input type="hidden" name="namaLama" value="<?=$edit->FN_BRG?>">
        <?php else: ?>
        <form action="<?=site_url('Admin/Barang/Tambah')?>" class="form" method="post">
        <?php endif;?>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nama Barang</label>
              
              <?php if(isset($edit)): ?>
              <input type="text" name="nama_barang" id="" class="form-control" required="" placeholder="Masukan Nama Barang" value="<?=$edit->FN_BRG?>">
              <?php else: ?>
              <input type="text" name="nama_barang" id="" class="form-control" required="" autofocus="" placeholder="Masukan Nama Barang">
              <?php endif;?>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Satuan</label>
              <?php if(isset($edit)): ?>
              <input type="text" name="satuan" id="" class="form-control" required="" placeholder="Masukan Satuan Barang" value="<?=$edit->FSAT?>">
              <?php else: ?>
              <input type="text" name="satuan" id="" class="form-control" required="" placeholder="Masukan Satuan Barang">
              <?php endif;?>
            </div>
          </div> 
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Stok MIN</label>
              <?php if(isset($edit)): ?>
              <input type="number" name="stok_min" id="" class="form-control" required="" placeholder="0" value="<?=$edit->FSTOK_MIN?>">
              <?php else: ?>
              <input type="number" name="stok_min" id="" class="form-control" required="" placeholder="0">
              <?php endif;?>
            </div>
          </div> 
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Stok MAX</label>
              <?php if(isset($edit)): ?>
              <input type="number" name="stok_max" id="" class="form-control" required="" placeholder="0" value="<?=$edit->FSTOK_MAX?>">
              <?php else: ?>
              <input type="number" name="stok_max" id="" class="form-control" required="" placeholder="0">
              <?php endif;?>
            </div>
          </div>  
          <div class="col-md-12">
            <div class="form-group">
              <?php if(isset($edit)): ?>
              <button type="submit" class="btn btn-success btn-flat" name="ed" onclick="return confirm('Lakukan Perubahan Data Barang ?')">
                <span class="fa fa-check"></span> Simpan Perubahan
              </button>
              <a href="<?=site_url('Admin/Barang')?>" class="btn btn-danger btn-flat">
                <span class="fa fa-undo"></span> Batal Ubah Data
              </a>
              <?php else: ?>
              <button type="submit" class="btn btn-success btn-flat" name="sav">
                <span class="fa fa-plus"></span> Tambah Data Barang
              </button>
              <button type="reset" class="btn btn-danger btn-flat">
                <span class="fa fa-undo"></span> Reset Input
              </button>
              <?php endif;?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title">
        &ensp;
          <span class="fa fa-table"></span> 
        &ensp;
          Data Barang
      </h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Satuan Barang</th>
              <th>Stok MIN</th>
              <th>Stok MAX</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            foreach ($databarang->result() as $row) {
          ?>
            <tr>
              <td><h5><?=$row->FK_BRG?></h5></td>
              <td><h5><?=$row->FN_BRG?></h5></td>
              <td><h5><?=$row->FSAT?></h5></td>
              <td><h5><?=$row->FSTOK_MIN?></h5></td>
              <td><h5><?=$row->FSTOK_MAX?></h5></td>
              <td align="center"> 
                <a href="<?=site_url('Admin/Barang/Edit/').$row->FK_BRG?>">
                  <button class="btn btn-warning btn-flat" title="Edit Data Barang">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?=site_url('Admin/Barang/Hapus/').$row->FK_BRG?>" onclick="return confirm('Yakin Untuk Menghapus Data Barang ?')">
                  <button class="btn btn-danger btn-flat" title="Hapus Data Barang">
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