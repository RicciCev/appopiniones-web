/* Referencia al botón switch a través de su id, y a los iconos. */
let themeToggler = document.getElementById('theme-toggler');

/* Cambiar el tema de color a oscuro mediante una función que activa y desactiva la clase 'dark' en el documnento html. */
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark');
})
