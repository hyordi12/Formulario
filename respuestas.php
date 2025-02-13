<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<html><head><title>Respuestas del Formulario</title></head><body>";
    echo "<h1>Respuestas del Formulario de registro para Congreso de Ciencias Exactas de Ingeniería</h1>";
    
    function verificarCampo($campo, $nombre) {
        if (isset($_POST[$campo])) {
            $valor = trim($_POST[$campo]);
            if (!empty($valor)) {
                echo "<strong>$nombre:</strong> " . htmlspecialchars($valor) . "<br>";
            } else {
                echo "<strong>$nombre:</strong> No se agregó un dato.<br>";
            }
        } else {
            echo "<strong>$nombre:</strong> No se agregó un dato.<br>";
        }
    }

    function verificarArray($campo, $nombre) {
        if (isset($_POST[$campo]) && is_array($_POST[$campo]) && !empty($_POST[$campo])) {
            echo "<strong>$nombre:</strong> " . implode(", ", array_map('htmlspecialchars', $_POST[$campo])) . "<br>";
        } else {
            echo "<strong>$nombre:</strong> No se agregó un dato.<br>";
        }
    }

    verificarCampo("nombre", "Nombre");
    verificarCampo("institucion", "Institución");
    verificarCampo("edad", "Edad");
    verificarCampo("sexo", "Sexo");
    verificarArray("interes", "Área de interés");
    verificarCampo("fecha_asistencia", "Fecha de Asistencia");
    verificarCampo("dias_asistencia", "Días de Asistencia");
    verificarCampo("email", "Correo Electrónico");
    
    echo "</body></html>";
} else {
    echo "<html><head><title>Error</title></head><body>";
    echo "<h1>No se enviaron datos</h1>";
    echo "</body></html>";
}
?>