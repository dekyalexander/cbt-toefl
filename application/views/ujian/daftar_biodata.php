	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Biodata 
            
        </h1>
        <ol class="breadcrumb">
        <li><a href="<?php echo site_url() ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
	</section>

	<!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-title">Daftar Biodata</div>
                        <div class="box-tools pull-right">
                            <div class="dropdown pull-right">
                                <a href="<?php echo site_url(); ?>/cetak_biodata">Cetak Biodata</a>
                            </div>
                        </div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <table id="table-daftar-biodata" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Fakultas</th>
                                    <th>Prodi</th>
                                    <th>Nomor HP</th>
                                    <th>Tanggal</th>
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
                    </div>
                </div>
        </div>
    </div>
    </section><!-- /.content -->



<script type="text/javascript">
    
    function refresh_table(){
        $('#table-daftar-biodata').dataTable().fnReloadAjax();
    }

        $('#table-daftar-biodata').DataTable({
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
    

</script>