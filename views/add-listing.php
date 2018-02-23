<?php $active = 'addListing'; ?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>       
        <?php include("header.php"); ?>
        <div class="container add-container"  >
            <div class="add-form-container">
                <h1 style='text-align:center'>Add Listing</h1>     
                <form method='post' action='add-listing.php'>
                    <div class="form-group">
                        <label for="InputTitle">Title</label>
                        <input type="text" class="form-control" id="InputTitle" placeholder="Title" name='title' required>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <input type="text" class="form-control" id="inputDescription" placeholder="Description" name='description' required>
                    </div>
					<div class="form-group">
                        <label for="inputPrice">Price</label>
                        <input type="text" class="form-control"  id="inputPrice" placeholder="Price" name='price' required>
                    </div>
					<div class="form-group">                													
                        <label for="inputCategory">Category</label>
                        <select type="category" class="form-control" id="category" name='category' required>
                            <option>Arts and Entertainment</option>
                            <option>Sporting Goods</option>
                            <option>Electronics</option>
                            <option>Furniture and Home Decor</option>
                            <option>Pet Supplies</option>
                            <option>Music and Instruments</option>
                            <option>Culinary and Food</option>
                            <option>Housing and Real Estate</option>
                            <option>Tools and Hardware</option>
                            <option>Books</option>
                        </select>
					</div>
                    <label for="image-file">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image-file">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    
                    <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;">Post Listing</button>
                </form>
            </div>    
        </div>
    </body>
    <?php include("footer.php"); ?>

</html>