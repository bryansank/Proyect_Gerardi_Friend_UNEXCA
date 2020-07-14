<?php 

class userClass{

    /* User Login */
    public function userLogin($UserAndEmail,$Password){
        try{
            $db = getDB();//Aqui llamamos al metodo que hicimos en config, para conectarnos a la base de datos...
            $hash_password= hash('sha256', $Password);
            //Aqui encriptamos la contraseña con sha256, puedes quitarselo cuando quieras, pero tienes
            //que saber que si se encripto en la db y luego la desencriptas no podras entrar, tienes que registrarte...
            $query = $db->prepare("SELECT name,username FROM users WHERE (username=:UserAndEmail or email=:UserAndEmail) AND password=:hash_password"); 
            //con $query ejecutamos la consulta a la db...
            $query->bindParam("UserAndEmail", $UserAndEmail,PDO::PARAM_STR) ;
            $query->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            //Aqui asignamos los parametros a los valores que usaremos para la consulta.
            $query->execute();
            //Aqui ejecutamos el query.
            $count=$query->rowCount();
            //Aqui asignamos a cout el metodo de rowCount que devuelve si algo fue afectado, quiere decir
            //que si el query fallo o sucedio algo inesperado devuelve error
            
            if($count){
                $data=$query->fetch(PDO::FETCH_OBJ);
                //Aqui trae el objeto de la consulta, en este caso, trae id, nombre, contraseña, usuario y demas
                $_SESSION['username'] = $data->username; 
                $db = null;
                //Hacemos el db nulo para limpiar todo lo que tiene y no crear basura xd
                return true;
            }else{
                $db = null;
                return false;
            }
        }
        catch(PDOException $e) {
            
            //echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    /* User Login */
    public function userLoginAdmin($UserAndEmailAdmin,$PasswordAdmin){
        try{
            $db = getDB();
            $query = $db->prepare("SELECT * FROM admins WHERE (username=:UserAndEmailAdmin OR email=:UserAndEmailAdmin) AND password=:PasswordAdmin"); 
            $query->bindParam("UserAndEmailAdmin", $UserAndEmailAdmin,PDO::PARAM_STR) ;
            $query->bindParam("PasswordAdmin", $PasswordAdmin,PDO::PARAM_STR) ;
            $query->execute();
            $count=$query->rowCount();
            //$data=$query->fetch(PDO::FETCH_OBJ); 
            //$data=$query->fetch(PDO::FETCH_OBJ);
            

            if($count){
                $data=$query->fetch(PDO::FETCH_OBJ);
                $db = null;

                //$_SESSION['uid'] = $data->uid; 
                $_SESSION['username'] = $data->username; 
                return $data;
            }else{
                $db = null;
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

            if($count >= 1){
                $db = null;
                return false;
            }else{
                $queryInsert = $db->prepare("INSERT INTO users(username,password,email,name) VALUES (:UserNameReg,:hash_password,:EmailReg,:NameReg)");

                $hash_password= hash('sha256', $PasswordReg); //Password encriptado

                $queryInsert->bindParam("UserNameReg", $UserNameReg,PDO::PARAM_STR);
                $queryInsert->bindParam("hash_password", $hash_password,PDO::PARAM_STR);
                $queryInsert->bindParam("EmailReg", $EmailReg,PDO::PARAM_STR);
                $queryInsert->bindParam("NameReg", $NameReg,PDO::PARAM_STR);
                $queryInsert->execute();

                $db = null;
                $_SESSION['username'] = $UserNameReg;

                return true;
            }
        }catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }
    }

    /* User Details */
    public function userDetails($username){
        try{
            $db = getDB();
            //$stmt = $db->prepare("SELECT email,username,name FROM users WHERE uid=:uid");
            $query = $db->prepare("SELECT name FROM users WHERE username=:username");
            $queryAdmin = $db->prepare("SELECT name FROM admins WHERE username=:username");
            $query->bindParam("username", $username,PDO::PARAM_STR);
            $queryAdmin->bindParam("username", $username,PDO::PARAM_STR);
            $query->execute();
            $queryAdmin->execute();
            $count = $query->rowCount();
            $countAdmin = $queryAdmin->rowCount();
            if($count){
                $data = $query->fetch(PDO::FETCH_OBJ); //User data
                $db = null;
                return $data;
            }if($countAdmin){
                $data = $queryAdmin->fetch(PDO::FETCH_OBJ); //User data
                $db = null;
                return $data;
            }else{
                return false;
            }
            
            
        }catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}
//--include("../config.php");
//--$obj = new userClass();
//--$hi = $obj->userLoginAdmin("admin","123456");
//--$equis = $_SESSION['username'];
//--$hao = $obj->userDetails($equis);
//if($hao){print_r($hao);}else{echo "no funciono";}
//--echo $hao->name;
//
//if($hi){print_r($hi);}else{echo "falso";}

//if($obj){echo "bien";}else{echo"no";}

/*if($obj){ 
    foreach($obj as $result) { 
        echo "
        <tr>
            <td>". $result -> id ."</td>
            <td>". $result -> name_product ."</td>
            <td>". $result -> type_product ."</td>
            <td>". $result -> price_product ."</td>
        </tr>
        ";
    }
}else{
    echo "<tr>
            <td>"."Verifique la conexion a internet"."</td>
            <td>"."Verifique la conexion a internet"."</td>
            <td>"."Verifique la conexion a internet"."</td>
            <td>"."Verifique la conexion a internet"."</td>
            <td>"."Verifique la conexion a internet"."</td>
            <td>"."Verifique la conexion a internet"."</td>
        </tr>";
}*/

?>
