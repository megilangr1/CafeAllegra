<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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

  <style type="text/css">
    .select2-container--default .select2-selection--single .select2-selection__rendered {
      line-height: 28px;
    }

    .select2-container--default .select2-selection--single {
      border-radius: 0px;
    }

    .select2-container .select2-selection--single {
      height: 34px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
      padding-left: 0px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
      height: 34px;
    }
  </style>

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">

  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?= base_url('Admin') ?>" class="navbar-brand"><b>Allegra</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="<?= base_url('Admin') ?>">Halaman Utama</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <!-- <li><a href="<?= site_url('Admin/Barang') ?>">Barang</a></li>
                <li class="divider"></li> -->
                  <li><a href="<?= site_url('Admin/Group-Produk') ?>">Group Produk 1</a></li>
                  <li><a href="<?= site_url('Admin/Group-Produk-Detail') ?>">Group Produk 2</a></li>
                  <li><a href="<?= site_url('Admin/Produk') ?>">Produk</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= site_url('Admin/Group-Material') ?>">Group Material 1</a></li>
                  <li><a href="<?= site_url('Admin/Group-Material-Detail') ?>">Group Material 2</a></li>
                  <li><a href="<?= site_url('Admin/Material') ?>">Material</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= site_url('Admin/Supplier') ?>">Supplier</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= site_url('Admin/Relasi-Material-Supplier') ?>">Relasi Material - Supplier</a></li>
                  <li class="divider"></li>
                  <li><a href="<?= site_url('Admin/Perkiraan') ?>">Perkiraan</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaksi <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= site_url('Admin/Pembelian') ?>">Pembelian</a></li>
                  <li><a href="<?= site_url('Admin/Hutang-Dagang') ?>">Hutang Dagang</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Transaksi <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= site_url('Admin/Transaksi-Pembelian') ?>">Pembelian</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?= $user->nama_pegawai ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                    <p>
                      <?= $user->nama_pegawai ?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <a href="<?= site_url('Admin/Logout') ?>" class="btn btn-default btn-block btn-flat">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <?php if (!isset($pg)) : ?>
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Halaman Admin
              <small>Program Cafe Allegra V-1.0</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?= base_url('Admin') ?>"><i class="fa fa-home"></i> Halaman Utama</a></li>
            </ol>
          </section>
        <?php endif; ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <?php
            if (isset($pg)) {
              $this->load->view($pg);
            } else { }
            ?>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <!-- ./wrapper -->

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
  </script>

</body>

</html>