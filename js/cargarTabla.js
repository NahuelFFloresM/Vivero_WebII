"use strict"

document.addEventListener("DOMContentLoaded", iniciarPagina());

function iniciarPagina() {
    cargarTabla();
} 

document.querySelector("#buscarBtn").addEventListener("click", async function (event) {
    event.preventDefault();
    cargarTabla();
});

document.querySelector("#js-guardar").addEventListener("click", async function () {
    let divResultado = document.querySelector(".resultado");
    let base_url = "http://web-unicen.herokuapp.com/api/groups/12/tpespecial";
    
    let _id_components = document.querySelectorAll("._id");
    let productos_components = document.querySelectorAll(".producto");
    let pMinorista_components = document.querySelectorAll(".pMinorista");
    let pMayorista_components = document.querySelectorAll(".pMayorista");
    let cantMayorista_components = document.querySelectorAll(".cantMayorista");
    let result_msg = "";

    for (let i = 0; i < productos_components.length; i++) {
        if(
            (productos_components[i].value != '') && (pMinorista_components[i].value != '') && 
            (pMayorista_components[i].value != '') && (cantMayorista_components[i].value != '')  
        ) {
            try {
                divResultado.innerHTML = "Guardando...";
                let url = base_url;
                let method = "POST";
                if(_id_components[i].value != ""){
                    url = url + "/" + _id_components[i].value;
                    method = "PUT";
                }
                let r = await fetch(url, {
                    "method": method,
                    "headers": {
                        'Content-Type': 'application/json'
                    },
                    "body": JSON.stringify({ "thing": [{
                        "productos": productos_components[i].value,
                        "precio_minorista": pMinorista_components[i].value,
                        "precio_mayorista": pMayorista_components[i].value,
                        "cantidad_minimaMay": cantMayorista_components[i].value
                    }] }),
                });
                let json = await r.json();
                if (json.status == "OK") {
                    result_msg = result_msg + "<div>El producto "+ productos_components[i].value +" se guardó con éxito!</div>";
                    document.querySelector('.text').innerHTML = result_msg;

                    $('.mensaje').addClass('alert-success');

                    $('.mensaje').removeClass('hide');
                    $('.mensaje').addClass('show');
                    productos_components[i].value = "";
                    pMinorista_components[i].value = "";
                    pMayorista_components[i].value = "";
                    cantMayorista_components[i].value = "";
                    divResultado.innerHTML = " ";
                }
            }
            catch (e) {
                result_msg = result_msg + "<div>Error al guardar el producto "+ productos_components[i].value +"</div>";
                document.querySelector('.text').innerHTML = result_msg;
                $('.mensaje').removeClass('hide');
                $('.mensaje').addClass('show');
                divResultado.innerHTML = " ";
            }
        }
       
    }
    
    cargarTabla();
});

  
async function cargarTabla() {
    let filter = document.querySelector('#searchInput').value;
    try {                       
        let response = await fetch("http://web-unicen.herokuapp.com/api/groups/12/tpespecial");
        let table = "";
        if (response.ok){
            let json = await response.json();
            for(const instance of json.tpespecial){
                for (const elem of instance.thing) {
                    if(elem) {
                        if( (filter != "") && (elem.productos.indexOf(filter) == -1) ){
                            continue;
                        }
                        table += "<tr><td>" + elem.productos + "</td>";
                        table += "<td>" + elem.precio_minorista + "</td>";
                        table += "<td>" + elem.precio_mayorista + "</td>";
                        table += "<td>" + elem.cantidad_minimaMay + "</td>";    
                        table += "<td><a href='#' onClick='eliminar(event, \"" + instance._id + "\")'><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a><a style=\"margin-left:10px;\" href='#' onClick='editar(event, \"" + instance._id +"\")'><i class=\"fa fa-edit\" aria-hidden=\"true\"></i></a></td></tr>";    
                    }
                }    
            }
        }
        document.querySelector('.tabla-container').innerHTML = table;
    }
    catch (e) {
        document.querySelector('.tabla-container').innerHTML = "Ocurrió un error!";
    }
} 

async function eliminar(e, id) {
    e.preventDefault();
    try {
        let r = await fetch("http://web-unicen.herokuapp.com/api/groups/12/tpespecial/"+id, {
            "method": "DELETE"
        });

        let json = await r.json();
        console.log(json);
        if(json.status == 'OK') {
            cargarTabla();
        }
    }
    catch (e) {
        divResultado.innerHTML = "Ocurrió un error al borrar!";
    }
}

async function editar(e, id) {
    e.preventDefault();
    try {                       
        let response = await fetch("http://web-unicen.herokuapp.com/api/groups/12/tpespecial/"+id);
        let table = "";
        if (response.ok){
            let json = await response.json();
            let instance = json.information;
            for(let i = 0; i<instance.thing.length && i < 4; i++) {
                let elem = instance.thing[i];
                document.querySelectorAll("._id")[i].value = id;
                document.querySelectorAll(".producto")[i].value = elem.productos;
                document.querySelectorAll(".pMinorista")[i].value = elem.precio_minorista;
                document.querySelectorAll(".pMayorista")[i].value = elem.precio_mayorista;
                document.querySelectorAll(".cantMayorista")[i].value = elem.cantidad_minimaMay;
            }
        }
    }
    catch (e) {
        document.querySelector('.tabla-container').innerHTML = "Ocurrió un error!";
    }
}


function cargaTriple() {
    for (let i = 0; i < 3; i++) {
        agregarFilaNueva();
    }
}

function agregarFila(object) {
    let tablita = document.getElementById("tablita");
    let max = tablita.rows[0].cells.length;
    let newFila = tablita.insertRow(tablita.rows.length);

    for (let i = 0; i < max; i++) {
        let newCeldita = newFila.insertCell(i);
        let newContent = document.createTextNode(object.productos);
        switch (i) {
            case 0:
                newCeldita.appendChild(newContent);
                break;
            case 1:
                newContent = document.createTextNode(object.precio_minorista);
                newCeldita.appendChild(newContent);
                break;
            case 2:
                newContent = document.createTextNode(object.precio_mayorista);
                newCeldita.appendChild(newContent);
                break;
            case 3:
                newContent = document.createTextNode(object.cantidad_minimaMay);
                newCeldita.appendChild(newContent);
                break;

        }
    }
 }

