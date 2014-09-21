<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <p><?php echo $lang[$msg]; ?></p>
</div>
<?php
if ($msg == 'error.timeout') {
?>
<div class="well">
	<a href="<?php echo $site; ?>" class="btn btn-danger btn-lg"><?php echo $lang['BUTTON_LOGIN']; ?></a>
</div>
<?php
}
?>

<script>

$(function () {
    var $alert = $('#alert');
    if($alert.length)
    {
        var alerttimer = window.setTimeout(function () {
            $alert.trigger('click');
        }, 2000);
        $alert.animate({height: $alert.css('line-height') || '50px'}, 200)
        .click(function () {
            window.clearTimeout(alerttimer);
            $alert.animate({height: '0'}, 200);
            $alert.hide();
            <?php
            if (isset($redirect)) {
            ?>
            document.location.href = '<?php echo  $redirect; ?>';
            <?php
            } 
            ?>
        });
    }
});

</script>