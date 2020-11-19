document.addEventListener("DOMContentLoaded", function(){
       document.getElementById('editUserContainer').addEventListener('submit',function(event){
            event.preventDefault();
            let id_user = document.getElementById('id_user');
            let bodyData = {};
            formData = new FormData(document.getElementById('usereditform'));
            for(var pair of formData.entries()) {
                bodyData[pair[0]] = pair[1];
             }
            fetch(`api/usuarios/${id_user}`, {
                method: "PUT",
                headers: {
                    'Content-Type': 'application/json'
                  },
                body: JSON.stringify(bodyData),
                mode:"cors",
                
            })
            .then(response => response.text())
            .then(data => {
                mostrarUsuarios();
                cancelEdit();
            });
       });

       document.getElementById('editComentarioContainer').addEventListener('submit',function(event){
        event.preventDefault();
        let id_comentario = document.getElementById('id_comentario');
        let bodyData = {};
        formData = new FormData(document.getElementById('comentarioeditform'));
        for(var pair of formData.entries()) {
            bodyData[pair[0]] = pair[1];
        }
        fetch(`api/comentario/${id_comentario}`, {
            method: "PUT",
            headers: {
                'Content-Type': 'application/json'
              },
            body: JSON.stringify(bodyData),
            mode:"cors",
            
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            mostrarComentarios();
            cancelEditComentario();
        });
   });
});

function mostrarProductos(){
    fetch('api/productos', {
        "method": 'GET',
        "mode":"no-cors",
    })
    .then(response => response.json())
    .then(data => {
        let tabla = document.querySelector('#table-container-productos');
        var rowCount = tabla.rows.length;
        for (var x=rowCount-1; x>0; x--) {
            tabla.deleteRow(x);
        }
        data.forEach(element => {
            let fila =
            `<tr>
                <td>${element.nombre_producto}</td>
                <td>${element.precio_producto}</td>
                <td>${element.stock_producto}</td>
                <td>${element.description_producto}</td> 
                <td>
                    <div class='actions mb-1'>
                        <a href="producto/${element.id_producto}" class="button">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                    </div>
                    <div class='actions mb-1'>
                        <form action="producto/borrar/${element.id_producto}" method="POST">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>`
            let row = tabla.tBodies[0].insertRow(0);
            row.innerHTML += fila;
        });
    });
    cancelEdit();
    cancelEditComentario();
    document.getElementById('tablaProductos').style.display = 'block';
    document.getElementById('tablaCategorias').style.display = 'none';
    document.getElementById('tablaComentarios').style.display = 'none';
    document.getElementById('tablaUsuarios').style.display = 'none';
}

function mostrarCategorias(){
    fetch('api/categorias', {
        "method": 'GET',
        "mode":"no-cors",
    })
    .then(response => response.json())
    .then(data => {
        let tabla = document.querySelector('#table-container-categorias');
        var rowCount = tabla.rows.length;
        for (var x=rowCount-1; x>0; x--) {
            tabla.deleteRow(x);
        }
        data.forEach(element => {
            let fila =
            `<tr>
                <td>${element.nombre_categoria}</td>
                <td>${element.descripcion_categoria}</td>
                <td>
                    <div class='actions mb-1'>
                        <a href="editCategoria/${element.id_categoria}" class="button">
                            <button type="button" class="btn btn-success">Editar</button>
                        </a>
                    </div>
                    <div class='actions mb-1'>
                        <form action="editCategoria/borrar/${element.id_categoria}" method="POST">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>`
            let row = tabla.tBodies[0].insertRow(0);
            row.innerHTML += fila;
        });
    });
    cancelEdit();
    cancelEditComentario();
    document.getElementById('tablaProductos').style.display = 'none';
    document.getElementById('tablaCategorias').style.display = 'block';
    document.getElementById('tablaComentarios').style.display = 'none';
    document.getElementById('tablaUsuarios').style.display = 'none';
}

