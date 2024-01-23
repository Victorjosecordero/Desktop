document.addEventListener("DOMContentLoaded", () => {

    const toma = new XMLHttpRequest();
    toma.open("GET", "data/mascotas.json");
    toma.send();
    toma.responseType = "json";

    toma.addEventListener("load", () => {

        if (toma.readyState == 4 && toma.status == 200) {
            const datos = toma.response;
            var usuarios = document.getElementById("usuarios")
            var incluir = ''
            for (var dato of datos){
                
                incluir += '<div class="accordion-item">';
                incluir += '<h2 class="accordion-header">';
                incluir += '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' + dato.id + '" aria-expanded="true" aria-controls="collapse' + dato.id + '">';
                incluir += dato.pertenencia;
                incluir += '</button>';
                incluir += '</h2>';
                incluir += '<div id="collapse' + dato.id + '" class="accordion-collapse collapse" data-bs-parent="#accordionExample"><div class="accordion-body"><div class="card" ><img class="mx-auto d-block" src="img/'+ dato.img+ '" class="card-img-top" alt="Foto de la mascota '+ dato.nombre+'"><div class="card-body"><h5 class="card-title">'+ dato.nombre+'</h5><p class="card-text"><ul class="list-group"><li class="list-group-item">Especie: '+ dato.especie +'</li><li class="list-group-item">Raza: '+ dato.raza +'</li><li class="list-group-item">Pertenencia: '+ dato.pertenencia +'</li><li class="list-group-item">Color: '+ dato.color +'</li><li class="list-group-item">Sexo: '+ dato.sexo +'</li><li class="list-group-item">Edad: '+ dato.edad +'</li></ul></p></div></div></div></div>';
                incluir += '</div>';

                usuarios.innerHTML = incluir;
  





            }
        

        } else {
            console.log("Hubo un error inesperado.")
        }

    })






});