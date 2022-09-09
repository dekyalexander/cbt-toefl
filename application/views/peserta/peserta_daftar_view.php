<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Peserta
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url() ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Peserta</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-xs-3">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">Pilih Status</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <label>Status</label>
                            <div id="data-kelas">
                                <select name="group" id="group" class="form-control input-sm">
                                    <option value="semua">Semua Status</option>
                                    <?php if(!empty($select_group)){ echo $select_group; } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        
                    </div>
                </div>
        </div>

        <div class="col-xs-9">
                <div class="box">
                    <div class="box-header with-border">
    						<div class="box-title">Daftar Peserta</div>
    						<div class="box-tools pull-right">
    							<div class="dropdown pull-right">
    								<a style="cursor: pointer;" onclick="tambah()">Tambah Peserta</a>
    							</div>
    						</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="table-peserta" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> </td>
                                    <td> </td>
									<td> </td>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </tbody>
                        </table>                        
                    </div>
                </div>
        </div>
    </div>

    <div class="modal" id="modal-tambah" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <?php echo form_open($url.'/tambah','id="form-tambah"'); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Tambah Peserta</div>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body">
                            <div id="form-pesan"></div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="tambah-username" name="tambah-username" placeholder="Masukkan Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="tambah-password" name="tambah-password" placeholder="Masukkan Password" >
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="tambah-nama" name="tambah-nama" placeholder="Masukkan Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="tambah-email" name="tambah-email" placeholder="Masukkan Email">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="tambah-group" id="tambah-group" class="form-control input-sm">
                                    <?php if(!empty($select_group)){ echo $select_group; } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="tambah-simpan" class="btn btn-primary">Tambah</button>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>

    </form>
    </div>

    <div class="modal" id="modal-edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <?php echo form_open($url.'/edit','id="form-edit"'); ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <div id="trx-judul">Edit Peserta</div>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="box-body">
                            <div id="form-pesan-edit"></div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" name="edit-id" id="edit-id">
                                <input type="hidden" name="edit-pilihan" id="edit-pilihan">
                                <input type="text" class="form-control" id="edit-username" name="edit-username" readonly >
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="edit-password" name="edit-password" >
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="edit-nama" name="edit-nama" placeholder="Nama Lengkap Peserta">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="edit-email" name="edit-email" placeholder="Email Peserta (Boleh dikosongkan)">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="edit-group" id="edit-group" class="form-control input-sm">
                                    <?php if(!empty($select_group)){ echo $select_group; } ?>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="edit-hapus" class="btn btn-default pull-left">Hapus</button>
                    <button type="button" id="edit-simpan" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>

    </form>
    </div>
</section><!-- /.content -->



<script lang="javascript">
    function refresh_table(){
        $('#table-peserta').dataTable().fnReloadAjax();
    }

    function tambah(){
        $('#form-pesan').html('');
        $('#tambah-username').val('');
        $('#tambah-password').val('');
        $('#tambah-nama').val('');
        $('#tambah-email').val('');

        $("#modal-tambah").modal("show");
        $('#tambah-username').focus();
    }

    function edit(id){
        $("#modal-proses").modal('show');
        $.getJSON('<?php echo site_url().'/'.$url; ?>/get_by_id/'+id+'', function(data){
            if(data.data==1){
                $('#edit-id').val(data.id);
                $('#edit-username').val(data.username);
                $('#edit-password').val(data.password);
                $('#edit-nama').val(data.nama);
                $('#edit-email').val(data.email);
                $('#edit-group').val(data.group);
                
                $("#modal-edit").modal("show");
            }
            $("#modal-proses").modal('hide');
        });
    }

    $(function(){
        $("#group").change(function(){
            refresh_table();
        });

        $('#edit-simpan').click(function(){
            $('#edit-pilihan').val('simpan');
            $('#form-edit').submit();
        });
        $('#edit-hapus').click(function(){
            $('#edit-pilihan').val('hapus');
            $('#form-edit').submit();
        });

        $('#form-edit').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/edit",
                    type:"POST",
                    data:$('#form-edit').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $("#modal-proses").modal('hide');
                            $("#modal-edit").modal('hide');
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan-edit').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

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

        $('#table-peserta').DataTable({
                  "paging": true,
                  "iDisplayLength":10,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": true,
                  "aoColumns": [
    					{"bSearchable": false, "bSortable": false, "sWidth":"20px"},
    					{"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
    					{"bSearchable": false, "bSortable": false, "sWidth":"80px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"30px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "group", "value": $('#group').val()} );
                  }
         });          
    });
</script>