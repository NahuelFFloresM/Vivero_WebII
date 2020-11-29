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

    function mostrarComentarios(){
        let id = document.querySelector('#id_producto');
        console.log(id);
        fetch(`api/comentarios/${id_producto.value}`)
        .then(response => response.text())
        .then(comentarios => {
            let content = document.querySelector('#container_comentarios');  
            content.innerHTML = "" ;
            console.log(comentarios);
            for(let comentario of comentarios){
               
            content.innerHTML +=this.createComentarioHTML(comentario);
        }
        })
        .catch(error => console.log(error));
    }

    mostrarComentarios();

    function crearComentarioHTML(comentario) {
        let element = `${comentario.comentario}: ${comentario.puntuacion}`;
        element = `<li>${element}</li>`;
        return element;  
    }
});










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
