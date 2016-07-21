<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Now Showing</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cineview.css">		
	</head>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-2.1.0.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	<body>
	<div class="container-fluid">

		<div class="row">
			<div id="left" class="well col-sm-10 col-xs-10">
				<img class="img-responsive"  id="cine0" src="<?php echo base_url(); ?>/images/<?php echo $cine_data[0]->poster; ?>">
			</div>
			<div id="right" class="col-sm-2 col-xs-2">
				<?php for($i = 1; $i < count($cine_data); $i++) { ?>
				<div class="row poster">
					<img class="img-responsive" id="cine<?php echo $i; ?>" class="poster" src="<?php echo base_url(); ?>/images/<?php echo $cine_data[$i]->poster; ?>">
				</div>
				<?php } ?>
			</div>
		</div>

		<div id="screen_bottom">
			<div class="ticker">
				<div><?php
				$ticker = '<b>' . $cine_data[0]->title . '</b> -- ' . 
						   $cine_data[0]->description .
						   '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

				echo $ticker . $ticker . $ticker; 
				?></div>
			</div>
		</div>

		<div id="hiddenlist" style="display:none"><?php echo $json; ?></div>
		<div id="origlist" style="display:none"><?php echo $json; ?></div>
	</div>

	</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/js/cineview.js"></script>