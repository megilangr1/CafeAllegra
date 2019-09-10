<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-file"></span> &ensp; Data Pembelian</h4>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered" id="example1">
            <thead>
              <tr>
                <th>No Pembelian</th>
                <th>Tanggal Pembelian</th>
                <th>Supplier</th>
                <th>Jenis Pembelian</th>
                <th>Jumlah Material</th>
                <th>Total Pembelian</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($tb->result() as $rd) {
                $fhc = $rd->FHC;
                if ($fhc == '0') {
                  $hc = 'Kredit';
                } else if ($fhc == '1') {
                  $hc = 'Cash';
                }
                ?>
                <tr>
                  <td>
                    <h5><?= $rd->FNO_BELI ?></h5>
                  </td>
                  <td>
                    <h5><?= $rd->FTGL_BELI ?></h5>
                  </td>
                  <td>
                    <h5><?= $rd->FNA_SUP ?></h5>
                  </td>
                  <td>
                    <h5><?= $hc ?></h5>
                  </td>
                  <td>
                    <h5><?= $rd->jml_mat ?></h5>
                  </td>
                  <td>
                    <h5><?= "Rp. " . number_format($rd->total, 0, ',', '.') ?></h5>
                  </td>
                  <td class="text-center">
                    <a href="<?= base_url('Admin/Print/Pembelian/') . $rd->FNO_BELI . "/" . $rd->FK_SUP ?>">
                      <button class="btn btn-info">
                        <span class="glyphicon glyphicon-print"></span>
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
</div>