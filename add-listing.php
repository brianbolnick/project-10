<?php $active = 'addListing'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SellOut | Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link rel="stylesheet" href="./styles/styles.css" >

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    </head>
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