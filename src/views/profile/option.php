 <?php 
if (isset($list)) {
	foreach ($list as $optApp) {
	?>
    <ul class="list-unstyled">      
    <li>
  		<h3>
        <input type="checkbox" id="<?php echo $optApp->id; ?>" name="<?php echo $optApp->id; ?>" value="1" checked="checked" >
        <?php echo $optApp->name?>
      </h3>
	<?php 
      foreach ($optApp->modules as $optMod) {
	?>
   <ul>
     <h4>
        <input type="checkbox" id="<?php echo $optMod->id; ?>" name="<?php echo $optMod->id; ?>" value="1" checked="checked" >
        <?php echo $optMod->name?>
      </h4>
    <?php
        foreach ($optMod->options as $optOpt) {
    ?>
      <li>
      	<label class="checkbox inline">
        		<input type="checkbox" id="option" name="option[]" value="<?php echo $optOpt->id?>" <?php if (isset($optOpt->check)) { ?>checked="checked"<?php } ?>> <?php echo $optOpt->name?>
      	</label>
        <?php
        if (isset($optOpt->option )) {
        ?>
        <ul>
        <?php
        foreach ($optOpt->option as $optionSon) {
        ?>
          <li>
            <label class="checkbox inline">
                <input type="checkbox" id="option" name="option[]" value="<?php echo $optionSon->id?>" <?php if (isset($optionSon->check)) { ?>checked="checked"<?php } ?>> <?php echo $optionSon->name?>
            </label>
          </li>
        <?php }?>
        </ul>
        <?php } ?>
      </li>
      <?php } ?>
  </ul>
	<?php 
      }
  ?>
    </li>
  </ul>
  <?php
		}
}
?>
