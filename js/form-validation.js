(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Recuperar los formularios en los que queremos aplicar validación al estilo Bootstrap.
        var forms = document.getElementsByClassName('needs-validation');

        // Hacer un loop sobre todos esos formularios recuperados anteriormente.
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
