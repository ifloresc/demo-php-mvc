<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
<?php 
	echo $lang[$msg]; 
?>
</div>

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
            } else {
            ?>
            location.reload();
            <?php
            }
            ?>
        });
    }
});

</script>