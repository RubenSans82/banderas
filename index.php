<?php
// URL de la API de RestCountries (v3.1) para obtener todos los países
$url = "https://restcountries.com/v3.1/all";

// Inicializar cURL
$curl = curl_init();

// Configurar opciones de cURL
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Para que el resultado se retorne como string
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Opcional: para omitir verificación SSL

// Ejecutar la petición
$response = curl_exec($curl);

// Verificar si ocurrió algún error en la petición
if (curl_errno($curl)) {
    echo 'Error en la solicitud: ' . curl_error($curl);
    curl_close($curl);
    exit;
}

// Cerrar la sesión cURL
curl_close($curl);

// Decodificar la respuesta JSON a un array asociativo
$data = json_decode($response, true);

// Verificar que la decodificación haya sido exitosa
if ($data === null) {
    echo "Error al decodificar la respuesta JSON.";
    exit;
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banderas</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-3.7.1.min.js"></script>
<!--    <script src="js/script.js" defer></script> -->
</head>

<body>
    <header>
        <div>
        <h1>Banderas</h1>
        </div>
    </header>
    <main id="banderas">
        <!-- <img src="img/css-loader.gif" id="cargando" alt=""> -->
        <?php
        // Recorrer el array e imprimir el nombre común de cada país
foreach ($data as $pais) {
    // En la API v3.1, el nombre del país se encuentra en $pais['name']['common']
    echo $pais['name']['common'] . "<img style='width:200px' src='{$pais['flags']['png']}' alt='' ><br>";
}
?>
    </main>
    <div id="overlay"></div>
    <div id="enlarged-image-container">
        <img id="enlarged-image" src="" alt="">
        <p id="country-name"></p>
    </div>
    <footer>

    </footer>
</body>

</html>