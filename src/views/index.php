<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Simple</a></li>
    		<li><a href="#tabs-2">Validar Acceso</a></li>
    		<li><a href="#tabs-3">Only Own</a></li>
    		<li><a href="#tabs-4">Error</a></li>
    		<li><a href="#tabs-5">Succes</a></li>
    		<li><a href="#tabs-6">JSON</a></li>
    		<li><a href="#tabs-7">Export</a></li>
    		<li><a href="#tabs-8">Get ID</a></li>
  	</ul>
	 <div id="tabs-1">
        <article>
            <header>
                <h3>Simple</h3>
                <h1>/src/controller/test/simpletestController.php</h1>
            </header>
            <section id="description">
		En este ejemplo se genera un Controlador que solo retorna una pagina.
	    </section>
            <section id="code">
aa
	    </section>
            <footer>
                <a href="<?php echo $site; ?>test/simple">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-2">
        <article>
            <header>
                <h3>Validar Acceso</h3>
                <h1>/src/controller/test/accesstestController.php</h1>
            </header>
            <section id="description">Implementacion de una Controlador con Acceso Requerido</section>
            <section id="code">
		aa</section>
            <footer>
                <a href="<?php echo $site; ?>test/access">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-3">
        <article>
            <header>
                <h3>Only Own</h3>
                <h1>/src/controller/test/owntestController.php</h1>
            </header>
            <section id="description">Implementacion de una Controlador con Validacion de que la data que vea sea solo de un dusño definido</section>
            <section id="code">
		aa</section>
            <footer>
                <a href="<?php echo $site; ?>test/own">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-4">
        <article>
            <header>
                <h3>Error</h3>
                <h1>/src/controller/test/errortestController.php</h1>
            </header>
            <section id="description">Implementacion de una Controlador con Validacion de que la data que vea sea solo de un dusño definido</section>
            <section id="code">aaa</section>
            <footer>
                <a url="<?php echo $site; ?>test/error" id="btn-ajax">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-5">
        <article>
            <header>
                <h3>Succes</h3>
                <h1>/src/controller/test/succestestController.php</h1>
            </header>
            <section id="description">Implementacion de una Controlador con Validacion de que la data que vea sea solo de un dusño definido</section>
            <section id="code">aaa</section>
            <footer>
                <a url="<?php echo $site; ?>test/succes" id="btn-ajax">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-6">
        <article>
            <header>
                <h3>JSON</h3>
                <h1>Implementacion de una Controlador con Validacion de que la data que vea sea solo de un dusño definido</h1>
            </header>
            <section id="description"></section>
            <section id="code">aaa</section>
            <footer>
                <a href="<?php echo $site; ?>test/json">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-7">
        <article>
            <header>
                <h3>Export</h3>
                <h1>Implementacion de una Controlador con Validacion de que la data que vea sea solo de un dusño definido</h1>
            </header>
            <section id="description"></section>
            <section id="code">aaa</section>
            <footer>
                <a href="<?php echo $site; ?>test/export">Ver Demo</a>
            </footer>
        </article>
	</div>
	 <div id="tabs-8">
        <article>
            <header>
                <h3>Get ID</h3>
                <h1>Implementacion de una Controlador con Validacion de que la data que vea sea solo de un dusño definido</h1>
            </header>
            <section id="description"></section>
            <section id="code">aaa</section>
            <footer>
                <a href="<?php echo $site; ?>test/load/1">Ver Demo</a>
            </footer>
        </article>
    </div>
</div>
<!--
<script src="http://d1n0x3qji82z53.cloudfront.net/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("code");
    editor.setTheme("ace/theme/eclipse");
    editor.getSession().setMode("ace/mode/php");
    editor.setReadOnly(true);
    editor.setShowPrintMargin(false);
    editor.setHighlightActiveLine(false);
</script>
-->
<script>
$(function() {
	$( "#tabs" ).tabs();
});
</script>
