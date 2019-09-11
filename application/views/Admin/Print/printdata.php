<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Printing Data</title>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <!-- Skin -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">

</head>

<body>
  <div class="table-responsive">
    <table class="table">
      <tr>
        <td colspan="2" class="text-center">
          <h3>Detail Pembelian</h3>
        </td>
      </tr>
      <tr>
        <td width="50%">
          <h5 class="text-center">Transaksi <?= $this->uri->segment(3) ?></h5>
        </td>
        <td width="50%">
          <h5 class="text-center">Tanggal Transaksi : <?= $sd->FTGL_BELI ?></h5>
        </td>
      </tr>
      <tr>
        <td colspan="2">
        </td>
      </tr>
    </table>
  </div>

  <div class="table-responsive">
    <table class="table">
      <tr>
        <td></td>
        <td width="20%" class="text-left">Nomor Pembelian </td>
        <td width="5%">:</td>
        <td><?= $sd->FNO_BELI ?></td>
      </tr>
      <tr>
        <td></td>
        <td width="20%" class="text-left">Supplier : </td>
        <td width="5%">:</td>
        <td><?= $sd->FNA_SUP ?></td>
      </tr>
    </table>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <td colspan="4" class="text-center">
            <h4><b>Data Pembelian</b></h4>
          </td>
        </tr>
        <tr>
          <th class="text-center">Material</th>
          <th class="text-center">Qty</th>
          <th class="text-center">Harga</th>
          <th class="text-center">Sub Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($tb->result() as $r1) {
          $sub = $r1->FQTY * $r1->FHARGA;
          $total += $sub;
          ?>
          <tr>
            <td class="text-center"><?= $r1->FN_MAT ?></td>
            <td class="text-center"><?= $r1->FQTY ?></td>
            <td class="text-center"><?= "Rp. " . number_format($r1->FHARGA, 0, ',', '.') ?></td>
            <td class="text-center"><?= "Rp. " . number_format($sub, 0, ',', '.') ?></td>
          </tr>
        <?php
        }
        ?>
        <tr>
          <td colspan="3" class="text-right"><b>Total : </b></td>
          <td class="text-center"> <?= "Rp. " . number_format($total, 0, ',', '.') ?> </td>
        </tr>
      </tbody>
    </table>
  </div>


  <!-- jQuery 3 -->
  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>

  <!-- page script -->
  <script>
    $(function() {

      //Initialize Select2 Elements
      $('.select2').select2()

      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
    })
    window.print();
  </script>
</body>

</html>