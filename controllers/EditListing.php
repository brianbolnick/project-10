<?php
require_once '../models/model.php';
require '../vendor/autoload.php';

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_FILES["image"]["name"])) {

    //handle AWS upload for production
    if (isset($_ENV['AWS_ACCESS_KEY_ID'])) {
        $s3 = Aws\S3\S3Client::factory();
        $bucket = getenv('S3_BUCKET_NAME') ?: die('No "S3_BUCKET_NAME" config var in found in env!');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['image']['tmp_name'])) {
            $upload = $s3->upload($bucket, $_FILES['image']['name'], fopen($_FILES['image']['tmp_name'], 'rb'), 'public-read');
            session_start();
            $image_url = $upload['ObjectURL'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $date = date("M n, Y");

            $listing = new Listing(null, addslashes($description), $title, $date, $price, $category_id, $_SESSION['user_id'], $image_url);
            $listing->insert();
            header("Location: ../views/profile.php");
            exit();

        }
    }
    // handle upload to /uploads directory for local development
    else {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            if (!unlink($target_file)) {
                echo ("Error deleting $target_file");
            } 
        }
        // Check file size
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                session_start();

                $image_url = "../uploads/" . basename($_FILES["image"]["name"]);
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category_id = $_POST['category_id'];
                $date = date("M n, Y");
                $listing_id = $_GET['listing_id'];
                //code to create book list
                // $listing = new Listing(null, addslashes($description), $title, $date, $price, $category_id, $_SESSION['user_id'], $image_url);
                // $listing->insert();
                $obj = new ListingsModel();
                $obj->update($listing_id, addslashes($description), $title, $date, $price, $category_id, $_SESSION['user_id'], $image_url);
                header("Location: ../views/profile.php?message=Listing updated successfully");
                exit();

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>