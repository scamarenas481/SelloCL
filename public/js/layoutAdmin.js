// Obtener el enlace del submenú "Roles"
const rolesToggle = document.querySelector('.dropdown-toggle-roles');

// Obtener los ítems del submenú "Roles"
const rolesItems = document.querySelectorAll('.hidden');

// Escuchar el evento de clic en el enlace del submenú "Roles"
rolesToggle.addEventListener('click', function(event) {
    event.preventDefault();

    // Alternar la clase "hidden" para mostrar u ocultar los ítems del submenú "Roles"
    rolesItems.forEach(item => item.classList.toggle('hidden'));
});
