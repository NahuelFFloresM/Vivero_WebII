document.addEventListener("DOMContentLoaded", function(){

    const selectElement = document.querySelector('#categoria_selector');
    let resultado = document.querySelector('#categoria_input');
    let auxiliar = document.querySelector('#id_categoria_edit');
    resultado.value = selectElement.options[0].text;
    auxiliar.value = selectElement.options[0].value;

    selectElement.addEventListener('change', (event) => {
        let resultado = document.querySelector('#categoria_input');
        let auxiliar = document.querySelector('#id_categoria_edit');
        resultado.value = selectElement.options[event.target.selectedIndex].text;
        auxiliar.value = event.target.value;
    });

   
});

function mostrarProductos(){
    document.getElementById('tablaProductos').style.display = 'block';
    document.getElementById('tablaCategorias').style.display = 'none';
}

function mostrarCategorias(){
    document.getElementById('tablaProductos').style.display = 'none';
    document.getElementById('tablaCategorias').style.display = 'block';
}