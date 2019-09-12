<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title">&ensp; <span class="fa fa-bullseye"></span> &ensp; Master Perkiraan</h4>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <form action="<?= site_url('Admin/Perkiraan/Tambah') ?>" method="POST">
          <div class="col-md-3">
            <div class="form-group">
              <label for="">Kode Perkiraan : </label>
              <input type="text" name="kode" id="kode" class="form-control" maxlength="8" required="" autofocus="">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="">Nama Perkiraan : </label>
              <input type="text" name="nama" id="nama" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Saldo Normal : </label>
              <div class="radio">
                <label>
                  <input type="radio" name="saldo" id="saldo" value="K"> Kredit
                </label>
                &ensp; &ensp;
                <label>
                  <input type="radio" name="saldo" id="saldo" value="D"> Debit
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-flat" name="sav">
                <span class="fa fa-plus"></span> Tambah Data Perkiraan
              </button>
              <button type="reset" class="btn btn-danger btn-flat">
                <span class="fa fa-undo"></span> Reset Input
              </button>
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
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Perkiraan </h4>
    </div>
    <div class="box-body">
      <table class="table table-bordered table-hover" id="example1">
        <thead>
          <tr>
            <th>Kode Perkiraan</th>
            <th>Nama Perkiraan</th>
            <th>Saldo Normal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($tb->result() as $row) {
            if ($row->FSALDO_NORMAL == 'K') {
              $saldo = 'Kredit';
            } else if ($row->FSALDO_NORMAL == 'D') {
              $saldo = 'Debit';
            }
            ?>
            <tr>
              <td>
                <h5><?= $row->FK_PERK ?></h5>
              </td>
              <td>
                <h5><?= $row->FN_PERK ?></h5>
              </td>
              <td width="20%">
                <h5><?= $saldo ?></h5>
              </td>
              <td width="10%" class="text-center">
                <a href="<?= site_url('Admin/Perkiraan/Edit/') . $row->FK_PERK ?>">
                  <button class="btn btn-warning btn-flat">
                    <span class="fa fa-edit"></span>
                  </button>
                </a>
                <a href="<?= site_url('Admin/Perkiraan/Hapus/') . $row->FK_PERK ?>" onclick="return confirm('Yakin Untuk Menghapus Data ?')">
                  <button class="btn btn-danger btn-flat">
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