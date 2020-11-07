document.addEventListener("DOMContentLoaded", function(){
       document.getElementById('editUserContainer').addEventListener('submit',function(event){
            event.preventDefault();
            let id_user = document.getElementById('id_user');
            let form = document.getElementById('usereditform');
            let formData = new FormData(form);
            let bodyData = {};
            for(var pair of formData.entries()) {
                console.log(pair[0]+ ', '+ pair[1]);
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
                console.log(data);
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

    document.getElementById('tablaProductos').style.display = 'block';
    document.getElementById('tablaCategorias').style.display = 'none';
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

    document.getElementById('tablaProductos').style.display = 'none';
    document.getElementById('tablaCategorias').style.display = 'block';
}

function mostrarUsuarios(){
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
                        <form action="editUser/borrar/${element.id_usuario}" method="POST">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>`
            let row = tabla.tBodies[0].insertRow(0);
            row.innerHTML += fila;
        });
    });

    document.getElementById('tablaProductos').style.display = 'none';
    document.getElementById('tablaCategorias').style.display = 'none';
    document.getElementById('tablaUsuarios').style.display = 'block';
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