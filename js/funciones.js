  function alerta(){ 
  	var nombreC=document.getElementById('NombreCliente').value;
  	var apellidoc=document.getElementById('ApellidoCliente').value;
  	alert (nombreC + "  "+apellidoc+ "  Gracias por los datos suministrados");
    
}
  function alerta1(){ 
    alert("Información limpiada, volver a rellenar campos")
  } 

function funcionfocusa(){
	document.getElementById("Producto").style.backgroundColor="Orange"; 
}
function funcionfocusb(){
	document.getElementById("NombreCliente").style.backgroundColor="Orange"; 
}
function funcionfocusc(){
	document.getElementById("ApellidoCliente").style.backgroundColor="Orange"; 
}
function funcionfocusd(){
	document.getElementById("telefonos").style.backgroundColor="Orange"; 
}
function funcionfocuse(){
	document.getElementById("ubicacion").style.backgroundColor="Orange"; 
}
function funcionfocusf(){
	document.getElementById("cedula").style.backgroundColor="Orange"; 
}


function funcionblur() {
	document.getElementById("Producto").style.backgroundColor="Lightpink";
	var g= document.getElementById("Producto");
	g.value=g.value.toUpperCase();
}
function funcionblura() {
	document.getElementById("ubicacion").style.backgroundColor="Lightpink";
	var e= document.getElementById("ubicacion");
	e.value=e.value.toUpperCase();

}

function upperCase() { 
   var x=document.getElementById("NombreCliente").value
   document.getElementById("NombreCliente").value=x.toUpperCase()
} 
function upperCasea() { 
   var a=document.getElementById("ApellidoCliente").value
   document.getElementById("ApellidoCliente").value=a.toUpperCase()
} 
function upperCaseb() { 
   var b=document.getElementById("Producto").value
   document.getElementById("Producto").value=b.toUpperCase()
} 
function upperCasec() { 
   var b=document.getElementById("ubicacion").value
   document.getElementById("ubicacion").value=b.toUpperCase()
} 

