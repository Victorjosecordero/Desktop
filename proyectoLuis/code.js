document.addEventListener('DOMContentLoaded', function () {
    // Cargar libros desde el archivo JSON
    fetch('libros.json')
        .then(response => response.json())
        .then(data => displaylibros(data.libros))
        .catch(error => console.error('Error cargando los libros:', error));
}, { once: true });


function displaylibros(libros) {
    const listaLibros = document.getElementById('listaLibros');

    libros.forEach(libro => {
        const libroDiv = document.createElement('div');
        libroDiv.classList.add('libro');

        const titulo = document.createElement('h3');
        titulo.textContent = libro.titulo;

        const autor = document.createElement('p');
        autor.textContent = `Autor: ${libro.autor}`;

        const imgLibro = document.createElement('img');
        imgLibro.src = libro.imgLibro;
        imgLibro.alt = libro.titulo;

        libroDiv.appendChild(titulo);
        libroDiv.appendChild(autor);
        libroDiv.appendChild(imgLibro);

        listaLibros.appendChild(libroDiv);
    });
}

function searchlibros() {
    const searchTerm = document.getElementById('buscador').value.toLowerCase();
    const libros = Array.from(document.querySelectorAll('.libro'));

    libros.forEach(libro => {
        const title = libro.querySelector('h3').textContent.toLowerCase();
        const author = libro.querySelector('p').textContent.toLowerCase();

        if (title.includes(searchTerm) || author.includes(searchTerm)) {
            libro.style.display = 'block';
        } else {
            libro.style.display = 'none';
        }
    });
}
