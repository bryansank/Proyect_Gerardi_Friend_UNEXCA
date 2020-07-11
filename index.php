<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Delina Carter</title>
	<!--<link rel="stylesheet" type="text/css" href="css/miestilo.css" />-->
	<script type="text/javascript"  lenguage="javascript" src="./js/funciones.js"></script>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

<script type="text/javascript">
    showDateNow();
    
    document.write("<font face=optima size=2>Last Updated (JS) :"+document.lastModified+"</font>");
    
</script>

<!--Inicio de Div principal-->		       
<div id="principal">
    <header class="encabezado">
        <section>
            <figure id="logo">
                <img src="imagenes/logo.jpg" alt="Delina Carter" title="Delina Carter">
            </figure>
        </section>

        <h1>
            <em>Delina Carter</em>
        </h1>

        <article>
            <p align="center" class="comienzo">
                <font color="#48475B" size="6" face="optima"> 
                ¡Nos especializamos en el confeccionamiento y venta de carteras de mano, cartucheras, monederos y mucho más!
                </font>
            </p>
        </article>

        <br /> 

        <article>
            <h1> Delina Carter nace del placer que nos da llevar la moda a esos pequeños detalles, no importa el diseño, el color, o el material, si tú lo quieres nosotros lo conseguiremos</h1>
        </article>
        <!-- Menu de navegacion -->
        <nav class="menu">
            <table Bgcolor="FFC300"cellpadding="10" cellspacing="10" align="center" border="4">
            <tr>
                <ul>
                    <td>
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                    </td>
                    <td>
                        <li>
                            <a href="https://www.instagram.com/bygemadelina/?hl=es-la" target="blank">Instagram</a>
                        </li>
                    </td>
                    <!--boton para mostrar mensaje js-->
                    <td>
                        <li>
                            <a id="linkProduct" href="">Productos</a>
                        </li>
                    </td>
        
                    <td>
                        <li>
                            <a>Servicio a domicilio</a>
                        </li>
                    </td>
                    <!--opcion de usuario-->
                    <td>
                        <li>
                            <a href="formUser.php">Usuario</a>
                        </li>
                    </td>
                </ul>
            </tr>		
        </nav>
            
        <table bgcolor="E0FFFF"cellpadding="10" cellspacing="10" align="center" border="5">
            <tr>
                <th  colspan="4" bgcolor="DC143C"></th>
            </tr>

            <tr align="center">
                <section>
                    <td>
                        <p class="titulos">
                            <h3>¡Échale un vistazo a todos nuestros NUEVOS PRODUCTOS!</h3>
                            <h2> Sin duda te dejarán con ganas de comprarlos todos!!</h2>
                        </p>
                        <img src="imagenes/NuevosPdt.jpg" width="350" height="250" alt="Nuevos productos" title="Cartucheras Sport" />
                    </td>
                    <td>
                        <p class="titulos">
                            <h3>¡Cada semana te traemos las MEJORES PROMOCIONES! </h3>
                            <h2>
                                <em>El estilo más sofisticado, hecho exclusivamente para TI!</em>
                            </h2>
                        </p>	
                        <img src="imagenes/Promociones.jpg" width="250" height="200" alt="Promociones de la semana"title="Monedero de bolsillo" />
                    </td>
                </section>
            </tr>

            <tr align="center">
                <td>
                    <p class="titulos">
                        <h3>¡Para el trabajo, estudio, para salir, guardar tú dinero, tú solo déjalo en nuestras manos y obtendrás.</h3>
                        <h2>Los más creativos diseños con una gran utilidad!</h3>
                    </p>
                    <img src="imagenes/Publicidad.jpg" width="250" height="200" alt="Publicidad" title="Cartucheras" />
                </td>
                
                <td>
                    <p class="titulos">
                        <h2>¡Si lo necesitas,</h2>
                        <h3> te lo llevamos hasta la puerta de tu casa!</h3>
                    </p>
                    <img src="imagenes/serviciodom.jpg" width="250" height="200" alt="Servicio a domicilio" title="Servicio a domicilio" />
                </td>
            </tr>
        </table>     
    </header>
</div>
<!--FIN de Div principal-->		       
<!--Inicio de Footer-->		
<footer>
    <p align="center"> 
        &copy; Derechos de Gerardi Manosalva, Delina Carter.
    </p>
    <script >
        document.write("Nombre y versión del navegador: " + navigator.userAgent);
    </script>
</footer>
<!--FIN de Footer-->		       
</body>
</html>