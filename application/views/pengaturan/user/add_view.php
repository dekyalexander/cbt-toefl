<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Tambah Admin
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/manager"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Tambah Admin</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
<?php echo form_open('manager/useratur/add','id="form-tambah-user" class="form-horizontal"')?>
	<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Admin</h3>
            </div><!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="form-pesan"></div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="username" name="username" placeholder="Masukkan Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-5">
                                <?php 
                                    if(!empty($level_opsi)){
                                        echo $level_opsi;
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="nama" name="nama" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Opsi 1</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="opsi1" name="opsi1" placeholder="Masukkan Opsi 1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Opsi 2</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm" id="opsi2" name="opsi2" placeholder="Masukkan Opsi 2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box-footer">
                <button type="submit" id="btn-simpan" class="btn btn-info pull-right">Simpan</button>
            </div>
        </div>
    </div>
    </div>
</form>
</section><!-- /.content -->

<script lang="javascript">
    $(function(){
        $('#form-tambah-user').submit(function(){
            $("#modal-proses").modal('show');
                $.ajax({
                    url:"<?php echo site_url()?>/manager/useratur/add",
     			    type:"POST",
     			    data:$('#form-tambah-user').serialize(),
     			    cache: false,
      		        success:function(respon){
         		    	var obj = $.parseJSON(respon);
      		            if(obj.status==1){
      		                $("#modal-proses").modal('hide');
      		                $('#form-pesan').html(pesan_succ(obj.pesan));
                            setTimeout(function(){ window.open("<?php echo site_url()?>/manager/useratur","_self"); }, 1000);
          		        }else{
          		            $("#modal-proses").modal('hide');
                            $('#form-pesan').html(pesan_err(obj.pesan));
          		        }
         			}
      		});
            
      		return false;
        });
    });
</script>