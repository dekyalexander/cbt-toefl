<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
    		SELAMAT DATANG <?php if(!empty($nama)){ echo $nama; } ?>
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url(); ?>/tes_dashboard"><i class="fa fa-home"></i></i>Home</a></li>
            <li class="active">Dashboard</li>
        	<li><a href="<?php echo site_url(); ?>/dashboard_tes"><i class="fa fa-book"></i></i>Tes</a></li>
            <li class="active">Halaman Tes</li>
            <li><a href="<?php echo site_url(); ?>/biodata"><i class="fa fa-user"></i></i>Biodata</a></li>
            <li class="active">Halaman Biodata</li>
            
            
        </ol>
	</section>

	<!-- Main content -->
    <section class="content">
        <marquee>
            <p>Silahkan isi Biodata dengan lengkap pada menu Biodata. Dan Pilih menu Tes dari daftar Tes yang tersedia pada menu Tes. Apabila Tes tidak muncul, silahkan menghubungi Administrator yang bertugas.</p>
        </marquee>
        <img src="<?php echo base_url(); ?>public/plugins/adminlte/img/bg-toefl.jpg" width="910" height="400"/>
    </section><!-- /.content -->
</div><!-- /.container -->

<script type="text/javascript">
    
</script>