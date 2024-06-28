document.addEventListener("DOMContentLoaded", function () {
  // Cuando el DOM está completamente cargado, se ejecuta esta función
  fetch("BaseDeDatos/base.json") // Realiza una solicitud para obtener el contenido de base.json
    .then((response) => response.json()) // Convierte la respuesta a un objeto JSON
    .then((data) => {
      // Cuando la respuesta JSON esté disponible, se ejecuta este bloque
      const usuarios = data.usuarios; // Obtiene la lista de usuarios del objeto JSON
      const listaUsuarios = document.getElementById("usuarios-lista"); // Obtiene la lista <ul> del HTML
      const totalUsuarios = document.getElementById("total-usuarios");

      usuarios.forEach((usuario) => {
        // Por cada usuario en la lista, se crea un elemento <li> en la lista <ul>
        const usuarioItem = document.createElement("li"); // Crea un elemento <li>
        usuarioItem.classList.add("usuario-info"); // Añade la clase CSS 'usuario-info' al elemento <li>
        usuarioItem.innerHTML = `
              <div><strong>Nombre:</strong> ${usuario.nombre} ${usuario.apellido}</div>
              <div><strong>Tipo de Documento:</strong> ${usuario.tipoDocumento}</div>
              <div><strong>Número de Documento:</strong> ${usuario.nroDocumento}</div>
              <div><strong>Año:</strong> ${usuario.anio}</div>
              <div><strong>División:</strong> ${usuario.division}</div>
            `;
        listaUsuarios.appendChild(usuarioItem); // Añade el elemento <li> a la lista <ul>
      });

      totalUsuarios.textContent = `Total de usuarios: ${usuarios.length}`; // actualiza el contenido del elemento de total de usuarios
    });
});


