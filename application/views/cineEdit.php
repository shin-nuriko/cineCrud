<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Update Cine</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cinemanage.css">		
	</head>
	<body>
		<div id="top">
			<div class="add_show">
				<div class="title">Update Cine</div>
				<form id="addShow" action="<?php echo site_url('cine/updateCine'); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo set_value('id',$this->form_data->id); ?>"/>
					<img src="<?php echo base_url(); ?>/images/<?php echo $this->form_data->poster; ?>" align="left">
					<table>
						<tr><td>Title</td><td>					
							<input type="text" name="title" value="<?php echo set_value('title',$this->form_data->title); ?>"/>
							</td></tr>
						<tr><td>Replace Poster</td><td><input id="poster" type="file" name="poster" value="<?php echo set_value('poster',$this->form_data->poster); ?>"></td></tr>
						<tr><td>Description</td>
							<td><textarea id="description" name="description"><?php echo set_value('description',$this->form_data->description); ?></textarea>
							</td></tr>
					</table>
					<div><input type="submit" value="Update" /></div>
				</form>
			</div>
		</div>
		<br />
		<?php echo $link_back; ?>

	</body>
</html>