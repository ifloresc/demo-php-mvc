<h2><?php echo $lang['APPLICATION_LOAD']; ?></h2>

<form class="form-horizontal form-actions" method="post" >
  <div class="control-group">
    <label class="control-label" for="name"><?php echo $lang['INPUT_NAME']; ?></label>
    <div class="controls">
      <?php echo $module->name; ?>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="code"><?php echo $lang['INPUT_CODE']; ?></label>
    <div class="controls">
     	<?php echo $module->code; ?>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="description"><?php echo $lang['INPUT_DESCRIPTION']; ?></label>
    <div class="controls">
    	<?php echo $module->description; ?>
    </div>
  </div>
</form>

<h3><?php echo $lang['OPTION_TITLE']; ?></h3>
<form id="formID" class="form-horizontal form-actions" method="post" action="<?php echo $site;?>application/assign">
	<input type="hidden" name="id" value="<?php echo $module->id; ?>" />
	<div class="control-group">
<?php 
$module = null;

foreach ($listOption as &$option) {
	if ($module != $option->modId) {
		$module = $option->modId;
?>
	<h4><?php echo $option->module?></h4>
<?php 
	}
?>
	<label class="checkbox inline">
  		<input type="checkbox" id="option" name="option[]" value="<?php echo $option->id?>" <?php if (isset($option->app)) { ?>checked="checked"<?php } ?>> <?php echo $option->name?>
	</label>
<?php 
}
?>
	</div>
  <div class="control-group">
    <div class="controls">
      <button type="button" id="pf_md_btn_crud" class="btn btn-primary"><i class="icon-ok icon-white"></i><?php echo $lang['BUTTON_SAVE']; ?></button>
    </div>
  </div>
</form>