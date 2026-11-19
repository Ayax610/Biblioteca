document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('formLibro');
    // Validación interactiva antes de enviar los datos al servidor

    /**
     * @param {Event} e - El evento de envío del formulario.
     * @return {void} - No retorna nada, pero previene el envío del formulario si hay errores.
     * 
     */
    form.addEventListener('submit', (e) => {
        const titulo = document.getElementById('titulo').value.trim();
        const autor = document.getElementById('autor').value.trim();
        const isbn = document.getElementById('isbn').value.trim();
        if (titulo === "" || autor === "" || isbn === "") {
            e.preventDefault(); // Detiene el envío del formulario
            alert('Por favor, rellena todos los campos antes de guardar.');

            return;
        }
        // Validación simple para que el formato ISBN no contenga caracteres extraños
        if (isbn.length < 10) {
            e.preventDefault();
            alert('El campo ISBN parece demasiado corto o inválido.');
        }
    });
    // Detectar si venimos de un registro exitoso mediante la URL
    /**
     * @type {URLSearchParams} Es el objeto que permite acceder a los  ósea parámetros de la url.
     * @return {void} -No retorna nada, pero muestra un mensaje de éxito si el registro fue exitoso.
     */
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        // Limpiar el parámetro de la URL estética
        window.history.replaceState({}, document.title, window.location.pathname);
        alert('¡Libro registrado con éxito en el inventario!');
    }
});
