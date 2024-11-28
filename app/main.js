const API = 'http://localhost/api1/public/index.php?action=user';
const tabla = document.getElementById('user-table').querySelector('tbody');

// Cargar todos los usuarios
async function cargarUsuarios() {
    try {
        const response = await fetch(API);
        if (!response.ok) {
            throw new Error(`Error al obtener usuarios: ${response.statusText}`);
        }
        const usuarios = await response.json();

        tabla.innerHTML = ''; // Limpia la tabla
        usuarios.forEach(usuario => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${usuario.id}</td>
                <td>${usuario.name}</td>
                <td>${usuario.password}</td>
                <td>
                    <button class="btn btn-edit" onclick="editarUsuario(${usuario.id}, '${usuario.name}')">Actualizar</button>
                    <button class="btn btn-delete" onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
                </td>
            `;
            tabla.appendChild(row);
        });
    } catch (error) {
        console.error('Error al cargar usuarios:', error);
    }
}

// Crear usuario
async function crearUsuario() {
    const nombre = prompt('Ingrese el nombre del nuevo usuario:');
    const password = prompt('Ingrese la contraseña del nuevo usuario:');

    if (nombre && password) {
        try {
            const response = await fetch(API, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ name: nombre, password: password })
            });

            const data = await response.json();
            alert(data.message);
            cargarUsuarios(); // Recarga la tabla
        } catch (error) {
            console.error('Error al crear usuario:', error);
        }
    } else {
        alert('Nombre y contraseña son obligatorios.');
    }
}

// Actualizar usuario
async function editarUsuario(id, nombreActual) {
    const nuevoNombre = prompt('Ingrese el nuevo nombre del usuario:', nombreActual);
    const nuevaPassword = prompt('Ingrese la nueva contraseña:');

    if (nuevoNombre && nuevaPassword) {
        try {
            const response = await fetch(API, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, name: nuevoNombre, password: nuevaPassword })
            });

            const data = await response.json();
            alert(data.message);
            cargarUsuarios(); // Recarga la tabla
        } catch (error) {
            console.error('Error al actualizar usuario:', error);
        }
    } else {
        alert('Nombre y contraseña son obligatorios.');
    }
}

// Eliminar usuario
async function eliminarUsuario(id) {
    if (confirm('¿Está seguro de que desea eliminar este usuario?')) {
        try {
            const response = await fetch(`${API}&id=${id}`, {
                method: 'DELETE'
            });

            const data = await response.json();
            alert(data.message);
            cargarUsuarios(); // Recarga la tabla
        } catch (error) {
            console.error('Error al eliminar usuario:', error);
        }
    }
}

// Cargar usuarios al iniciar
cargarUsuarios();