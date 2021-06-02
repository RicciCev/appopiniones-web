/* Referencia al botón switch a través de su id. */
let darkTheme = document.getElementById('theme-toggler');

/* Cambiar el tema de color a oscuro mediante una función que activa y desactiva la clase 'dark' en el documnento html. */
darkTheme.addEventListener('click', () => {
    document.body.classList.toggle('dark')
})
