function tiempoReal() {
    var tabla = $.ajax({
        url: '../JQUERY/tabla.php',
        dataType: 'text',
        async: false
    }).responseText;

    document.getElementById("miTabla").innerHTML = tabla;
}
setInterval(tiempoReal, 1000);

