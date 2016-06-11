<?php

class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/db_connect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }


    // All Brand
    public function getAllBrand() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT brand_id, description FROM brand");

        if($stmt->execute()){
            $stmt->bind_result($brand_id, $description);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["brand_id"] = $brand_id;
                    $tmp["description"] = $description;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // add Brand
    public function addBrand($description) {
        $response = array();

        $stmt = $this->conn->prepare("INSERT INTO brand(description) VALUES(?)");
        $stmt->bind_param("s", $description);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
        } else {
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // Get Brand by Id
    public function getBrandById($id) {

        $response = array();
        $stmt = $this->conn->prepare("SELECT brand_id, description FROM brand WHERE brand_id = ?");
        $stmt->bind_param("s", $id);

        if($stmt->execute()){
            $stmt->bind_result($brand_id, $description);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["brand_id"] = $brand_id;
                    $tmp["description"] = $description;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }


        return $response;
    }


    // All Category
    public function getAllCategory() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT category_id, description FROM category");

        if($stmt->execute()){
            $stmt->bind_result($category_id, $description);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["category_id"] = $category_id;
                    $tmp["description"] = $description;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // add Category
    public function addCategory($description) {
        $response = array();

        $stmt = $this->conn->prepare("INSERT INTO category(description) VALUES(?)");
        $stmt->bind_param("s", $description);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
        } else {
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // Get Category by Id
    public function getCategoryById($id) {

        $response = array();
        $stmt = $this->conn->prepare("SELECT category_id, description FROM category WHERE category_id = ?");
        $stmt->bind_param("s", $id);
        if($stmt->execute()){
            $stmt->bind_result($category_id, $description);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["category_id"] = $category_id;
                    $tmp["description"] = $description;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }
        return $response;
    }


    // All Products
    public function getAllProduct() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT product_id, description, price, brand_id, category_id, latitude, 
longitude, image from product");

        if($stmt->execute()){
            $stmt->bind_result($product_id, $description, $price, $brand_id, $category_id, $latitude, $longitude, $image);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["product_id"] = $product_id;
                    $tmp["description"] = $description;
                    $tmp["price"] = $price;
                    $tmp["brand_id"] = $brand_id;
                    $tmp["category_id"] = $category_id;
                    $tmp["latitude"] = $latitude;
                    $tmp["longitude"] = $longitude;
                    $tmp["image"] = $image;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }
        return $response;
    }


    // Get Product by Id
    public function getProductById($id) {

        $response = array();
        $stmt = $this->conn->prepare("SELECT product_id, description, price, brand_id, category_id, latitude, 
longitude, image from product WHERE product_id = ?");
        $stmt->bind_param("s", $id);
        if($stmt->execute()){
            $stmt->bind_result($product_id, $description, $price, $brand_id, $category_id, $latitude, $longitude, $image);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["product_id"] = $product_id;
                    $tmp["description"] = $description;
                    $tmp["price"] = $price;
                    $tmp["brand_id"] = $brand_id;
                    $tmp["category_id"] = $category_id;
                    $tmp["latitude"] = $latitude;
                    $tmp["longitude"] = $longitude;
                    $tmp["image"] = $image;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }
        return $response;
    }

    // Get Product by category_id
    public function getProductByCategoryId($id) {

        $response = array();
        $stmt = $this->conn->prepare("SELECT product_id, description, price, brand_id, category_id, latitude, 
longitude, image from product WHERE category_id = ?");
        $stmt->bind_param("s", $id);
        if($stmt->execute()){
            $stmt->bind_result($product_id, $description, $price, $brand_id, $category_id, $latitude, $longitude, $image);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["product_id"] = $product_id;
                    $tmp["description"] = $description;
                    $tmp["price"] = $price;
                    $tmp["brand_id"] = $brand_id;
                    $tmp["category_id"] = $category_id;
                    $tmp["latitude"] = $latitude;
                    $tmp["longitude"] = $longitude;
                    $tmp["image"] = $image;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }
        return $response;
    }


    // Get Product by brand_id
    public function getProductByBrandId($id) {

        $response = array();
        $stmt = $this->conn->prepare("SELECT product_id, description, price, brand_id, category_id, latitude, 
longitude, image from product WHERE brand_id = ?");
        $stmt->bind_param("s", $id);
        if($stmt->execute()){
            $stmt->bind_result($product_id, $description, $price, $brand_id, $category_id, $latitude, $longitude, $image);
            $stmt->store_result();
            if($stmt->num_rows>0){
                $data = array();
                while ($stmt->fetch()) {
                    $tmp = array();
                    $tmp["product_id"] = $product_id;
                    $tmp["description"] = $description;
                    $tmp["price"] = $price;
                    $tmp["brand_id"] = $brand_id;
                    $tmp["category_id"] = $category_id;
                    $tmp["latitude"] = $latitude;
                    $tmp["longitude"] = $longitude;
                    $tmp["image"] = $image;
                    array_push($data, $tmp);
                }
                $_meta = array();
                $_meta["status"]="success";
                $_meta["code"]="200";
                $response["_meta"] = $_meta;
                $response["data"] = $data;
                $stmt->close();
                return $response;
            }else{
                $meta = array();
                $meta["status"] = "error";
                $meta["code"] = "101";
                $response["_meta"] = $meta;
            }
        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }
        return $response;
    }


    // add Product
    public function addProduct($description, $price, $brand_id, $category_id, $latitude, $longitude, $image) {
        $response = array();

        $stmt = $this->conn->prepare("INSERT INTO product(description, price, brand_id, category_id, 
latitude, longitude, image) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $description, $price, $brand_id, $category_id, $latitude, $longitude, $image);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
        } else {
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "Error al registar Product";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // add User
    public function addUser($name, $lastname, $surename, $email, $password) {
        $response = array();

        $stmt = $this->conn->prepare("INSERT INTO user(name, lastname, surename, email, password) VALUES(?, ?, ?, ?, md5(?))");
        $stmt->bind_param("sssss", $name, $lastname, $surename, $email, $password);
        $result = $stmt->execute();
        $stmt->close();

        if ($result) {
            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
        } else {
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $response["_meta"] = $meta;
        }

        return $response;
    }



}

?>
