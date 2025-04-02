<?php
require_once 'vendor/autoload.php'; // Carga Dompdf con Composer
require_once 'libreria/db_config.php';
require_once 'libreria/conexion.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Verificar si se recibió un ID
if (!isset($_GET['id'])) {
    die("❌ Error: No se especificó un personaje.");
}

$id = $_GET['id'];
$sql = "SELECT * FROM personajes WHERE id = ?";
$personaje = Conexion::consulta($sql, [$id]);

if (empty($personaje)) {
    die("❌ Error: El personaje no existe.");
}

$personaje = $personaje[0]; // Obtener datos del personaje

// Configurar Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$options->set('defaultFont', 'Arial'); // Fuente moderna

$dompdf = new Dompdf($options);

// Plantilla HTML para el PDF
$html = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <style>
        body {
            font-family: 'Comic Sans MS', sans-serif;
            text-align: center;
            background-color: #87CEEB;
            color: #333;
        }
        .container {
            border: 5px solid #FFD700;
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            background: white;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #FF4500;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }
        .image img {
            width: 180px;
            height: auto;
            border-radius: 10px;
            border: 3px solid #FFD700;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }
        .info {
            text-align: left;
            margin-top: 20px;
            font-size: 18px;
            padding: 10px;
            background: #FFE4B5;
            border-radius: 10px;
            box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .info p {
            padding: 8px;
            border-bottom: 2px solid #FF4500;
            font-weight: bold;
        }
        .icon {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1> Perfil del Personaje </h1>
        <div class='image'>
            <img src='{$personaje['foto']}' alt='Foto del personaje'>
        </div>
        <div class='info'>
            <p><strong>Nombre:</strong> {$personaje['nombre']}</p>
            <p><strong>Color Representativo:</strong> {$personaje['color']}</p>
            <p><strong>Tipo:</strong> {$personaje['tipo']}</p>
            <p><strong>Nivel:</strong> {$personaje['nivel']}</p>
        </div>
        <div class='footer'>
            <p><strong></strong> {$personaje['frase']}</p>
        </div>
    </div>
</body>
</html>
";

// Generar el PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait'); // Formato vertical
$dompdf->render();

// Enviar el PDF al navegador
$dompdf->stream("Perfil_{$personaje['nombre']}.pdf", ["Attachment" => false]);
?>
