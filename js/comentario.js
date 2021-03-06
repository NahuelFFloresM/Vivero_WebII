"use strict"

function crearComentarioHTML(comentario) {
    let isAdmin = document.querySelector('#isAdmin');
    let element = `<li class="border border-primary pt-2 pb-2 mt-2 mb-2">
                    <div class="row p-1">
                        <div class="col-lg-8 wraped-text">
                            ${comentario.comentario}
                        </div>
                        <div class="col-lg-2">
                            (${comentario.puntuacion} Pts)
                        </div>`;
    if (isAdmin){
        element += `<div class="col-lg-1">
                                <button class="btn btn-danger" onclick="deleteComentario(${comentario.id_comentario})">X</button>
                            </div>
                        </div>
                    </li>`;
    } else {
            `</div>
        </li>`;
    }                        
    return element;
} 

function mostrarComentarios(){
    let id = document.querySelector('#id_producto');
    fetch(`api/comentarios/${id.value}`)
    .then(response => response.json())
    .then(response => {
        let content = document.querySelector('#lista_comentarios');  
        content.innerHTML = "" ;
            for(let comentario of response){
            content.innerHTML +=crearComentarioHTML(comentario);
        }
    })
    .catch(error => console.log(error));
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



document.addEventListener("DOMContentLoaded", function(){
    
    let comentario_form = document.getElementById('comentario_form');
    if(comentario_form){
        document.getElementById('comentario_form').addEventListener('submit',function(event){
            event.preventDefault();
            let bodyData = {
                "id_producto" : document.querySelector('#id_producto').value
            }
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
            .then(response => {
                mostrarComentarios();
            });
        });
    }
    mostrarComentarios();
});

