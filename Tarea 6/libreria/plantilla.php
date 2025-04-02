<?php

// Definición de la clase Plantilla, utilizada para manejar la estructura visual de la página
class Plantilla
{
    // Variable estática para aplicar el patrón Singleton y evitar múltiples instancias de la clase
    static $instance = null;

    // Método estático para aplicar la plantilla
    public static function aplicar()
    {
        // Si la instancia no ha sido creada, se crea una nueva
        if (self::$instance == null) {
            self::$instance = new Plantilla();
        }
    }

    // Constructor de la clase Plantilla
    public function __construct()
    {
        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>🐴Toy Story🐎</title>
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">


            <!-- Enlace a una fuente moderna para mejorar la estética del diseño -->
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

            <style>
                /* Estilos generales del cuerpo */
                body {
                    font-family: 'Comic Sans MS', cursive, sans-serif;
                    margin: 0;
                    padding: 0;
                    color: black;
                    background-size: cover;
                    background-attachment: fixed;
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh;
                    animation: cambiarFondo 60s infinite linear;
                    /* Activa la animación */
                }

                /* Precarga las imágenes */
                body::after {
                    content: "";
                    position: fixed;
                    width: 0;
                    height: 0;
                    overflow: hidden;
                    z-index: -1;
                    background-image: url('Img/toystory4-nubedejuguetes.png'),
                        url('Img/backgroud-toy-story-4.png'),
                        url('Img/fondo-toy-story-2.png'),
                        url('Img/fondo-toy-story.png');
                }

                /* Animación sin pantallazos blancos */
                @keyframes cambiarFondo {
                    0% {
                        background-image: url('Img/toystory4-nubedejuguetes.png');
                    }

                    25% {
                        background-image: url('Img/backgroud-toy-story-4.png');
                    }

                    50% {
                        background-image: url('Img/fondo-toy-story-2.png');
                    }

                    75% {
                        background-image: url('Img/fondo-toy-story.png');
                    }

                    100% {
                        background-image: url('Img/toystory4-nubedejuguetes.png');
                    }

                    /* Vuelve al inicio */
                }

                .header {
                    /* background: url('Img/fondo-menu.png') no-repeat; */
                    background: transparent;
                    background-size: 110% auto;
                    background-position: 50% 5%;
                    /* Controla qué parte de la imagen se muestra */

                    position: fixed;
                    /* Fija el header en la parte superior */
                    top: 0;
                    /* Asegura que esté pegado arriba */
                    left: 0;
                    width: 100vw;
                    /* Que ocupe todo el ancho de la pantalla */
                    height: 80px;
                    /* Ajusta la altura si es necesario */

                    z-index: 1000;
                    /* Asegura que quede encima de otros elementos */
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }


                .nav_container {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    /*max-width: 1300px;*/
                    margin: auto;
                    padding: 0 20px;
                }

                .nav_logo img {
                    height: 50px;
                }

                .nav_list {
                    list-style: none;
                    display: flex;
                    gap: 20px;
                }

                .nav_link {
                    text-decoration: none;
                    color: white;
                    font-weight: bold;
                    font-size: 18px;
                    transition: 0.3s;
                    padding: 5px 10px;
                }

                .nav_link:hover {
                    background: #rgba(255, 255, 255, 0.3);
                    border-radius: 5px;
                }

                .login-link {
                    border: 2px solid white;
                    border-radius: 25px;
                    padding: 5px 15px;
                    transition: 0.3s;
                }

                .login-link:hover {
                    background: white;
                    color: rgb(75, 207, 247);
                }

                .nav_toggle,
                .nav_close {
                    display: none;
                    font-size: 24px;
                    cursor: pointer;
                    color: white;
                }

                .nav_close {
                    margin-top: 200px;
                }

                @media (max-width: 768px) {
                    .nav_menu {
                        position: fixed;
                        top: 0;
                        right: -100%;
                        width: 60%;
                        height: 100vh;
                        background: rgba(135, 206, 235, 0.5);
                        /* Skyblue con opacidad del 80% */
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        transition: 0.3s;
                        backdrop-filter: blur(10px);
                        /* Aplica un desenfoque */
                    }

                    .show-menu {
                        right: 0;
                    }

                    .nav_list {
                        flex-direction: column;
                        gap: 30px;
                    }

                    .nav_toggle,
                    .nav_close {
                        display: block;
                    }
                }

                .main-content {
                    flex: 1;
                }

                /* Contenedor principal de la página */
                .container {
                    flex: 1;
                    width: auto;
                    text-align: center;

                }

                .bienvenida {
                    text-align: center;
                    background: skyblue;
                    color: white;
                    border-radius: 15px;
                    margin: 200px auto;
                    max-width: 1100px;
                    box-shadow: 0px 4px 10px rgba(130, 200, 229, 0.5);
                }

                .bienvenida h1 {
                    font-size: 2.5em;
                    text-shadow: 2px 2px 5px rgba(255, 255, 255, 0.5);
                }

                .bienvenida p {
                    font-size: 1.2em;
                    margin: 10px 0;
                }

                /* Botones */
                .boton-principal,
                .boton-secundario {
                    display: inline-block;
                    text-decoration: none;
                    font-size: 1.2em;
                    padding: 12px 24px;
                    margin: 10px;
                    border-radius: 10px;
                    transition: 0.3s ease;
                }

                .boton-secundario {
                    background-color: rgb(0, 47, 255);
                    color: white;
                    box-shadow: 0px 4px 10px rgba(0, 140, 255, 0.5);
                }

                .boton-secundario:hover {
                    background-color: rgb(0, 140, 255, 0.5);
                }

                /* Estilo para los encabezados principales */
                h1 {
                    font-size: 3.5em;
                    color: #ffffff;
                    /* margin-bottom: 30px; */
                    text-shadow: 4px 4px 6px rgba(205, 105, 180, 0.6);
                    text-transform: uppercase;
                    font-family: 'Comic Sans MS', cursive, sans-serif;
                    text-align: center;
                    margin-top: 150px;
                }

                /* Estilos para los párrafos */
                p {
                    font-size: 1.5em;
                    color: #fff;
                    line-height: 1.6;
                    text-align: center;
                    font-family: 'Arial', sans-serif;
                }

                /* Estilos para etiquetas y campos de entrada */
                label {
                    font-size: 1.2em;
                    color: #ffffff;
                    display: block;
                    font-weight: block;
                    margin-bottom: 5px;
                }

                /* Alinear etiquetas a la izquierda dentro del contenedor */
                input {
                    padding: 12px;
                    margin-top: 5px;
                    width: 95%;
                    border: 2px solid skyblue;
                    border-radius: 10px;
                }

                .container label {
                    text-align: left;
                }

                h2 {
                    color: #ff4500;
                    /* Naranja vibrante */
                    font-size: 1.8em;
                    margin-bottom: 10px;
                    text-shadow: 1px 1px 3px rgba(255, 69, 0, 0.3);
                }

                /* Estilos para los botones */
                .boton {
                    background-color: skyblue;
                    color: white;
                    padding: 12px 24px;
                    font-size: 1.3em;
                    text-align: center;
                    text-decoration: none;
                    border-radius: 12px;
                    cursor: pointer;
                    transition: background-color 0.3s ease, transform 0.2s ease;
                    border: none;
                    box-shadow: 0px 4px 10px rgba(255, 20, 147, 0.5);
                    margin-top: 15px;
                }

                .boton:hover {
                    background-color: #ff1493;
                    transform: scale(1.1);
                }

                /* Efecto al presionar los botones */
                .boton:active {
                    transform: scale(0.95);
                }

                /* Asegurar que el título esté centrado */
                h1.title {
                    text-align: center;
                }


                /* Estilo del pie de página */
                .footer {
                    background: transparent;
                    text-align: center;
                    font-size: 1.1em;
                    width: auto;
                    padding: 0px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    background-size: 100% auto;
                    background-position: 50% 77.9%;
                    /* Controla qué parte de la imagen se muestra */
                    z-index: 1000;
                }

                .footer p {
                    color: black;
                }

                .personajes-container {
                    margin-top: 140px;
                    text-align: center;
                    /* background: skyblue; */
                }

                .titulo-personajes {
                    font-size: 2.5em;
                    color: white;
                    font-weight: bold;
                    margin-top: 90px;
                }

                .personajes {
                    display: flex;
                    justify-content: center;
                    gap: 30px;
                    flex-wrap: wrap;
                }

                .personaje {
                    text-align: center;
                    width: 310px;
                    padding: 20px;
                    background-color: white;
                    border-radius: 15px;
                    box-shadow: 0px 4px 10px rgba(130, 200, 299, 0.5);
                    transition: transform 0.3s ease;
                }

                .personaje:hover {
                    transform: scale(1.05);
                }

                .personaje img {
                    width: 100%;
                    max-width: 150px;
                    height: 150px;
                    object-fit: cover;
                    border-radius: 50%;
                    border: 5px solid skyblue;
                    box-shadow: 0px 4px 10px rgba(130, 200, 299, 0.5);
                }

                .personaje h3 {
                    font-size: 1.3em;
                    color: skyblue;
                    font-weight: bold;
                    margin-top: 10px;
                }

                /* 📜 Profesión o rol */
                .profesion {
                    font-size: 1em;
                    color: #555;
                    font-style: italic;
                }

                /* 🎂 Edad */
                .edad {
                    font-size: 1em;
                    color: #333;
                }

                /* Botones de acción */
                .acciones {
                    margin-top: 15px;
                }

                /* Estilo para "Ver Detalle" */
                .btn-detalle {
                    display: inline-block;
                    background-color: skyblue;
                    color: white;
                    padding: 8px 15px;
                    font-size: 1em;
                    border-radius: 6px;
                    text-decoration: none;
                    transition: background-color 0.3s ease;
                }

                .btn-detalle:hover {
                    background-color: #ff1493;
                }

                /* Botón de eliminar */
                .btn-eliminar {
                    background-color: #ff4500;
                    color: white;
                    border: none;
                    padding: 8px 12px;
                    border-radius: 6px;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                    margin-left: 5px;
                }

                .btn-eliminar:hover {
                    background-color: #c0392b;
                }

                .mensaje-vacio {
                    text-align: center;
                    font-size: 18px;
                    color: #e91e63;
                    font-weight: bold;
                    background: #fff0f6;
                    padding: 15px;
                    border-radius: 10px;
                    margin-top: 20px;
                }

                .success-container {
                    text-align: center;
                    background: linear-gradient(135deg, #ffebf0, #ffd1dc);
                    padding: 0px 1px 10px 10px;
                    border-radius: 15px;
                    box-shadow: 0 8px 20px rgba(255, 20, 147, 0.3);
                    margin: 50px auto;
                    max-width: 420px;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    animation: fadeIn 0.8s ease-in-out;
                }

                .success-container:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 12px 25px rgba(255, 20, 147, 0.5);
                }

                .success-title {
                    font-size: 26px;
                    color: #d63384;
                    font-weight: bold;
                    margin-bottom: 12px;
                    text-shadow: 2px 2px 5px rgba(255, 20, 147, 0.3);
                }

                .success-message {
                    font-size: 18px;
                    color: #6b1e5c;
                    /* 💡 Cambié el color del texto para mayor contraste */
                    /* Texto más oscuro para mejor legibilidad */
                    margin-bottom: 15px;
                    font-weight: 500;
                }

                /* Animación de entrada */
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(-10px);
                    }

                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            </style>

