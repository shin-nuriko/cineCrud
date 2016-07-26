<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
if (!isset($this->session->userdata['logged_in'])) {

header("location: http://localhost/Sites/_ci/cineCrud/index.php/manage_login/user_login_process");
}
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Manage Now Showing</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cinemanage.css">		
	</head>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.0.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">CineCrud</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?php echo site_url(''); ?>" target="xChild">Display List</a></li>
	      <li class="active"><a href="<?php echo site_url('cine/index'); ?>">Manage List</a></li>
	      <li><a href="<?php echo site_url('manage_login/logout'); ?>">Logout</a></li>
	    </ul>
	  </div>
	</nav>