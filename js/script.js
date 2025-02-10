fetch('https://restcountries.com/v3.1/all') // Realiza una petición GET a la API de Rest Countries
    .then(response => {
        $('#cargando').hide();
        return response.json()}) // Convierte la respuesta en un objeto JSON
    .then(data => { // Captura los datos
        let countries = data; // Almacena los datos en una variable
        countries.forEach(country => { // Recorre cada país
            let img = document.createElement('img'); // Crea un elemento de imagen
            img.src = country.flags.png; // Establece la ruta de la imagen
            img.alt = `Bandera de ${country.name.common}`; // Establece el texto alternativo de la imagen
            banderas.appendChild(img); // Agrega la imagen al cuerpo del documento
        });
    })
    .catch(error => console.error('Error:', error)); // Captura cualquier error y lo muestra en la consola

$(document).ready(function() {
    $('#banderas').on('click', 'img', function() {
        const src = $(this).attr('src');
        $('#enlarged-image').attr('src', src);
        $('#overlay, #enlarged-image-container').fadeIn();
    });

    $('#overlay').on('click', function() {
        $('#overlay, #enlarged-image-container').fadeOut();
    });
});