<div class="ui-widget"  id="alert">
	<div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em;">
		<p>
			<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
			<strong>Exito:</strong>						
<?php 
if (isset($msg)) {
	echo $msg; 
} else {
	echo 'Operacion Realizada Exitosamente !';
}
?>
		</p>
		<!--input type="button" id="pf_md_btn_refresh" value="Recargar" /-->
	</div>
</div>
<script>

$(function () {
    var $alert = $('#alert');
    if($alert.length)
    {
        var alerttimer = window.setTimeout(function () {
            $alert.trigger('click');
        }, 3000);
        $alert.animate({height: $alert.css('line-height') || '50px'}, 200)
        .click(function () {
            window.clearTimeout(alerttimer);
            $alert.animate({height: '0'}, 200);
            $alert.hide();
            location.reload();
        });
    }
});

</script>
