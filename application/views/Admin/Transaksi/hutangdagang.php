<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Hutang Dagang </h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="example1">
          <thead>
            <tr>
              <th>No. Pembelian</th>
              <th>Supplier</th>
              <th>Jumlah</th>
              <th>Hutang</th>
              <th>Status Bayar</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($tb->result() as $rb) {
              ?>

            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>