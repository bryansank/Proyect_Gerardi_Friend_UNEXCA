<?php 

class userClass{

    /* User Login */
    public function userLogin($UserAndEmail,$Password){
        try{
            $db = getDB();//Aqui llamamos al metodo que hicimos en config, para conectarnos a la base de datos...
            $hash_password= hash('sha256', $Password);
            //Aqui encriptamos la contraseña con sha256, puedes quitarselo cuando quieras, pero tienes
            //que saber que si se encripto en la db y luego la desencriptas no podras entrar, tienes que registrarte...
            $query = $db->prepare("SELECT uid FROM users WHERE (username=:UserAndEmail or email=:UserAndEmail) AND password=:hash_password"); 
            //con $query ejecutamos la consulta a la db...
            $query->bindParam("UserAndEmail", $UserAndEmail,PDO::PARAM_STR) ;
            $query->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
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
                $_SESSION['uid'] = $data->uid; 
                // Aqui guardamos la seccion de la persona que este logeandose
                //tomamos del objeto data, el atributo id
                return true;
            }else{
                return false;
            } 
        }
        catch(PDOException $e) {
            
            //echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    /* User Registro */
    public function userRegistration($UserNameReg,$PasswordReg,$EmailReg,$NameReg){
        try{
            $db = getDB();
            $query = $db->prepare("SELECT uid FROM users WHERE username=:UserNameReg OR email=:EmailReg"); 
            $query->bindParam("UserNameReg", $UserNameReg,PDO::PARAM_STR);
            $query->bindParam("EmailReg", $EmailReg,PDO::PARAM_STR);
            $query->execute();
            $count=$query->rowCount();
            echo "no";

            if($count >= 1){
                $db = null;
                echo"perraaaaa";
                return false;
            }

            if($count<1){
                //Si llego menos de 1 fila afectada, fue que no encontr ni email ni username igual a la db entonces crealo
                $queryInsert = $db->prepare("INSERT INTO users(username,password,email,name) VALUES (:UserNameReg,:hash_password,:EmailReg,:NameReg)");
                $queryInsert->bindParam("UserNameReg", $UserNameReg,PDO::PARAM_STR) ;
                $hash_password= hash('sha256', $PasswordReg); //Password encriptado
                $queryInsert->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
                $queryInsert->bindParam("EmailReg", $EmailReg,PDO::PARAM_STR) ;
                $queryInsert->bindParam("NameReg", $NameReg,PDO::PARAM_STR) ;
                $queryInsert->execute();
                echo "EJECUTESEEE";
                $uid=$db->lastInsertId(); // funcion para ver cual es el ultimo Id de la ultima fila insertada
                $db = null;
                $_SESSION['uid'] = $uid;

                return true;
            }
            else{
                $db = null;
                return false;
            }
        }catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }
    }

    /* User Details */
    public function userDetails($uid){
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT email,username,name FROM users WHERE uid=:uid"); 
            $stmt->bindParam("uid", $uid,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
        }catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}

?>