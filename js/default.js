var site = "/demo-php-mvc/";

$(document).ready(function(){
	
	jQuery("#formID").validationEngine();
	
	$( "#alert" ).hide();

    /* Carga de combo por Ajax */
    $("#formID").relatedSelects({
		onChangeLoad: site + '/json/state',
		defaultOptionText: 'Seleccione',
		selects: {
			'type':		{ loadingMessage:'Cargando Tipos' },
			'state':	{ loadingMessage:'Cargando Estados' }
		}
	});

	$("#formID").relatedSelects({
		onChangeLoad: site + '/json/commune',
		defaultOptionText: 'Seleccione',
		selects: {
			'country':	{ loadingMessage:'Cargando Paises' },
			'city':	{ loadingMessage:'Cargando Ciudades' },
			'commune':	{ loadingMessage:'Cargando Comunas' }
		}
	});

	$("#formID").relatedSelects({
		onChangeLoad: site + '/json/client',
		defaultOptionText: 'Seleccione',
		selects: {
			'supplier':	{ loadingMessage:'Cargando Clientes' },
			'subclient':	{ loadingMessage:'Cargando Sub-Clientes' }
		}
	});
	
	/**
	 * Botones para paginas sin modales
	 */
	$("html").delegate("#pf_btn_accept", "click", function() {
		if ($('#formID').validationEngine('validate')) {	
			submit("formID", "content");
		}
    });
	
	$("body").enterKey(function () {
		$('input[type="button"]').trigger('click');
	})
	
	/**
	 * Botones para paginas en modales
	 */
	$("html").delegate("#pf_md_btn_accept", "click", function() {
		jQuery("#formIDModal").validationEngine();
		if ($('#formIDModal').validationEngine('validate')) {	
			submit("formIDModal", "content");
		}
    });
	
	$("html").delegate("#pf_md_btn_crud", "click", function() {
		if ($('#formID').validationEngine('validate')) {
			$(this).addClass('disabled');

			var url =  $("#formID").attr('action');
			var data = $("#formID").serialize();
			
			var resp = callAjax(url, data);
			$("#alert_msg").html(resp);
			
			$("#alert").show( 'blind', {}, 500 );

			$(this).removeClass('disabled');
		}
    });

    $("html").delegate("#pf_md_btn_submit", "click", function() {
		if ($('#formID').validationEngine('validate')) {
			$(this).addClass('disabled');

			$("#formID").submit();
		}
    });
	
	$("html").delegate("#pf_md_btn_refresh", "click", function() {
			location.reload();
    });
	
	$("html").delegate("#delete", "click", function() {
		$(this).addClass('disabled');
		var url = $(this).attr("url");
		
		var resp = callAjax(url, {});
		$("#alert_msg").html(resp);
		
		$("#alert").show( 'blind', {}, 500 );

		$(this).removeClass('disabled');
	});
	
	$("html").delegate("#pf_btn_back", "click", function() {
	        parent.history.back();
	        return false;
	   });
	
	$("html").delegate("#btn-ajax", "click", function() {
		var url = $(this).attr("url");
		
		var resp = callAjax(url, {});
		
		$("#alert_msg").html(resp);
		
		$("#alert").show( 'blind', {}, 500 );
	});
	
	$( "#packet" ).change(function() {
		var data = $("#formID").serialize();
		var url =  site + 'profile/option';
		
		load(url, data, 'options');
	});

	$('a').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
    });
	
	
	function submit(form, div) {
		var data = $("#" + form).serialize();
		var url =  $("#" + form).attr('action');
		
		load(url, data, div);
	}
	
	$( "#dialog-form" ).dialog({
		autoOpen: false,
		height: 500,
		width: 600,
		modal: true,
		show: "fade",
		hide: "explode"
	});
	
	/* Function */
	function loadModal(url) {
		$( "#dialog-form" ).dialog( "open" );
		load(url, '', "form-data");
		return false;
	}
	
	function load(url, data, div) {
		var html = callAjax(url, data);
		// Verificamos si es un error
		if (html.indexOf("Error") != -1) {
			$("#alert_msg").html(html);
			
			$("#alert").show( 'blind', {}, 500 );
		} else {
			$("#" + div).html(html); 
		}
	}
	
	function callAjax(url, data) {
		 //start the ajax
		rq = $.ajax({
            url: url, 
            
            async: false,
             
            //GET method is used
            type: "POST",
 
            //pass the data         
            data: data,     
             
            //Do not cache the page
            cache: false,
             
            //success
            success: function (json, status, rq) {			   
    			if (!ajaxFailJson(json)) {
    				rq.data = json;				
    			};
    		}     
        });
		return rq.data;
	}
	
	function ajaxFailJson(json) {
		if (json == null || json.Status) {
			if (json == null) {
				// Error
				return true;
			} else if (json.Status.StatusCode != '') {
				// Error
				return true;
			}
		}
		return false;
	}
	
	 
});

function checkRut(field, rules, i, options) {
	var rut = field.val();
	var dig = $.Rut.getDigito(rut);
	
	$("#dig").val(dig);

	rut = rut + '-' +  dig;

	if (!$.Rut.validar(rut)) {
		$("#dig").val('');
		return '* El rut ingresado es incorrecto';
	} 
}
