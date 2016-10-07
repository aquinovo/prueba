
< !DOCTYPE html>
< html>
< head>
< title>Ventana Emergente< /title>
    < meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><//title>
< script src="jquery-2.0.3.min.js">< /script>
< script src="jquery.bpopup-0.9.0.min.js">< /script>

< script type="text/javascript">
    ;(function($) {
         // Cuando la página esté cargada
        $(function() {
            // Evento click
            $('#boton').on('click', function(e) {
                // Prevenir la acción por defecto
                e.preventDefault();
                // Se lanza el método bPopup 
                $('#elemento_a_mostrar').bPopup();
            });
        });
    })(jQuery);
 < /script>
< /head>

< body>
     < !-- Botón -->
            < button id="boton">Mostrar mensaje< /button>
            < !-- Contenido a mostrar -->
            < div id="elemento_a_mostrar">El plugin bPopup funciona correctamente< /div>
< /body>
< /html>