        </head>

        <body>
            <div class="container">

                <?php
    }

    public static function navbar()
    {
        ?>
                <header class="header" id="header">
                    <nav class="nav_container">

                        <a href="index.php" class="nav_logo">
                            <img src="Img/toystorylogo2.png" alt="nav_logo-img">
                        </a>

                        <div class="nav_menu" id="nav-menu">

                            <ul class="nav_list">
                                <li class="nav_item"><a href="index.php" class="nav_link active-link">Inicio</a></li>
                                <li class="nav_item"><a href="registro.php" class="nav_link active-link">Registro de Elenco</a>
                                </li>
                                <li class="nav_item"><a href="reparto.php" class="nav_link active-link">Elenco</a></li>
                                <!-- <li class="nav_item"><a href="Login.php" class="nav_link login-link">Login</a></li> -->
                            </ul>

                            <div class="nav_close" id="nav-close"><i class='bx bx-exit'></i></div>

                        </div>

                        <div class="nav_toggle" id="nav-toggle"><i class="bx bx-grid-alt"></i></div>
                    </nav>
                </header>

                <script>

                    const navToggle = document.getElementById('nav-toggle');
                    const navClose = document.getElementById('nav-close');
                    const navMenu = document.getElementById('nav-menu');

                    navToggle.addEventListener('click', function () {
                        navMenu.classList.toggle('show-menu');
                    });

                    navClose.addEventListener('click', function () {
                        navMenu.classList.remove('show-menu');
                    });
                    document.addEventListener('click', function (event) {
                        if (!navMenu.contains(event.target) && !navToggle.contains(event.target))
                            navMenu.classList.remove('show-menu');
                    });
                </script>

                <?php
    }

    // Destructor para cerrar la plantilla y agregar el pie de página
    public function __destruct()
    {
        ?>
            </div> <!-- Fin del contenedor principal -->

            <!-- Pie de página -->
            <footer class="footer">
                <p>✨ Hasta el infinito... ¡y más allá! ✨ 🐎Jonathan Frias - 20231117🐎</p>

            </footer>

        </body>

        </html>
        <?php
    }
}
?>