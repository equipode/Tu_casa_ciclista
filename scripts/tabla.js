function tiempoReal() {
    var tabla = $.ajax({
        url: '../JQUERY/tablaConsulta.php',
        dataType: 'text',
        async: false
    }).responseText;

    document.getElementById("miTabla").innerHTML = tabla;
}
setInterval(tiempoReal, 1000);

