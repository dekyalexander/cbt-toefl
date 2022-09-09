<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Backup Data
		
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo site_url() ?>/"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Backup Data</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
        <div class="col-xs-12">
            
        </div>
    </div>
	<div class="row">
		<div class="col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
    					<div class="box-title">Backup Database</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <span id="form-pesan-database"></span>
                        
                        <p>Database akan disimpan bentuk archive</p>
                    </div>
					
					<div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="backup-database">Backup Database</button>
                    </div>
                </div>
        </div>
        <div class="col-xs-6">
                <div class="box">
                    <div class="box-header with-border">
    					<div class="box-title">Backup Data Upload</div>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <span id="form-pesan-data-upload"></span>
                        
                        <p>Data file yang di upload akan disimpan bentuk archive</p>
                    </div>
					
					<div class="box-footer">
                        <button type="submit" class="btn btn-primary" id="backup-data-upload">Backup Data Upload</button>
                    </div>
                </div>
        </div>
    </div>
</section><!-- /.content -->



<script lang="javascript">
    

    $(function(){
        $('#backup-database').click(function(){
            window.open("<?php echo site_url().'/'.$url; ?>/database");
        });

        $('#backup-data-upload').click(function(){
            window.open("<?php echo site_url().'/'.$url; ?>/data_upload");
        });
    });
</script>