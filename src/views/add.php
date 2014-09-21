<h3><span class="glyphicon glyphicon-edit"></span> <?php echo $lang[$formData->title]; ?></h3>

<?php
// Verificamos si existe algun fileUpload
$fileUpload = false;
foreach ($formData->fields as $field) {
  if ($field->type == 'file') {
    $fileUpload = true;
  }
}
?>

<form id="formID" role="form" class="form-horizontal well" method="post" action="<?php echo $site . $formData->url; ?>" <?php if ($fileUpload) { ?> enctype="multipart/form-data" <?php } ?>>
<?php
foreach ($formData->fields as $field) {
  $data = $field->name;
  $value = $field->value;
  if (isset($formData->data->$data)) {
    $value = $formData->data->$data;
  } 

  // Verificamos la evaluacion
  if (isset($field->evaluation)) {
      $elem = $field->evaluation->param;
      $condition = $field->evaluation->condition;
      $val = $formData->data->$elem;
      $show = false;
      switch ($condition) {
          case "eq":                    
          if ($val == $field->evaluation->value) {
            $show = true;
          }
              break;
          case "neq":
              if ($val != $field->evaluation->value) {
            $show = true;
          }
              break;
          case "higher":
              if ($val > $field->evaluation->value) {
            $show = true;
          }
              break;
          case "less":
              if ($val < $field->evaluation->value) {
            $show = true;
          }
              break;
      }
      $field->show = $show;
  }

if ($field->show) {
  if ($field->type == 'hidden') {
?>
  <input type="hidden" id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>" value="<?php echo $value; ?>">
<?php
  } else {
    $colsClass = 'col-lg-10';
    if ($field->type != 'ajax') {
      if ($field->length <= 10) {
        $colsClass = 'col-lg-2';
      } else if ($field->length <= 20) {
        $colsClass = 'col-lg-4';
      } else if ($field->length <= 50) {
        $colsClass = 'col-lg-5';
      } else if ($field->length <= 100) {
        $colsClass = 'col-lg-6';
      }
    }
?>
  <div class="form-group">
    <label class="col-lg-2 control-label" for="<?php echo $field->name; ?>"><?php if (isset($field->key)) { echo $lang[$field->key]; } ?></label>
    <div <?php if ($field->type == 'ajax') { ?> id="<?php echo $field->name; ?>" <?php } ?> class="<?php echo $colsClass  ?>">
    <?php 
  if ($field->type == 'ajax') {
    echo '<!-- Ajax -->';
  } else if ($field->type == 'text') {
    ?>
     <textarea id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>" placeholder="<?php echo $lang[$field->key]; ?>" class="form-control  <?php if ($field->validate) { ?>validate[required]<?php }?>"><?php echo $value; ?></textarea>
   
  <?php 
  } else if ($field->type == 'label') {
    ?>
      <p class="form-control-static">
        <input type="hidden" name="<?php echo $data; ?>" value="<?php echo $value; ?>" />
        <?php echo $value; ?>
      </p>
      <?php
  } else if ($field->type == 'select') {
    ?>
      <?php
      if ($field->ajax == false && count($field->list) == 1) {
        foreach ($field->list as $elem) {
      ?>
      <p class="form-control-static">
        <input type="hidden" name="<?php echo $field->name; ?>" value="<?php echo $elem->id; ?>" />
        <?php echo $elem->name; ?>
      </p>
      <?php
        }
      } else {
      ?>
     <select id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>" class="form-control  <?php if ($field->validate) { ?>validate[required]<?php }?>">
      <option value=""><?php echo $lang["SELECT_DATA"]; ?></option>      
      <?php
      foreach ($field->list as $elem) {
      ?>
      <option value="<?php echo $elem->id; ?>" <?php if ($elem->id == $value) { echo "selected='selected'"; } ?>><?php echo $elem->name; ?></option>   
      <?php 
      }    
      ?>
    </select> 
    <?php 
      }
  } else if ($field->type == 'detail') {
    ?>
    <p class="form-control-static">
      <?php echo $value; ?>
    </p>
    <?php 
  } else if ($field->type == 'checkbox') {
    ?>
    <input type="checkbox" name="<?php echo $field->name; ?>" id="<?php echo $field->name; ?>" value="1" <?php if ($value == 1) { ?>  checked="checked"<?php }?>>
    <?php 
  } else if ($field->type == 'radio') {
      foreach ($field->list as $elem) {
    ?>
    <div class="radio">
        <label>
          <input type="radio" name="<?php echo $field->name; ?>" id="<?php echo $field->name; ?>" value="<?php echo $elem->id; ?>" <?php if ($value == $elem->id) { ?>  checked<?php }?>>
          <?php echo $elem->name; ?>
        </label>
      </div>
    <?php 
      } 
  } else if ($field->type == 'multiGroupRadio') {
    foreach ($field->list as $optApp) {
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
            <input type="checkbox" id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>[]" value="<?php echo $optOpt->id?>" <?php if (isset($optOpt->check)) { ?>checked="checked"<?php } ?>> <?php echo $optOpt->name?>
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
                <input type="checkbox" id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>[]" value="<?php echo $optionSon->id?>" <?php if (isset($optionSon->check)) { ?>checked="checked"<?php } ?>> <?php echo $optionSon->name?>
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
  } else if ($field->type == 'date') {
?>
<input type="date" id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>" placeholder="<?php echo $lang[$field->key]; ?>" class="form-control <?php if ($field->validate) { ?>validate[required]<?php }?>" maxlength="<?php echo $field->length; ?>" value="<?php echo $value; ?>">
<?php 

  } else if ($field->type == 'file') {
  ?>
        <input id="<?php echo $field->name; ?>" type="file" name="<?php echo $field->name; ?>"  class="form-control <?php if ($field->validate) { ?>validate[required]<?php }?>" >
  <?php
  } else if ($field->type == 'linklist') {
    foreach ($field->list as $link) {
  ?>
      <a href="<?php echo $site . $field->url . '?val=' . $link->id; ?>" title="<?php echo $field->name; ?>" class="btn btn-primary"><?php echo $link->name; ?></a>
  <?php
    } 
  } else if ($field->type == 'link') {
    if (isset($value) && $value != 'NULL') {
  ?>
      <a href="<?php echo $site . $field->url  ?>" title="<?php echo $field->name; ?>" class="btn btn-primary"><?php echo $value; ?></a>
  <?php
    } else {
      echo $lang['NOT_FOUND_FILE'];
    }
  } else {
    $type = "text";
    $validation = "validate[";
    $val = false;

    if ($field->validate) {
      $validation .= "required";
      $val = true;
    }

    if ($field->type == 'number') {
      $type = "number";

      if ($val) {
        $validation .= ",";
      }
      $validation .= "custom[integer]";
    } else if ($field->type == 'email') {
      $type = "email";
      if ($val) {
        $validation .= ",";
      }
      $validation .= "custom[email]";
    } else if ($field->type == 'password') {
      $type = "password";
    } else if ($field->type == 'file') {
      $type = "file";
    }
    $validation .= "]";


  ?>
    <input type="<?php echo $type; ?>" id="<?php echo $field->name; ?>" name="<?php echo $field->name; ?>" placeholder="<?php echo $lang[$field->key]; ?>" class="form-control <?php echo $validation; ?>" maxlength="<?php echo $field->length; ?>" value="<?php echo $value; ?>">
  <?php 
    }    
  ?>
    </div>
  </div>
<?php 
    }
  }
}
?>
<div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
    <?php 
    $id = "pf_md_btn_crud";
    if ($fileUpload) {
      $id = "pf_md_btn_submit";
    } 
    ?>
    <button type="button" id="<?php echo $id; ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> <?php echo $lang['BUTTON_SAVE']; ?></button>
    <button type="button" id="pf_btn_back" class="btn btn-default"> <?php echo $lang['BUTTON_CANCEL']; ?></button>
  </div>
</div>
</form>
