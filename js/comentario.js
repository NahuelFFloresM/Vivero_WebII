"use strict"
document.addEventListener("DOMContentLoaded", function(){
    
    document.getElementById('comentario_form').addEventListener('submit',function(event){
     event.preventDefault();
     let bodyData = {};
     let formData = new FormData(document.getElementById('comentario_form'));
     for(var pair of formData.entries()) {
         bodyData[pair[0]] = pair[1];
     }
     fetch(`api/comentario`, {
         method: "POST",
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
