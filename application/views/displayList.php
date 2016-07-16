<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Now Showing</title>
	</head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/cineview.css">
	<body>
		<?php //echo print_r($cine_data);?>
		<div id="screen_top">
			<div id="left">
				<img id="cine0" src="<?php echo base_url(); ?>/images/<?php echo $cine_data[0]->poster; ?>">
			</div>
			<div id="right">
				<ul>
					<?php for($i = 1; $i < count($cine_data); $i++) { ?>
					<li><img id="cine<?php echo $i; ?>" class="poster" src="<?php echo base_url(); ?>/images/<?php echo $cine_data[$i]->poster; ?>"></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div id="screen_bottom">
			<div class="ticker">
				<div><?php echo $cine_data[0]->title; ?> -- <?php echo $cine_data[0]->description; ?></div>
			</div>
		</div>
		<div id="hiddenlist" style="display:none"><?php echo $json; ?></div>
	</body>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/js/cineview.js"></script>