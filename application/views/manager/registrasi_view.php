<div class="container">
<!-- Content Header (Page header) -->
<section class="content-header">
    
</section>

<!-- Main content -->
<section class="content">
    
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrasi Akun</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open($url.'/tambah','id="form-tambah"'); ?>
                    <div class="box-body">
						<div id="form-pesan">
						</div>
						
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tambah-username" name="tambah-username" autocomplete="off" placeholder="Masukkan Username" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="tambah-password" name="tambah-password" placeholder="Masukkan Password"/>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="tambah-nama" name="tambah-nama" autocomplete="off" placeholder="Masukkan Nama Lengkap">
                            </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" id="tambah-email" name="tambah-email" autocomplete="off" placeholder="Masukkan Email">
                            </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                <select name="tambah-group" id="tambah-group" class="form-control input-sm">
                                     <?php if(!empty($select_group)){ echo $select_group; } ?>
                                </select>
                            </div>
                            </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="form-tambah" class="btn btn-info pull-right" >Daftar</button>
                    </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        <div class="col-md-3"></div>
    </div>
</section><!-- /.content -->
</div>

    <div class="modal" id="modal-proses" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
                    Data Sedang diproses...
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<script lang="javascript">
    

    function tambah(){
        $('#form-pesan').html('');
        $('#tambah-username').val('');
        $('#tambah-password').val('');
        $('#tambah-nama').val('');
        $('#tambah-email').val('');

        $("#modal-tambah").modal("show");
        $('#tambah-username').focus();
    }

   

        $('#form-tambah').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/tambah",
                    type:"POST",
                    data:$('#form-tambah').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            $("#modal-tambah").modal('hide');
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });
 
        
</script>