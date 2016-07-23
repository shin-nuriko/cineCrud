<?php if ($form_error > 0) { ?>
<div class = "row">
	<h4><div class="col-sm-offset-1 col-sm-10 label label-danger">
		<?php echo validation_errors();	echo $message; ?>
	</div></h4>
</div>
<?php } ?>

<div class="row">
	<div class="col-sm-offset-1 col-sm-10">
		<h3><span class="label label-primary col-sm-12">Add To The List</span></h3>
		</br></br>
		<form id="addShow" action="<?php echo site_url('cine/addCine'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
		<div class="form-group">
		    <label class="control-label col-sm-2" for="title">Title:</label>
		    <div class="col-sm-9">
		      <input class="form-control" id="ntitle" name="title">
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="poster">Poster:</label>
		    <div class="col-sm-9">
		      <input class="form-control" type="file" id="poster" name="poster">
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="description">Description:</label>
		    <div class="col-sm-9">
		      <textarea class="form-control" id="description" name="description"></textarea>
		    </div>
		</div>
		<div class="form-group"> 
		    <div class="col-sm-offset-9 col-sm-2">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
		</div>

		</form>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-offset-10 col-sm-2"><?php echo $pagination; ?></div>
</div>

<?php foreach ($cine_data as $cine) { ?>
<div class="panel row">
	<div class="col-sm-offset-1 col-sm-3">
		<img class="img-responsive" src="<?php echo base_url(); ?>/images/<?php echo $cine->poster; ?>">
	</div>
		<div class="col-sm-6">
		<div class="title"><?php echo $cine->title; ?></div>
		<?php echo $cine->description; ?>
	</div>
	<div class="col-sm-1">
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

</div>
<?php } ?>	
