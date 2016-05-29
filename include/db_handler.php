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
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["brand_id"] = $dataQuery['brand_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
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
            $meta["message"] = "Error al registar Marca";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // Get Brand by Id
    public function getBrandById($id) {

        $response = array();
        $stmt = $this->conn->prepare("SELECT brand_id, description FROM brand WHERE brand_id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["brand_id"] = $dataQuery['brand_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
            $response["_meta"] = $meta;
        }
        return $response;
    }


    // All Category
    public function getAllCategory() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT category_id, description FROM category");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["category_id"] = $dataQuery['category_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
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
            $meta["message"] = "Error al registar Categoria";
            $response["_meta"] = $meta;
        }

        return $response;
    }


    // All Products
    public function getAllProduct() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT product_id, description, price, brand_id, category_id, latitude, 
longitude, image from product");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["product_id"] = $dataQuery['product_id'];
                $tmp["description"] = $dataQuery['description'];
                $tmp["price"] = $dataQuery['price'];
                $tmp["brand_id"] = $dataQuery['brand_id'];
                $tmp["category_id"] = $dataQuery['category_id'];
                $tmp["latitude"] = $dataQuery['latitude'];
                $tmp["longitude"] = $dataQuery['longitude'];
                $tmp["image"] = $dataQuery['image'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
            $response["_meta"] = $meta;
        }
        return $response;
    }


    // Places By Description
    public function getPlaceByDescription($description) {

        if($description=='All'){
            $description='';
        }

        $response = array();
        $stmt = $this->conn->prepare("SELECT place_id, description FROM place 
              WHERE description LIKE '%$description%'");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["place_id"] = $dataQuery['place_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
            $response["_meta"] = $meta;
        }
        return $response;
    }

    // All Places
    public function getAllPlace() {

        $response = array();
        $stmt = $this->conn->prepare("SELECT place_id, description FROM place");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $data = array();

        if($result->num_rows >0){

            while ($dataQuery = $result->fetch_assoc()) {
                $tmp = array();
                $tmp["place_id"] = $dataQuery['place_id'];
                $tmp["description"] = $dataQuery['description'];
                array_push($data, $tmp);
            }


            $meta = array();
            $meta["status"] = "success";
            $meta["code"] = "200";
            $response["_meta"] = $meta;
            $response["data"] = $data;

        }else{
            $meta = array();
            $meta["status"] = "error";
            $meta["code"] = "100";
            $meta["message"] = "No existe información";
            $response["_meta"] = $meta;
        }
        return $response;
    }

}

?>
