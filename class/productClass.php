<?php 

    class Product{

        public function getProducts(){

            try{
                $db = getDB();
                $query = $db->prepare("SELECT * FROM product"); 
                $query->execute();
                $data=$query->fetchAll(PDO::FETCH_OBJ); 
                $db = null;
    
                if($query -> rowCount() > 0){
                    return $data;
                }else{
                    return false;
                } 
            }
            catch(PDOException $e) {
                //echo '{"error":{"text":'. $e->getMessage() .'}}';
            }

        }

        public function insertNewProduct($NameProductInsert,$TypeProductInsert,$PriceProductInsert){

            try{
                $db = getDB();
                $query = $db->prepare("INSERT INTO product(name_product,type_product,price_product) values(:name_product,:type_product,:price_product)");
                $query->bindParam(':name_product',$NameProductInsert,PDO::PARAM_STR);
                $query->bindParam(':type_product',$TypeProductInsert,PDO::PARAM_STR);
                $query->bindParam(':price_product',$PriceProductInsert,PDO::PARAM_INT);
                $query->execute();
                $db = null;
                if($query -> rowCount() > 0){
                    return true;
                }else{
                    return false;
                } 
            }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }

        public function deleteProduct($id){
            try {
                $db = getDB();
                $query = $db->prepare("DELETE FROM product WHERE id=:id");
                $query -> bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $count = $query->rowCount();
                if($count){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }

        public function editProduct($id){
            try {
                $db = getDB();
                $query = $db->prepare("SELECT * FROM product WHERE id=:id");
                $query -> bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $count = $query->rowCount();
                
                if($count){
                    $data=$query->fetch(PDO::FETCH_OBJ); 
                    $db = null;
                    return $data;
                }else{
                    return false;
                }
            }catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }

        public function updateProduct($id,$name,$type,$price){
            try {
                $db = getDB();
                $query = $db->prepare("UPDATE product SET name_product=:name ,type_product=:type ,price_product=:price  WHERE id=:id");
                $query -> bindParam(':id', $id, PDO::PARAM_INT);
                $query -> bindParam(':name', $name, PDO::PARAM_STR);
                $query -> bindParam(':type', $type, PDO::PARAM_STR);
                $query -> bindParam(':price', $price, PDO::PARAM_INT);
                $query->execute();
                $count = $query->rowCount();
                
                if($count){
                    //$data=$query->fetchAll(PDO::FETCH_OBJ); 
                    $db = null;
                    return true;
                }else{
                    return false;
                }
            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }

    }
?>