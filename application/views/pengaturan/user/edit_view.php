<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Admin
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url(); ?>/manager"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Edit Admin</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
<?php echo form_open('manager/useratur/edit','id="form-edit-user" class="form-horizontal"')?>
	<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Admin</h3>
            </div><!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="form-pesan"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="form-pesan"></div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-5">
                                        <input type="hidden" id="aksi" name="aksi" />
                                        <input type="text" class="form-control input-sm" value="<?php if(!empty($username)){ echo $username; } ?>" id="username" name="username" placeholder="Username" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control input-sm" value="kosongkosong" id="password" name="password" placeholder="Password">
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
                                        <input type="text" class="form-control input-sm" value="<?php if(!empty($nama_lengkap)){ echo $nama_lengkap; } ?>" id="nama" name="nama" placeholder="Nama Pengguna">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Opsi 1</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control input-sm" value="<?php if(!empty($opsi1)){ echo $opsi1; } ?>" id="opsi1" name="opsi1" placeholder="Opsi 1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Opsi 2</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control input-sm" value="<?php if(!empty($opsi2)){ echo $opsi2; } ?>" id="opsi2" name="opsi2" placeholder="Opsi 2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control input-sm" value="<?php if(!empty($keterangan)){ echo $keterangan; } ?>" id="keterangan" name="keterangan" placeholder="Keterangan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="box-footer">
                <div class="pull-right">
                    <button type="button" id="hapus" class="btn btn-default">Hapus</button>
                    <button type="button" id="simpan" class="btn btn-info">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
</section><!-- /.content -->

<script lang="javascript">
    $(function(){
        $('#simpan').click(function(){
            $("#modal-proses").modal('show');
            $('#aksi').val('1');
            $('#form-edit-user').submit();
        }); 
        $('#hapus').click(function(){
            $("#modal-proses").modal('show');
            $('#aksi').val('0');
            $('#form-edit-user').submit();
        });
             
        $('#form-edit-user').submit(function(){
                $.ajax({
                    url:"<?php echo site_url()?>/manager/useratur/edit",
     			    type:"POST",
     			    data:$('#form-edit-user').serialize(),
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