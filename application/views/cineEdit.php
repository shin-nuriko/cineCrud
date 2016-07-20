<div class="row">
	<div class="col-sm-offset-1 col-sm-10">
		<h3><span class="label label-primary col-sm-12">Update Information</span></h3>
		</br></br>
		<div class="col-sm-6">
					<img class="img-responsive"  src="<?php echo base_url(); ?>/images/<?php echo $this->form_data->poster; ?>">
		</div>
		<div class="col-sm-6">
		<form role="form" id="addShow" action="<?php echo site_url('cine/updateCine'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		<input type="hidden" name="id" value="<?php echo set_value('id',$this->form_data->id); ?>"/>		


		<div class="form-group">
		    <label class="control-label col-sm-2" for="title">Title:</label>
		    <div class="col-sm-9">
		      <input class="form-control" name="title" value="<?php echo set_value('title',$this->form_data->title); ?>">
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="poster">Poster:</label>
		    <div class="col-sm-9">
		      <input class="form-control" type="file" name="poster" >
		    </div>
		</div>
		<div class="form-group">
		    <label class="control-label col-sm-2" for="description">Description:</label>
		    <div class="col-sm-9">
		      <textarea class="form-control" id="description" name="description"><?php echo set_value('description',$this->form_data->description); ?></textarea>
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
</div>