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

    }
?>