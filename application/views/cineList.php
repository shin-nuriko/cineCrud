<div class="top row">
	<div class="col-sm-offset-1 col-sm-10">
		<div class="title">Add new show</div>
		<form id="addShow" action="<?php echo site_url('cine/addCine'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
		<div class="form-group">
		    <label class="control-label col-sm-2" for="title">Title:</label>
		    <div class="col-sm-10">
		      <input class="form-control" id="ntitle" name="title">
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="poster">Poster:</label>
		    <div class="col-sm-10">
		      <input class="form-control" type="file" id="poster" name="poster">
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="description">Description:</label>
		    <div class="col-sm-10">
		      <textarea class="form-control" id="description" name="description"></textarea>
		    </div>
		</div>
		<div class="form-group"> 
		    <div class="col-sm-offset-10 col-sm-2">
		      <button type="submit" class="btn btn-default">Submit</button>
		    </div>
		</div>

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

	