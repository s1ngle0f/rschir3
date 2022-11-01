<?php
    require_once 'helper.php';
    $requset_method = $_SERVER['REQUEST_METHOD'];
    if($requset_method == "GET"){
        if(!empty($_GET)){
            $id = $_GET["id"];
            $mysqli = openMysqli();
            $result = $mysqli->query("select * from " . catalogue . " where ID = $id");
            foreach ($result as $item){
                $product_item = array(
                    "id" => $item["ID"],
                    "name" => $item["name"],
                    "description" => $item["description"],
                    "price" => $item["price"]
                );
                echo json_encode($product_item);
            }
        }else{
        $mysqli = openMysqli();
        $result = $mysqli->query("select * from " . catalogue);
        $return = array();
        foreach ($result as $item){
            $product_item = array(
                "id" => $item["ID"],
                "name" => $item["name"],
                "description" => $item["description"],
                "price" => $item["price"]
            );
            // foreach ($item as $i){
            //     echo key($item);
            // }
            array_push($return, $product_item);
        }
        echo json_encode($return);
        }
    }elseif($requset_method == "POST"){
        $entity = json_decode(file_get_contents('php://input'), true);
        $mysqli = openMysqli();
        $name = $entity[name];
        $description = $entity[description];
        $price = $entity[price];
        $result = $mysqli->query("insert into " . catalogue . " (name, description, price) VALUES (" . "'$name', '$description', $price)");
        echo json_encode($entity);
    }elseif($requset_method == "PUT"){
        $entity = json_decode(file_get_contents('php://input'), true);
        $mysqli = openMysqli();
        $id = $entity["id"];
        $name = $entity[name];
        $description = $entity[description];
        $price = $entity[price];
        // echo "update " . catalogue . " set name='$name', description='$description', price=$price where ID = $id";
        $result = $mysqli->query("update " . catalogue . " set name = '$name', description = '$description', price = $price where ID = $id");
        echo json_encode($entity);
    }
    elseif($requset_method == "DELETE"){
        $entity = json_decode(file_get_contents('php://input'), true);
        $mysqli = openMysqli();
        $id = $entity["id"];
        $result = $mysqli->query("delete from " . catalogue . " where ID = $id");
        echo "Deleted";
    }
?>