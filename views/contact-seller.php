<?php 
    $active = 'contact'; 
    $listing_id = $_GET['listing_id'];
    $seller_email = $_GET['seller_email']
?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>       
        <?php include "header.php" ?>
        <div class="container contact-seller-container"  >
            <div class="contact-form-container">
                <h1>Contact Seller</h1>                
                    <form method='post' action='../controllers/ContactSeller.php'>
                        <div class="form-group">
                            <label for="contactName">Your Name</label>
                            <input type="text" class="form-control" id="contactName" placeholder="Full Name" required name='name'>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email address</label>
                            <input type="email" class="form-control" id="contactEmail" placeholder="Email Address" required name='email'> 
                        </div>
						<div class="form-group">
                            <label for="contactPhone">Phone Number</label>
                            <input type="tel" class="form-control" id="contactPhone" placeholder="Phone Number" name='phone'>
                        </div>
                        <div class="form-group">
                            <label for="contactSubject">Subject</label>
                            <input type="text" class="form-control" id="contactSubject" placeholder="Subject" name='subject'>
                        </div>
                        <div class="form-group" required>
                            <label for="contactDetails">Message</label>
                            <textarea class="form-control" rows="3" id="fDescription" placeholder="Message" name='message'></textarea>
                        </div>
                        <input type="hidden" name="seller-email" value=<?php echo $seller_email ?>>
                        <input type="hidden" name="listing_id" value=<?php echo $listing_id ?>>
                        <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;" >Submit</button>
                    </form>
            </div>
        </div>
    </body>
    <?php include("footer.php"); ?>

</html>