function mostrarUsuarios() {
    fetch("api/usuarios", {
        "method": "GET",
        "mode":"no-cors",
    })
    .then(response => response.json())
    .then(data => {
        let tabla = document.querySelector('#table-container-usuarios');
        var rowCount = tabla.rows.length;
        for (var x=rowCount-1; x>0; x--) {
            tabla.deleteRow(x);
        }
        data.forEach(element => {
            let texto_permisos = "Vacio";
            if (element.permisos == 0) texto_permisos = "PUBLICO"
            else texto_permisos = "ADMIN"
            let fila =
            `<tr>
                <td>${element.nombre_usuario}</td>
                <td>${element.email_usuario}</td>
                <td>${texto_permisos}</td>
                <td>
                    <div class='actions mb-1'>
                        <button type="button" class="btn btn-success" onclick="editUser(${element.id_usuario})">Editar</button>
                    </div>
                    <div class='actions mb-1'>
                        <button type="button" class="btn btn-danger" onclick="deleteUser(${element.id_usuario})">Borrar</button>
                    </div>
                </td>
            </tr>`
            let row = tabla.tBodies[0].insertRow(0);
            row.innerHTML += fila;
        });
    });
    cancelEdit();
    cancelEditComentario();
    document.getElementById('tablaProductos').style.display = 'none';
    document.getElementById('tablaCategorias').style.display = 'none';
    document.getElementById('tablaComentarios').style.display = 'none';
    document.getElementById('tablaUsuarios').style.display = 'block';
}

function mostrarComentarios(){
    fetch("api/comentarios", {
        "method": "GET",
        "mode":"no-cors",
    })
    .then(response => response.json())
    .then(data => {
        let tabla = document.querySelector('#table-container-comentarios');
        var rowCount = tabla.rows.length;
        for (var x=rowCount-1; x>0; x--) {
            tabla.deleteRow(x);
        }
        data.forEach(element => {
            let fila =
            `<tr>
                <td>${element.nombre_usuario}</td>
                <td>${element.puntuacion}</td>
                <td>${element.comentario}</td>
                <td>${element.nombre_producto}</td>
                <td>
                    <div class='actions mb-1'>
                        <button type="button" class="btn btn-success" onclick="editComentario(${element.id_comentario},'${element.nombre_usuario}','${element.nombre_producto}')">Editar</button>
                    </div>
                    <div class='actions mb-1'>
                        <button type="button" class="btn btn-danger" onclick="deleteComentario(${element.id_comentario})">Borrar</button>
                    </div>
                </td>
            </tr>`
            let row = tabla.tBodies[0].insertRow(0);
            row.innerHTML += fila;
        });
    });
    cancelEdit();
    cancelEditComentario();
    document.getElementById('tablaProductos').style.display = 'none';
    document.getElementById('tablaCategorias').style.display = 'none';
    document.getElementById('tablaUsuarios').style.display = 'none';
    document.getElementById('tablaComentarios').style.display = 'block';
}

function editComentario(id,user,producto){
    fetch(`api/comentario/${id}`, {
        "method": "GET",
        "mode":"no-cors",
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('tablaComentarios').style.display = 'none';
        let formContainer = document.getElementById('editComentarioContainer');
        formContainer.style.display = 'block';
        document.getElementById('validationTooltipcomentario').value = data.comentario;
        document.getElementById('label_user_name').innerHTML = user;
        document.getElementById('label_Puntuacion').innerHTML = data.puntuacion;
        document.getElementById('label_Producto').innerHTML = producto;
        document.getElementById('id_comentario').value = data.id_comentario;

    });
}

function editUser(id){
    fetch(`api/usuarios/${id}`, {
        "method": "GET",
        "mode":"no-cors",
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('tablaUsuarios').style.display = 'none';
        let formContainer = document.getElementById('editUserContainer');
        formContainer.style.display = 'block';
        document.getElementById('validationTooltipemail').value = data.email_usuario;
        document.getElementById('validationTooltipuser').value = data.nombre_usuario;
        document.getElementById('permiso_select').selectedIndex = data.permisos;
        document.getElementById('id_user').value = data.id_usuario;
    });
}

function cancelEdit(){
    document.getElementById('tablaUsuarios').style.display = 'block';
    document.getElementById('editUserContainer').style.display = 'none';
}

function cancelEditComentario(){
    document.getElementById('tablaComentarios').style.display = 'block';
    document.getElementById('editComentarioContainer').style.display = 'none';
}

function deleteComentario(id){
    fetch(`api/comentario/${id}`, {
        "method": "DELETE",
        "mode":"cors",
    })
    .then(response => response.json())
    .then(data => {
        // Armar respuesta en caso de mostrar mensaje de error
        mostrarComentarios();
    });
}

function deleteUser(id){
    fetch(`api/usuarios/${id}`, {
        "method": "DELETE",
        "mode":"cors",
    })
    .then(response => response.json())
    .then(data => {
        // Armar respuesta en caso de mostrar mensaje de error
        mostrarUsuarios();
    });
}