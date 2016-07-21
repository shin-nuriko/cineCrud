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
<?php
if (isset($logout_message)) {
	echo "<div class='message'>";
	echo $logout_message;
	echo "</div>";
}
?>
<?php
if (isset($message_display)) {
	echo "<div class='message'>";
	echo $message_display;
	echo "</div>";
}
?>
	<div id="login">
	<h2>Login</h2>
	<hr/>
	<?php 
	$form_attributes = array('role' => "form");
	echo form_open('manage_login/user_login_process',$form_attributes); ?>
	<?php
	echo "<div class='error_msg'>";
	if (isset($error_message)) {
		echo $error_message;
	}
	echo validation_errors();
	echo "</div>";
	?>
	<label>UserName :</label>
	<input type="text" name="username" id="name" placeholder="username"/><br /><br />
	<label>Password :</label>
	<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
	<input type="submit" value=" Login " name="submit" class="btn btn-default"/><br />
	<?php echo form_close(); ?>
	</div>
</div>
</body>
</html>