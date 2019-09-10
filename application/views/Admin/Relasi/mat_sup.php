<?php if(isset($detailSP)): ?> 
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-exchange"></span> &ensp; Relasi Material - Supplier </h4>
    </div>
    <div class="box-body">  
      <form action="<?=site_url('Admin/Relasi-Material-Supplier/').$detailSP->FK_SUP."/Tambah"?>" method="post" class="form">
        <input type="hidden" name="kodeSupplier" value="<?=$detailSP->FK_SUP?>">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Pilih Material : </label> 
              <select name="material" id="material" class="select2" style="width: 100%;" data-placeholder="Silahkan Pilih Material" required="" autofocus="">
                <option value=""></option>
                <?php 
                foreach ($dataMaterial->result() as $gp) {
                ?>  
                <?php 
                echo "<option value='$gp->FK_MAT'> $gp->FN_MAT - $gp->FK_MAT </option>";
                }
                ?>
              </select> 
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Kode Material :</label>
              <input type="text" name="kodeMaterial" id="kodeMaterial" disabled="" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Nama Material :</label>
              <input type="text" name="namaMaterial" id="namaMaterial" disabled="" class="form-control">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Satuan Material :</label>
              <input type="text" name="satuanMaterial" id="satuanMaterial" disabled="" class="form-control">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Stok Minimal :</label>
              <input type="text" name="stokMin" id="stokMin" disabled="" class="form-control">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="">Stok Max :</label>
              <input type="text" name="stokMax" id="stokMax" disabled="" class="form-control">
            </div>
          </div>
        </div>
        <div class="col-md-12" id="formTambah" hidden="">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Nama Material Pada Supplier : </label>
              <input type="text" name="nama" id="nama" class="form-control" required="">  
            </div>
          </div>
          <div class="col-md-6"> 
            <div class="input-group">
              <label for="">Harga Produk</label> 
            </div> 
            <div class="input-group">
              <span class="input-group-addon">Rp. </span> 
              <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga Produk" required=""> 
            </div> 
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-flat" name="sav">
                <span class="fa fa-plus"></span> Buat Relasi Material Supplier
              </button>
            </div>
          </div>
        </div>
      </form>
    </div> 
    <div class="box-footer">
      <a href="<?=site_url('Admin/Relasi-Material-Supplier')?>" class="btn btn-info btn-flat btn-block">
        <span class="fa fa-hand-o-left"></span> Pilih Ulang Supplier
      </a>
    </div> 
  </div>
</div>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Data Relasi Supplier - <?=$detailSP->FNA_SUP?> </h4>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="example1">
          <thead>
            <tr>
              <th>Kode Material</th> 
              <th>Kode Material</th>
              <th>Nama Material</th>
              <th>Nama Material Pada Supplier</th> 
              <th>Harga Pada Supplier</th> 
              <th>Pilih</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          foreach ($dataRelasi->result() as $row) {
          ?>
            <tr>
              <td width="5%"><h5><?=$row->FK_SUP?></h5></td>
              <td><h5><?=$row->FK_MAT?></h5></td>
              <td><h5><?=$row->FN_MAT?></h5></td>  
              <td><h5><?=$row->FN_MAT_SUP?></h5></td>  
              <td><h5><?="Rp. ".number_format($row->FHARGA, 2, ',', '.')?></h5></td>  
              <td width="10%" align="center"> 
                <a href="<?=site_url('Admin/Relasi-Material-Supplier/').$row->FK_SUP."/Hapus/".$row->FK_MAT?>">
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

<script src="<?=base_url('jquery/jquery-3.3.1.js')?>"></script>
<script>
  $(document).ready(function(){
    $('#material').change(function(){
      var id = $(this).val();
      $.ajax({
        url: "<?=site_url('Relasi/detailM')?>",
        method: "POST",
        data: {id: id},
        async: true,
        dataType: 'json',
        success: function(data){
          $('#kodeMaterial').val(data.FK_MAT);
          $('#namaMaterial').val(data.FN_MAT);
          $('#satuanMaterial').val(data.FSAT);
          $('#stokMin').val(data.FSTOK_MIN);
          $('#stokMax').val(data.FSTOK_MAX);
          $('#formTambah').show();
          $('#nama').focus();
        }
      });
    });

    $("#harga").on('keyup', function(){ 
      var n = parseInt($(this).val().replace(/\D/g,''),10);
      $(this).val(n.toLocaleString());
      //do something else as per updated question 
    });
  });
</script>





<?php else: ?>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header">
      <h4 class="box-title"> &ensp; <span class="fa fa-table"></span> &ensp; Pilih Data Supplier</h4>
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
              <th>Pilih</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          foreach ($dataSP->result() as $row) {
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
                <a href="<?=site_url('Admin/Relasi-Material-Supplier/').$row->FK_SUP?>">
                  <button class="btn btn-info btn-flat" title="Pilih Data Supplier">
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