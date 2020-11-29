document.addEventListener("DOMContentLoaded", function(){
    // document.getElementById('editUserContainer').addEventListener('submit',function(event){
    //     event.preventDefault();
    //     let id_user = document.getElementById('id_user');
    //     let bodyData = {};
    //     formData = new FormData(document.getElementById('usereditform'));
    //     for(var pair of formData.entries()) {
    //         bodyData[pair[0]] = pair[1];
    //     }
    //     fetch(`api/usuarios/${id_user}`, {
    //         method: "PUT",
    //         headers: {
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify(bodyData),
    //         mode:"cors",
            
    //     })
    //     .then(response => response.text())
    //     .then(data => {
    //         mostrarUsuarios();
    //         cancelEdit();
    //     });
    // });

    // document.getElementById('editComentarioContainer').addEventListener('submit',function(event){
    //     event.preventDefault();
    //     let id_comentario = document.getElementById('id_comentario');
    //     let bodyData = {};
    //     formData = new FormData(document.getElementById('comentarioeditform'));
    //     for(var pair of formData.entries()) {
    //         bodyData[pair[0]] = pair[1];
    //     }
    //     fetch(`api/comentario/${id_comentario}`, {
    //         method: "PUT",
    //         headers: {
    //             'Content-Type': 'application/json'
    //         },
    //         body: JSON.stringify(bodyData),
    //         mode:"cors",
            
    //     })
    //     .then(response => response.json())
    //     .then(data => {            
    //         mostrarComentarios();
    //         cancelEditComentario();
    //     });
    // });

    // document.getElementById('menu-botones').addEventListener('click',function(event){
    //     let childs = this.children;
    //     if (event.target != this){
    //         for (let child of childs) {
    //             if (child == event.target){
    //                 if (!child.classList.contains("btn-primary")){
    //                     child.classList.toggle("btn-primary");
    //                     child.classList.toggle("btn-secondary");
    //                 }
    //             } else{
    //                 if (child.classList.contains("btn-primary")){
    //                     child.classList.toggle("btn-primary");
    //                     child.classList.toggle("btn-secondary");
    //                 }
    //             }
    //         }
    //     }
    // });
});

// function mostrarComentarios(){
//     fetch("api/comentarios", {
//         "method": "GET",
//         "mode":"no-cors",
//     })
//     .then(response => response.json())
//     .then(data => {
//         let tabla = document.querySelector('#table-container-comentarios');
//         var rowCount = tabla.rows.length;
//         for (var x=rowCount-1; x>0; x--) {
//             tabla.deleteRow(x);
//         }
//         data.forEach(element => {
//             let fila =
//             `<tr>
//                 <td>${element.nombre_usuario}</td>
//                 <td>${element.puntuacion}</td>
//                 <td>${element.comentario}</td>
//                 <td>${element.nombre_producto}</td>
//                 <td>
//                     <div class='actions mb-1'>
//                         <button type="button" class="btn btn-success" onclick="editComentario(${element.id_comentario},'${element.nombre_usuario}','${element.nombre_producto}')">Editar</button>
//                     </div>
//                     <div class='actions mb-1'>
//                         <button type="button" class="btn btn-danger" onclick="deleteComentario(${element.id_comentario})">Borrar</button>
//                     </div>
//                 </td>
//             </tr>`
//             let row = tabla.tBodies[0].insertRow(0);
//             row.innerHTML += fila;
//         });
//     });
//     cancelEdit();
//     cancelEditComentario();
//     document.getElementById('tablaProductos').style.display = 'none';
//     document.getElementById('tablaCategorias').style.display = 'none';
//     document.getElementById('tablaUsuarios').style.display = 'none';
//     document.getElementById('tablaComentarios').style.display = 'block';
// }

// function editComentario(id,user,producto){
//     /*showModal();
//     document.getElementById('btn-aceptar').onclick = (event) => { event.preventDefault();mostrarProductos();dismissModal();};*/
//     fetch(`api/comentario/${id}`, {
//         "method": "GET",
//         "mode":"no-cors",
//     })
//     .then(response => response.json())
//     .then(data => {
//         document.getElementById('tablaComentarios').style.display = 'none';
//         let formContainer = document.getElementById('editComentarioContainer');
//         formContainer.style.display = 'block';
//         document.getElementById('validationTooltipcomentario').value = data.comentario;
//         document.getElementById('label_user_name').innerHTML = user;
//         document.getElementById('label_Puntuacion').innerHTML = data.puntuacion;
//         document.getElementById('label_Producto').innerHTML = producto;
//         document.getElementById('id_comentario').value = data.id_comentario;

//     });
// }


// function cancelEditComentario(){
//     document.getElementById('tablaComentarios').style.display = 'block';
//     document.getElementById('editComentarioContainer').style.display = 'none';
// }

// function deleteComentario(id){
//     showModal();
//     document.getElementById('btn-aceptar').onclick = (event) => {
//         event.preventDefault();
//         fetch(`api/comentario/${id}`, {
//             "method": "DELETE",
//             "mode":"cors",
//         })
//         .then(response => response.json())
//         .then(data => {
//             mostrarComentarios();
//             dismissModal();
//         });
//     };
    
// }

function deleteUser(id){
    showModal();
    document.getElementById('btn-aceptar').onclick = (event) => {
        event.preventDefault();
        fetch(`api/usuarios/${id}`, {
            "method": "DELETE",
            "mode":"cors",
        })
        .then(response => response.json())
        .then(data => {
            mostrarUsuarios();
            dismissModal();
        });
    }
}

function showModal(){
    $('#exampleModal').modal('toggle');
}

function dismissModal(){
    $('#exampleModal').modal('toggle');
}