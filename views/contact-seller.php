<?php $active = 'contact'; ?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>       
        <?php include("header.php"); ?>
        <div class="container contact-seller-container"  >
            <div class="contact-form-container">
                <h1>Contact Seller</h1>
                    <form>
                        <div class="form-group">
                            <label for="contactName">Your Name</label>
                            <input type="text" class="form-control" id="contactName" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email address</label>
                            <input type="email" class="form-control" id="contactEmail" placeholder="Email Address" required>
                        </div>
						<div class="form-group">
                            <label for="contactPhone">Phone Number</label>
                            <input type="tel" class="form-control" id="contactPhone" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="contactSubject">Subject</label>
                            <input type="text" class="form-control" id="contactSubject" placeholder="Subject">
                        </div>
                        <div class="form-group" required>
                            <label for="contactDetails">Message</label>
                            <textarea class="form-control" rows="3" id="fDescription" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px;" >Submit</button>
                    </form>
            </div>
        </div>
    </body>
    <?php include("footer.php"); ?>

</html>