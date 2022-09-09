<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		Biodata 
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>/tes_dashboard"><i class="fa fa-home"></i></i>Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
	</section>

	<!-- Main content -->
    <section class="content">
        <section class="content">
        
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Biodata</h3>
                <div class="dropdown pull-right">
                                <a href="<?php echo site_url(); ?>/biodata_add">Tambah Biodata</a>
                            </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="table-biodata" class="table table-bordered table-hover">
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
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.container -->


<script type="text/javascript">
    
    function refresh_table(){
        $('#table-biodata').dataTable().fnReloadAjax();
    }

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
    

</script>