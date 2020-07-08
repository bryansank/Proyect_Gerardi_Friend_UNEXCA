<?php 

    class Product{

        public function getProducts(){

            try{
                $db = getDB();//Aqui llamamos al metodo que hicimos en config, para conectarnos a la base de datos...
                $query = $db->prepare("SELECT * FROM product"); 
                //con $query ejecutamos la consulta a la db...
                //$query->bindParam("UserAndEmail", $UserAndEmail,PDO::PARAM_STR) ;
                //$query->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
                //Aqui asignamos los parametros a los valores que usaremos para la consulta.
                $query->execute();
                //Aqui ejecutamos el query.
                $count=$query->rowCount();
                //Aqui asignamos a cout el metodo de rowCount que devuelve si algo fue afectado, quiere decir
                //que si el query fallo o sucedio algo inesperado devuelve error
                $data=$query->fetch(PDO::FETCH_OBJ);
                //Aqui trae el objeto de la consulta, en este caso, trae id, nombre, contraseña, usuario y demas
                $db = null;
                //Hacemos el db nulo para limpiar todo lo que tiene y no crear basura xd
    
                if($count){
                    //$_SESSION['uid'] = $data->uid; 
                    // Aqui guardamos la seccion de la persona que este logeandose
                    //tomamos del objeto data, el atributo id
                    return $data;
                }else{
                    return false;
                } 
            }
            catch(PDOException $e) {
                
                //echo '{"error":{"text":'. $e->getMessage() .'}}';
            }

        }

    }

?>