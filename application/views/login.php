<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/Sites/_ci/cineCrud/index.php/manage_login/user_login_process");
}
?>
<head>
<title>Login Form</title>
<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
</head>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.0.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
<body>
<div id="main"  class="container" align="center">
	<?php if (isset($message_display)) { ?>
	<div class = "row">
		<div class="col-md-12 col-sm-12 label label-pill label-success">
			<?php echo $message_display;?> 
		</div>
	</div>
	<?php } 
	if (isset($error_message)) { ?>
	<div class = "row">
		<div class="col-md-12 col-sm-12 label label-pill label-danger">
			<?php echo $error_message;?> 
		</div>
	</div>
	<?php } ?>
	<div id="login" class="row">
		<h2>Login</h2>
		<div class = "row">
			<div class="col-md-12 col-sm-12" style="color:red">
				<?php echo validation_errors();	?>
			</div>
		</div>
		<?php 
		$form_attributes = array('role' => 'form', 'class' => 'form-horizontal');
		echo form_open('manage_login/user_login_process',$form_attributes); ?>
		<div class="form-group">
		    <label class="control-label col-sm-offset-3 col-sm-2 col-md-2" for="username">UserName :</label>
		    <div class="col-sm-4 col-md-4">
		      <input type="text" class="form-control" name="username" placeholder="username">
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-offset-3 col-sm-2 col-md-2" for="password">Password :</label>
		    <div class="col-sm-4 col-md-4">
		      <input type="password" class="form-control" name="password" placeholder="******">
		    </div>
		</div>
		<div class="form-group"> 
		    <div class="col-sm-offset-7 col-sm-2">
		      <button type="submit" class="btn btn-default" value=" Login ">Submit</button>
		    </div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
</body>
</html>