<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Tes 
        </h1>
        <ol class="breadcrumb">
        	<li><a href="<?php echo site_url(); ?>/tes_dashboard"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">dashboard</li>
        </ol>
	</section>

	<!-- Main content -->
    <section class="content">
        
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Tes Dan Daftar Hasil</h3>
                <div class="dropdown pull-right">
                            <a href="<?php echo site_url(); ?>/cetak_sertifikat" id="nim">Cetak Sertifikat</a>
                        </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <table id="table-tes" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="all">Tes</th>
                            <th>Waktu Mulai Tes</th>
                            <th>Waktu Selesai Tes</th>
                            <th>Skor</th>
                            <th class="all">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
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
    $(function () {
        $('#table-tes').DataTable({
                  "paging": false,
                  "iDisplayLength":10,
                  "bProcessing": false,
                  "bServerSide": true, 
                  "searching": false,
                  "aoColumns": [
                        {"bSearchable": false, "bSortable": false, "sWidth":"20px"},
                        {"bSearchable": false, "bSortable": false},
                        {"bSearchable": false, "bSortable": false, "sWidth":"150px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"150px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"100px"},
                        {"bSearchable": false, "bSortable": false, "sWidth":"30px"}],
                  "sAjaxSource": "<?php echo site_url().'/'.$url; ?>/get_datatable/",
                  "autoWidth": false,
                  "responsive": true
         });   
    });
</script>