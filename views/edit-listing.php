<?php
$active = 'addListing';

$active = 'signup';
$listing_id = $_GET['listing_id'];
require_once '../models/model.php';
require_once '../utils/db_config.php';
require_once '../utils/check_session.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->error) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$categories_query = "SELECT * FROM category";
$categories_result = $conn->query($categories_query);
if (!$categories_result) {
    die("<div class='flash-message' style='position: relative;'>$conn->error</div>");
}

$categories = $categories_result->fetch_array(MYSQLI_NUM);
$category_count = $categories_result->num_rows;

$list_obj = new ListingsModel();
$listing = $list_obj->select(" listing_id = '$listing_id'");
$x_pos = 1 + strrpos($listing['image_url'], "/");
$img_name = substr($listing['image_url'], $x_pos);

?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
        <div class="container add-container"  >
            <div class="add-form-container">
                <h1 style='text-align:center'>Edit Listing</h1>
                <form method='post' action=<?php echo "../controllers/EditListing.php?listing_id=$listing_id" ?> enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="InputTitle">Title</label>
                        <input type="text" class="form-control" id="InputTitle" placeholder="Title" name='title' value="<?php echo htmlspecialchars($listing['title']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <input type="text" class="form-control" id="inputDescription" placeholder="Description" name='description' value="<?php echo htmlspecialchars($listing['description']); ?>" required>
                    </div>
					<div class="form-group">
                        <label for="inputPrice">Price</label>
                        <input type="text" class="form-control"  id="inputPrice" placeholder="Price" name='price' value="<?php echo htmlspecialchars($listing['price']); ?>" required>
                    </div>
					<div class="form-group">
                        <label for="inputCategory">Category</label>
                        <select type="category" class="form-control" id="category" name='category_id' value="<?php echo htmlspecialchars($listing['category_id']); ?>" required>
<?php
for ($j = 0; $j < $category_count; $j++) {
    $categories_result->data_seek($j);
    $row = $categories_result->fetch_array(MYSQLI_NUM);
    echo <<<_END
    <option value=$row[0]>$row[1]</option>
_END;
}
?>
                        </select>
					</div>
                    <label for="image-file">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image-file" name="image" value="<?php echo htmlspecialchars($listing['image_url']); ?>">
                        <label class="custom-file-label" for="image"><span id="file-placeholder"><?php echo htmlspecialchars($img_name); ?></span></label>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;" name="submit">Edit Listing</button>
                </form>
            </div>
        </div>
    </body>
    

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$(function() {

$(document).on('change', ':file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $(':file').on('fileselect', function(event, numFiles, label) {
        $('span#file-placeholder').text(label);
    });
});

});
</script>
</html>