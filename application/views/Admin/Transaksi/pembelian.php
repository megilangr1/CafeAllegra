<?php if ($this->session->has_userdata('Supplier-Pembelian')) : ?>
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h4 class="box-title"> &ensp; <span class="fa fa-shopping-cart"></span> &ensp; Pembelian </h4>
      </div>
      <div class="box-body">
        <form action="<?= site_url('Admin/Pembelian/Tambah') ?>" method="post" class="form">
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Supplier : </label>
                <input type="text" name="supplier" id="supplier" class="form-control" value="<?= $sp->FNA_SUP ?>" disabled="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Tanggal Pembelian : </label>
                <?php if ($this->session->has_userdata('Tanggal-Pembelian')) : ?>
                  <input type="date" name="tgl" id="tgl" class="form-control" disabled="" value="<?= $this->session->userdata('Tanggal-Pembelian') ?>">
                <?php else : ?>
                  <input type="date" name="tgl" id="tgl" class="form-control" required="" autofocus="">
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="">Jenis Pembayaran : </label>
                <div class="radio">
                  <?php if ($this->session->has_userdata('Pembayaran-Pembelian')) : ?>
                    <?php
                        if ($this->session->userdata('Pembayaran-Pembelian') == '1') {
                          ?>
                      <label>
                        <input type="radio" name="jenis" id="jenis" value="1" checked="" disabled=""> Cash
                      </label>
                      &ensp; &ensp;
                      <label>
                        <input type="radio" name="jenis" id="jenis" value="0" disabled=""> Kredit
                      </label>
                    <?php
                        } else if ($this->session->userdata('Pembayaran-Pembelian') == '0') {
                          ?>
                      <label>
                        <input type="radio" name="jenis" id="jenis" value="1" disabled=""> Cash
                      </label>
                      &ensp; &ensp;
                      <label>
                        <input type="radio" name="jenis" id="jenis" value="0" checked="" disabled=""> Kredit
                      </label>
                    <?php
                        } else {
                          ?>
                      <label>
                        <input type="radio" name="jenis" id="jenis" value="1" required=""> Cash
                      </label>
                      &ensp; &ensp;
                      <label>
                        <input type="radio" name="jenis" id="jenis" value="0" required=""> Kredit
                      </label>
                    <?php
                        }
                        ?>
                  <?php else : ?>
                    <label>
                      <input type="radio" name="jenis" id="jenis" value="1" required=""> Cash
                    </label>
                    &ensp; &ensp;
                    <label>
                      <input type="radio" name="jenis" id="jenis" value="0" required=""> Kredit
                    </label>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Material</label>
                <select name="mat" id="mat" class="select2" style="width: 100%" required="" data-placeholder="Silahkan Pilih Material">
                  <option value=""></option>
                  <?php
                    foreach ($mat->result() as $rm) {
                      echo "<option value='$rm->FK_MAT'>$rm->FK_MAT - $rm->FN_MAT / $rm->FN_MAT_SUP</option>";
                    }
                    ?>
                </select>
              </div>
            </div>
            <div id="detMat" hidden="">
              <div class="col-md-2">
                <div class="form-group">
                  <label for="">Kode Material</label>
                  <input type="text" name="kmat" id="kmat" disabled="" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Nama Material</label>
                  <input type="text" name="nmat" id="nmat" disabled="" class="form-control">
                  <input type="hidden" name="nmat1" id="nmat1" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="">Satuan</label>
                  <input type="text" name="smat" id="smat" disabled="" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="">Stok Min</label>
                  <input type="number" name="mimat" id="mimat" disabled="" class="form-control">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <label for="">Stok Max</label>
                  <input type="number" name="mamat" id="mamat" disabled="" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nama Material Pada Supplier</label>
                  <input type="text" name="nmats" id="nmats" disabled="" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <label for="">Harga Material Pada Supplier</label>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Rp. </span>
                    <input type="text" name="hargas" id="hargas" class="form-control" placeholder="Harga Material" disabled="">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Banyak Pembelian </label>
                  <input type="number" name="qty" id="qty" min="0" required="" class="form-control" placeholder="0">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="input-group">
                    <label for="">Harga Material</label>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Rp. </span>
                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga Material" required="">
                  </div>
                </div>
              </div>
              <hr>
              <div class="col-md-12" align="center">
                <hr>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-flat btn-block" name="sav">
                    <span class="fa fa-plus"></span> &ensp; Tambahkan Data Ke-Keranjang Pembelian
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Keranjang Pembelian</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="example1">
            <thead>
              <tr>
                <th>Kode Material</th>
                <th>Nama Material</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $uid = $this->session->userdata('uid');
                $sup = $this->session->userdata('Supplier-Pembelian');
                $tgl = $this->session->userdata('Tanggal-Pembelian');
                $pem = $this->session->userdata('Pembayaran-Pembelian');
                $total = 0;
                foreach ($tbc as $rc) {
                  if ($rc['transaksi'] == 'Pembelian' && $rc['supplier'] == $sup && $rc['tanggal'] == $tgl && $rc['jenis'] == $pem && $rc['uid'] == $uid) {
                    $total += $rc['subtotal'];
                    ?>
                  <tr>
                    <td>
                      <h5><?= $rc['id'] ?></h5>
                    </td>
                    <td>
                      <h5><?= $rc['name'] ?></h5>
                    </td>
                    <td>
                      <h5><?= $rc['qty'] ?></h5>
                    </td>
                    <td>
                      <h5><?= "Rp. " . number_format($rc['price'], 2, ',', '.') ?></h5>
                    </td>
                    <td>
                      <h5><?= "Rp. " . number_format($rc['subtotal'], 2, ',', '.') ?></h5>
                    </td>
                    <td align="center">
                      <a href="<?= site_url('Admin/Pembelian/Hapus/') . $rc['rowid'] ?>">
                        <div class="btn btn-danger btn-flat" title="Hapus Material">
                          <span class="fa fa-trash"></span>
                        </div>
                      </a>
                    </td>
                  </tr>
              <?php
                  }
                }
                ?>
              <tr>
                <td colspan="4" align="right">
                  <h5><b>Total : </b></h5>
                </td>
                <td>
                  <h5><?= "Rp. " . number_format($total, 2, ',', '.') ?></h5>
                </td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="box-footer" align="center">
        <a href="<?= site_url('Admin/Pembelian/Selesai') ?>" class="btn btn-success btn-flat">
          <span class="fa fa-check"></span> Selesaikan Pembelian
        </a>
        <a href="<?= site_url('Admin/Pembelian/Batal-Pembelian') ?>" class="btn btn-danger btn-flat">
          <span class="fa fa-times"></span> Batalkan Pembelian
        </a>
      </div>
    </div>
  </div>

  <script src="<?= base_url('jquery/jquery-3.3.1.js') ?>"></script>
  <script>
    $('#res').on('click', function() {
      $('#detMat').hide();
    });
  </script>
  <script>
    $(document).ready(function() {

      $('#mat').change(function() {
        var mat = $(this).val();
        $.ajax({
          url: "<?= site_url('Admin/Pembelian/Material') ?>",
          method: 'POST',
          data: {
            mat,
            mat
          },
          async: true,
          dataType: 'json',
          success: function(data) {
            $('#detMat').show();
            $('#kmat').val(data.FK_MAT);
            $('#nmat').val(data.FN_MAT);
            $('#nmat1').val(data.FN_MAT);
            $('#nmats').val(data.FN_MAT_SUP);
            $('#smat').val(data.FSAT);
            $('#mimat').val(data.FSTOK_MIN);
            $('#mamat').val(data.FSTOK_MAX);

            var h = data.FHARGA;
            var harga = h.replace(".00", "");
            $('#harga').val(harga);
            $('#hargas').val(harga);

            var n = parseInt($('#harga').val().replace(/\D/g, ''), 10);
            $('#harga').val(n.toLocaleString());
            var n = parseInt($('#hargas').val().replace(/\D/g, ''), 10);
            $('#hargas').val(n.toLocaleString());

            $('#qty').focus();

          }
        });
        return false;
      });


      $("#harga").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        $(this).val(n.toLocaleString());
      });

    });
  </script>
<?php else : ?>
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h4 class="box-title"> &ensp; <span class="fa fa-users"></span> &ensp; Silahkan Pilih Data Supplier Untuk Transaksi</h4>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover" id="example1">
            <thead>
              <tr>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Kota</th>
                <th>No. Telp</th>
                <th>Contact Person</th>
                <th>Pilih</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach ($dataSupplier->result() as $row) {
                  ?>
                <tr>
                  <td>
                    <h5><?= $row->FK_SUP ?></h5>
                  </td>
                  <td>
                    <h5><?= $row->FNA_SUP ?></h5>
                  </td>
                  <td>
                    <h5><?= $row->FALAMAT ?></h5>
                  </td>
                  <td>
                    <h5><?= $row->FKOTA ?></h5>
                  </td>
                  <td>
                    <h5><?= $row->FTEL ?></h5>
                  </td>
                  <td>
                    <h5><?= $row->FCP ?></h5>
                  </td>
                  <td align="center">
                    <a href="<?= site_url('Admin/Pembelian/Supplier/') . $row->FK_SUP ?>">
                      <button class="btn btn-info btn-flat" title="Pilih Supplier">
                        <span class="fa fa-hand-o-right"></span>
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
<?php endif; ?>