<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Manage Now Showing</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cinemanage.css">		
	</head>
	<body>
		<div id="top">
			<div class="add_show">
				<div class="title">Add new show</div>
				<form id="addShow" action="<?php echo site_url('cine/addCine'); ?>" method="post" enctype="multipart/form-data">
					<table>
						<tr><td>Title</td><td><input id="ntitle" name="title"></td></tr>
						<tr><td>Poster</td><td><input id="poster" type="file" name="poster"></td></tr>
						<tr><td>Description</td><td><textarea id="description" name="description"></textarea></td></tr>
					</table>
					<div><input type="submit" value="Add New" /></div>
				</form>
			</div>
		</div>
		<div class="paging"><?php echo $pagination; ?></div>
		<div id="bottom">
			<div class="shows_list">
			<?php foreach ($cine_data as $cine) { ?>
				<div class="show">
					<div class="info">
						<div class="title"><?php echo $cine->title; ?></div>
						<div class="text"><?php echo $cine->description; ?></div>	
					</div>
					<div class="poster">
						<img src="<?php echo base_url(); ?>/images/<?php echo $cine->poster; ?>">
					</div>
					<div class="action">
						<?php 
						echo anchor('cine/update/'.$cine->id,'<i>update</i>',array('class'=>'material-icons w3-large edit'));

						echo anchor('cine/delete/'.$cine->id,
									'<i>delete</i>',
									array('class'=>'material-icons w3-large delete',
										  'onclick'=>"return confirm('Are you sure want to delete this cine?')"))
						?>				
					</div>
				</div>
			<?php } ?>
			</div>
		</div>

	</body>
</html>