const stars = document.querySelectorAll('.star');
const resultElement = document.querySelector('#rating');

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = star.getAttribute('data-rating');

        // Quita la clase "selected" de todas las estrellas
        stars.forEach(s => s.classList.remove('selected'));

        // Agrega la clase "selected" a las estrellas seleccionadas
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('selected');
        }

        // Aquí puedes enviar la calificación al servidor si es necesario.
    });
});

// Obtén todos los elementos de clase "checkbox"
const checkboxes = document.querySelectorAll('.checkbox');

checkboxes.forEach(checkbox=> {
    checkbox.addEventListener('click', ()=> {
        // Desmarca todos los checkboxes
        const valor=checkbox.getAttribute('data-value');

        checkboxes.forEach(s=>s.classList.remove('selected'));
        // Marca el checkbox actual

        for (let i = 0; i < valor; i++) {
            checkboxes[i].classList.add('selected');
        }
    });
});

const lectura = document.querySelector(".lectura");
const inputCapitulos = document.querySelector("#capitulos");
const checkboxCapitulos = document.querySelectorAll("input[type=checkbox]");

inputCapitulos.addEventListener("change", () => {
    let capitulosLeidos = parseInt(inputCapitulos.value);

    for (let i = 0; i < capitulosLeidos; i++) {
        checkboxCapitulos[i].checked = true;
    }
});


