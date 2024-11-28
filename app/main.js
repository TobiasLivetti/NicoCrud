        const API = 'http://localhost/NicoCrud/api1/public/index.php?action=user';

        const tabla = document.getElementById('user-table').querySelector('tbody');

        let accionActual = '';
        let idUsuarioActual = null;

        // Mostrar modal
        function mostrarModal(accion, id = null, nombre = '') {
            accionActual = accion;
            idUsuarioActual = id;

            const header = document.getElementById('modal-header');
            const inputNombre = document.getElementById('modal-name');
            const inputPassword = document.getElementById('modal-password');

            if (accion === 'create') {
                header.innerText = 'Crear Usuario';
                inputNombre.value = '';
                inputPassword.value = '';
            } else if (accion === 'edit') {
                header.innerText = 'Editar Usuario';
                inputNombre.value = nombre;
                inputPassword.value = '';
            }

            document.getElementById('modal').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        async function confirmarAccion() {
            const nombre = document.getElementById('modal-name').value;
            const password = document.getElementById('modal-password').value;

            try {
                if (accionActual === 'create') {
                    await fetch(API, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ name: nombre, password: password })
                    });
                } else if (accionActual === 'edit') {
                    await fetch(API, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ id: idUsuarioActual, name: nombre, password: password })
                    });
                }

                cargarUsuarios();
                cerrarModal();
            } catch (error) {
                console.error('Error en la operación:', error);
            }
        }

        async function cargarUsuarios() {
            try {
                const response = await fetch(API);
                const usuarios = await response.json();

                tabla.innerHTML = '';
                usuarios.forEach(usuario => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${usuario.id}</td>
                        <td>${usuario.name}</td>
                        <td>${usuario.password}</td>
                        <td>
                            <button class="btn btn-edit" onclick="mostrarModal('edit', ${usuario.id}, '${usuario.name}')">Actualizar</button>
                            <button class="btn btn-delete" onclick="eliminarUsuario(${usuario.id})">Eliminar</button>
                        </td>
                    `;
                    tabla.appendChild(row);
                });
            } catch (error) {
                console.error('Error al cargar usuarios:', error);
            }
        }

        async function eliminarUsuario(id) {
            if (confirm('¿Estás seguro de eliminar este usuario?')) {
                await fetch(`${API}&id=${id}`, { method: 'DELETE' });
                cargarUsuarios();
            }
        }

        cargarUsuarios();