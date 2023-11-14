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


