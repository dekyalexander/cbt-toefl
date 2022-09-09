<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Pembayaran
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>/tes_dashboard"><i class="fa fa-home"></i></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
	</section>

	<!-- Form Upload Pembayaran-->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php echo form_open_multipart($url.'/upload_file','id="form-upload-image" class="form-horizontal"'); ?>
                
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">Upload Bukti Pembayaran</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div id="form-pesan-upload-image"></div>
                        <label>Masukkan bukti pembayaran untuk mendapatkan kode token, jika kode token sudah muncul pada tabel dibawah ini, copy token dan masukkan token pada saat masuk pada menu konfirmasi tes.</label>
                        <input type="hidden" id="image-topik-id" name="image-topik-id" >
                        <input type="file" id="image-file" name="image-file" >
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" id="image-upload">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Token-->
    <section class="content">
        <section class="content">
        
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Token</h3>
                <div class="dropdown pull-right">
                                
                            </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="table-token" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            
                            <th>No.</th>
                            <th>Token</th>
                            <th>Waktu Generate</th>
                            <th>Masa Aktif</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        
                            
                            
                        </tr>
                    </tbody>
                </table>   
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.container -->


<script type="text/javascript">
    
    function refresh_table(){
        $('#table-token').dataTable().fnReloadAjax();
    }
    function refresh_table_image(){
        $('#table-image').dataTable().fnReloadAjax();
    }
    
    function refresh_topik(){
        var judul = $('#topik option:selected').text();
        $('#judul-daftar-soal').html(judul);
        $('#judul-tambah-soal').html(judul);
    }
    function imageUpload(){
        $('#box-preview').addClass('hide');
        $('#image-preview').html('');
        $('#form-pesan-upload-image').html('');
        $('#image-isi').val('');
        $('#image-file').val('');

        refresh_table_image();

        $("#modal-image").modal("show");
    }
    function image_preview(posisi, image){
        $('#image-preview').html('<img src="<?php echo base_url() ?>'+posisi+'/'+image+'" style="max-height: 110px;" />');
        $('#image-isi').val('<img src="<?php echo base_url() ?>'+posisi+'/'+image+'" style="max-width: 600px;" />');
        $('#box-preview').removeClass('hide');
    }
    /**
         * Submit form upload pada image browser
         */
        $('#form-upload-image').submit(function(){
            $('#image-topik-id').val($('#topik').val());
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/upload_file",
                    type:"POST",
                    data:new FormData(this),
                    mimeType: "multipart/form-data",
                    contentType:false,
                    cache: false,
                    processData: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            refresh_table();
                            $('#image-preview').html(obj.image);
                            $('#image-isi').val(obj.image_isi);
                            $('#box-preview').removeClass('hide');
                            $("#modal-proses").modal('hide');
                            $("#form-pesan-upload-image").html('');
                            $('#image-file').val('');
                            refresh_table_image();
                            notify_success(obj.pesan);
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan-upload-image').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

    $(function(){
        $('#form-token').submit(function(){
            $("#modal-proses").modal('show');
            $.ajax({
                    url:"<?php echo site_url().'/'.$url; ?>/token",
                    type:"POST",
                    data:$('#form-token').serialize(),
                    cache: false,
                    success:function(respon){
                        var obj = $.parseJSON(respon);
                        if(obj.status==1){
                            $("#modal-proses").modal('hide');
                            $("#isi-token").html(obj.token);
                            notify_success(obj.pesan);
                            refresh_table();
                        }else{
                            $("#modal-proses").modal('hide');
                            $('#form-pesan').html(pesan_err(obj.pesan));
                        }
                    }
            });
            return false;
        });

        $('#table-token').DataTable({
                  "paging": true,
                  "iDisplayLength":10,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": true,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false
         }); 
    });
    $('#table-image').DataTable({
                  "bPaginate": false,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": false,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"100px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"90px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"50px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable_image/",
                  "autoWidth": false,
                  "fnServerParams": function ( aoData ) {
                    aoData.push( { "name": "topik", "value": $('#topik').val()} );
                  }
            });

</script>