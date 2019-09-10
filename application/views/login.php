<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/AdminLTE.min.css"> 
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url();?>"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Login Untuk Memulai Sesi</p>

    <form action="Login" method="post">
      <div class="form-group has-feedback">
        <input type="username" class="form-control" placeholder="Username" name="username" value="<?=set_value('username')?>" autofocus="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>  
        <?=form_error('username', '<p class="text-danger" align="center">', '</p>')?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?=form_error('password', '<p class="text-danger" align="center">', '</p>')?>
      </div>
      <div class="row">  
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
      <hr>
      <div class="row">  
        <div class="col-xs-12">
          <?=$this->session->flashdata('message')?> 
        </div>
      </div>
    </form> 
  </div> 
</div>  

<!-- jQuery 3 -->
<script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

</body>
</html>
