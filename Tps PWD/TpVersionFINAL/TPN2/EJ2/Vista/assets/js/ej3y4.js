function Validar(){ 
    let isValid = true;
    const nombre = $("#nombre").val();
    const apellido = $("#apellido").val();
    const edad = $("#edad").val();
    const direccion = $("#direccion").val();
    if(nombre === "" || apellido === "" || edad === "" || direccion === "" || isNaN(edad)){
        alert("Por favor, ingrese un valor válido");
        isValid=false
    }
    return isValid;
}