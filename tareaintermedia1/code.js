document.addEventListener('DOMContentLoaded', function () {

    fetch('alojamientos.json')
        .then(response => response.json())
        .then(data => displayAlojamientos(data.alojamientos))
        .catch(error => console.error('Error cargando los alojamientos:', error));
}, { once: true });

function displayAlojamientos(alojamientos) {

    const alojamientosContainer = document.getElementById("alojamientosContainer");

    alojamientos.forEach(alojamiento => {
        const alojamientoDiv = document.createElement("div");
        alojamientoDiv.className = "alojamiento";


        const imagenDiv = document.createElement("div");
        imagenDiv.className = "imagen";
        const imagen = document.createElement("img");
        imagen.src = alojamiento.imagen;
        imagen.alt = "Imagen de la Finca: "+alojamiento.nombre;
        imagenDiv.appendChild(imagen);
        alojamientoDiv.appendChild(imagenDiv);

        const textoDiv = document.createElement("div");
        textoDiv.className = "texto";
        const titulo = document.createElement("h3");
        titulo.textContent = alojamiento.nombre;
        const descripcion = document.createElement("p");
        descripcion.textContent = alojamiento.descripcion;
        const localizacion = document.createElement("p");
        localizacion.textContent = `Localidad: ${alojamiento.localidad}, Provincia: ${alojamiento.provincia}`;
        textoDiv.appendChild(titulo);
        textoDiv.appendChild(descripcion);
        textoDiv.appendChild(localizacion);
        alojamientoDiv.appendChild(textoDiv);


        alojamientosContainer.appendChild(alojamientoDiv);
    });

}

function hacer(){
        
    var show = document.getElementById("offcanvas");
        show.classList.toggle("show");
    
}


document.addEventListener("keydown", function(event){
if(event.key === "l"){
    hacer();
}
});



