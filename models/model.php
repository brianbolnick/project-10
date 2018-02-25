<?php

require_once '../utils/db_config.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

// User Model
class User
{
    public $first_name, $last_name, $email, $password, $institution_id, $phone;

    public function __construct($first_name, $last_name, $password, $email, $phone, $institution_id)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->institution_id = $institution_id;
        $this->phone = $phone;
    }

    public function insert()
    {
        global $conn;
        $first_name = $this->first_name;
        $last_name = $this->last_name;
        $email = $this->email;
        $password = $this->password;
        $institution_id = $this->institution_id;
        $phone = $this->phone;
        $query = "insert into users (user_id, first_name, last_name, password, email, phone, institution_id)
			values (NULL, '$first_name', '$last_name', '$password', '$email' , '$phone', '$institution_id') ";
        $result = $conn->query($query);
        if (!$result) {
            die(
                "<div class='flash-message' style='position: relative;'>$conn->error</div>"
            );

        }
    }
}

class Listing
{
    public $description, $title, $price, $list_date, $user_id, $category_id, $image_url, $listing_id;

    public function __construct($listing_id, $description, $title, $list_date, $price, $category_id, $user_id, $image_url)
    {
        $this->description = $description;
        $this->title = $title;
        $this->price = $price;
        $this->list_date = $list_date;
        $this->user_id = $user_id;
        $this->category_id = $category_id;
        $this->image_url = $image_url;
        $this->listing_id = $listing_id;
    }

    public function insert()
    {
        global $conn;
        $description = $this->description;
        $title = $this->title;
        $price = $this->price;
        $list_date = $this->list_date;
        $user_id = $this->user_id;
        $category_id = $this->category_id;
        $image_url = $this->image_url;

        $query = "insert into listings (listing_id, description, title, list_date, price, category_id, user_id, image_url)
			values ('$listing_id', '$description', '$title', '$list_date', '$price' , '$category_id', '$user_id', '$image_url') ";
        $result = $conn->query($query);
        if (!$result) {
            die(
                "<div class='flash-message' style='position: relative;'>$conn->error</div>"
            );
        }
    }

    public function select($where)
    {
        echo $where;
        global $conn;
        $query = "Select * from users where $where ";

        $result = $conn->query($query);
        if (!$result) {
            die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
        }

        $data = $result->fetch_assoc();
        return $data;
    }
}

class ListingsModel
{
    public $listings = array();

    public function selectAll()
    {
        global $listings, $conn;

        $query = "Select * from listings";
        $result = $conn->query($query);
        if (!$result) {
            die(
                "<div class='flash-message' style='position: relative;'>$conn->error</div>"
            );
        }

        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; $j++) {
            $result->data_seek($j);
            $row = $result->fetch_assoc();

            $listing = new Listing($row['listing_id'], $row['description'], $row['title'], $row['list_date'], $row['price'], $row['category_id'], $row['user_id'], $row['image_url']);
            $listings[] = $listing;
        }
        return $listings;
    }

    public function select($where)
    {
        global $conn;
        $query = "Select * from listings where $where ";

        $result = $conn->query($query);
        if (!$result) {
            die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
        }

        $data = $result->fetch_assoc();
        return $data;
    }

    public function filter($where)
    {
        // global $conn;
        // $query = "Select * from listings where $where";

        // $result = $conn->query($query);
        // if (!$result) {
        //     die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
        // }

        // $data = $result->fetch_assoc();
        // return $data;

        global $listings, $conn;

        $query = "Select * from listings where $where";
        $result = $conn->query($query);
        if (!$result) {
            die(
                "<div class='flash-message' style='position: relative;'>$conn->error</div>"
            );
        }

        $rows = $result->num_rows;
        for ($j = 0; $j < $rows; $j++) {
            $result->data_seek($j);
            $row = $result->fetch_assoc();

            $listing = new Listing($row['listing_id'], $row['description'], $row['title'], $row['list_date'], $row['price'], $row['category_id'], $row['user_id'], $row['image_url']);
            $listings[] = $listing;
        }
        return $listings;
    }

    

    public function delete($where)
    {
        global $conn;
        $query = "delete from listings where $where ";

        $result = $conn->query($query);
        if (!$result) {
            die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
        }

        // $data = $result->fetch_assoc();
        // return $data;
    }

}

class UsersModel
{
    public $users = array();

    public function select($where)
    {
        global $conn;
        $query = "Select * from users where $where ";

        $result = $conn->query($query);
        if (!$result) {
            die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
        }

        $data = $result->fetch_assoc();
        return $data;
    }

}
// $obj = new ListingsModel();
// $temp_id ='6';
// // $obj->select("`listings`.`category_id` = " . $temp_id);
// print_r($obj->selectAll());
?>