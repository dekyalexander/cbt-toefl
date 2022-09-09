<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>/tes_dashboard"><i class="fa fa-home"></i></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
	</section>
    <br>

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
                    <h3 class="box-title">Tambah Biodata</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open($url.'/tambah','id="form-tambah"'); ?>
                    <div class="box-body">
                        <div id="form-pesan">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4 control-label">NIM</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tambah-nim" name="tambah-nim" maxlength="10" autocomplete="off" placeholder="Masukkan NIM" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tambah-nama" name="tambah-nama" autocomplete="off" placeholder="Masukkan Nama"/>
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-sm-4 control-label">Fakultas</label>
                                <div class="col-sm-8">
                                <select name="tambah-fakultas" id="tambah-fakultas" class="form-control input-sm">
                                    <option value="">-- Pilih Fakultas --</option>
                                                <option value="Fakultas Agama Islam">Fakultas Agama Islam</option>
                                                <option value="Fakultas Hukum">Fakultas Hukum</option>
                                                <option value="Fakultas Ilmu Sosial Dan Ilmu Politik">Fakultas Ilmu Sosial Dan Ilmu Politik</option>
                                                <option value="Fakultas Ilmu Keguruan Dan Pendidikan">Fakultas Ilmu Keguruan Dan Pendidikan</option>
                                                <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                                                <option value="Fakultas Teknik">Fakultas Teknik</option>
                                                </select>
                                </select>
                            </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Prodi</label>
                                <div class="col-sm-8">
                                <select name="tambah-prodi" id="tambah-prodi" class="form-control input-sm">    
                                <option value="">-- Pilih Prodi --</option>
                                                <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
                                                <option value="Ilmu Hukum">Ilmu Hukum</option>
                                                <option value="Ilmu Administrasi">Ilmu Administrasi</option>
                                                <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                                                <option value="Pendidikan Ekonomi">Pendidikan Ekonomi</option>
                                                <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                                <option value="Manajemen">Manajemen</option>
                                                <option value="Akutansi">Akutansi</option>
                                                <option value="Teknik Industri">Teknik Industri</option>
                                                <option value="Teknik Kimia">Teknik Kimia</option>
                                                <option value="Teknik Informatika">Teknik Informatika</option>
                                                <option value="Teknik Sipil">Teknik Sipil</option>
                                                </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-sm-4 control-label">Nomor HP</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tambah-nomor" name="tambah-nomor" autocomplete="off" placeholder="Masukkan Nomor"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tambah-tanggal" name="tambah-tanggal" />
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="tambah-simpan" class="btn btn-info pull-right" >Tambah</button>
                    </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
        <div class="col-md-3"></div>
    </div>
</section><!-- /.content -->
</div>

<script type="text/javascript">
    <script lang="javascript">
    function refresh_table(){
        $('#table-biodata').dataTable().fnReloadAjax();
    }

    function tambah(){
        $('#form-pesan').html('');
        $('#tambah-nim').val('');
        $('#tambah-nama').val('');
        $('#tambah-fakultas').val('');
        $('#tambah-prodi').val('');
        $('#tambah-nomor').val('');
        $('#tambah-tanggal').val('');

        $("#modal-tambah").modal("show");
        $('#tambah-nim').focus();
    }

    function edit(nim){
        $("#modal-proses").modal('show');
        $.getJSON('<?php echo site_url().'/'.$url; ?>/get_by_nim/'+nim+'', function(data){
            if(data.data==1){
                $('#edit-nim').val(data.nim);
                $('#edit-nama').val(data.nama);
                $('#edit-fakultas').val(data.fakultas);
                $('#edit-prodi').val(data.prodi);
                $('#edit-nomor').val(data.nomor);
                $('#edit-tanggal').val(data.tanggal);
                
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

        $('#table-biodata').DataTable({
                  "paging": true,
                  "iDisplayLength":10,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": true,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"80px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,

         });          
    });
</script>
</script>