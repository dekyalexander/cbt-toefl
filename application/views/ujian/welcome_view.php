<div class="container">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	
	</section>

	<!-- Main content -->
    <section class="content">
    	<div class="row">
    	<?php echo form_open('welcome/login','id="form-login" class="form-horizontal"')?>
    	</div>
    	<div class="row">
    		<div class="login-box">
    			<div class="login-logo">
        			
      			</div><!-- /.login-logo -->
      			<div class="login-box-body">
              <center><p>Login Peserta</p></center>
              <br>
        			<p class="login-box-msg">Masukkan Username dan Password</p>
                <div id="form-pesan"></div>
          			<div class="form-group has-feedback">
                  <label>Username</label>
            			<input type="text" id="username" name="username" autocomplete="off" class="form-control" />
            			<span class="glyphicon glyphicon-user form-control-feedback"></span>
          			</div>
          		<div class="form-group has-feedback">
                <label>Password</label>
            		<input type="password" id="password" name="password" class="form-control" />
            		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          		</div>
          		<div class="row">
		            <div class="col-xs-8">                          
		            </div><!-- /.col -->
                <div class="dropdown pull-right">
                               <a href="<?php echo site_url(); ?>/manager/registrasi_akun">Daftar Baru</a>
                            </div>
		            <div class="col-xs-4">
		              	<button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
		            </div><!-- /.col -->
	          	</div>
    		</div><!-- /.login-box -->
    	</div>
    </section><!-- /.content -->
</div><!-- /.container -->

<script type="text/javascript">
    $(function () {
        $('#username').focus();   
        
        $('#form-login').submit(function(){
          $("#modal-proses").modal('show');
            $.ajax({
              url:"<?php echo site_url()?>/welcome/login",
     			    type:"POST",
     			    data:$('#form-login').serialize(),
     			    cache: false,
      		        success:function(respon){
         		    	var obj = $.parseJSON(respon);
      		            if(obj.status==1){
      		                window.open("<?php echo site_url()?>/tes_dashboard","_self");
          		        }else{
                            $('#form-pesan').html(pesan_err(obj.error));
                            $("#modal-proses").modal('hide');
                            $('#username').focus();   
          		        }
         			}
      		});
            
      		return false;
        });    
    });
</script>