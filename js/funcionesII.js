  function alerta(){ 
  	alert ("  Gracias por los datos suministrados");
    
}
  function alerta1(){ 
    alert("Información limpiada, volver a rellenar campos")
  } 

function funcionfocusa(){
	document.getElementById("sugerencia").style.backgroundColor="Orange"; 
}

function funcionblura() {
	document.getElementById("sugerencia").style.backgroundColor="Lightpink";
	var a= document.getElementById("sugerencia");
	a.value=a.value.toUpperCase();

}
function upperCasea() { 
   var a=document.getElementById("sugerencia").value
   document.getElementById("sugerencia").value=a.toUpperCase()
} 