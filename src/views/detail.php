<h3><span class="glyphicon glyphicon-ok"></span> <?php echo $lang[$formData->title]; ?></h3>

<form id="formID" role="form" class="form-horizontal well" method="post" >
<?php
foreach ($formData->fields as $field) {
  $data = $field->name;
?>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="<?php echo $field->name; ?>"><?php echo $lang[$field->key]; ?></label>
    <div class="col-lg-10">
    <?php 
    if ($field->type == 'multiGroupRadio') {

		$module = null;
		$application = null;
		
		foreach ($field->list as $app) {
		?>
			<h3><?php echo $app->name?></h3>
		<?php 
			foreach ($app->modules as $module) {
		?>
			<h4><?php echo $module->name?></h4>
		<?php 
				foreach ($module->options as $option) {
		?>
			<label class="checkbox inline">
		  		<?php 
		  			echo $option->name;
		  		?>
			</label>
		<?php 
						if (isset($option->option )) {
							foreach ($option->option as $opt) {
		?>
			<label class="checkbox inline">
		  		<?php 
		  			echo $opt->name;
		  		?>
			</label>
		<?php 
							}
						}
				}
			}
		}

    } else {
		$value = $formData->data->$data;
    ?>
      <p class="form-control-static"><?php echo $value; ?></p>
    <?php 
    }
    ?>
    </div>
  </div>
<?php 
}
?>
</form>