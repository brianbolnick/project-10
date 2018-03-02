<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    $link = "<a class='nav-link header-link' href='./login.php'>Log In</a>";
    $logout = '';
} else {
    $link = "<a class='nav-link header-link' href='./profile.php'>Profile</a>";
    $logout = "<li class='nav-item'><a class='nav-link header-link' href='../controllers/Logout.php'>Log Out</a> </li>";
}
?>

<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="font-family: 'Lato', sans-serif !important;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="./index.php">
        <img src="../img/so-logo-black.png" style="width: 125px; height: auto;" alt="" class="nav-image">
    </a>

    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
        <span class="navbar-text">
            <ul id="navderek" class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?php echo ($active == 'index') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="./index.php">Home</a>
                </li>
                <?php echo ($active == 'listings') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="../controllers/GetListings.php">Listings</a>
				</li>

                <?php echo ($active == 'contact') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="#" data-toggle="modal" data-target="#contactModal">Contact</a>
                </li>
                <?php echo ($active == 'login' || $active == 'profile') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <?php echo $link ?>
                </li>
                <?php echo $logout ?>
            </ul>
        </span>
    </div>
</nav>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactModalTitle">Contact Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="post" action="../controllers/ContactSellout.php">
                <div class="form-group">
                    <label for="contactName">Your Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Your name" required name="name">
                </div>
                <div class="form-group">
                    <label for="contactEmail">Email address</label>
                    <input type="email" class="form-control" id="contact-email" placeholder="Enter email" required name="email">
                </div>
                <div class="form-group">
                    <label for="contactIssue">Reason for contact</label>
                    <select class="form-control" id="reason" required name="reason">
                        <option>Account Issue</option>
                        <option>General Question</option>
                        <option>Listing Issue</option>
                        <option>Report a Listing/User</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group" required>
                    <label for="contactDetails">Detailed description of issue</label>
                    <textarea class="form-control" rows="3" id="fDescription" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-dark" style="margin-top: 10px; float: right;" >Submit</button>
            </form>
      </div>
      <div class="modal-footer">
       <em>* All requests should be responded to within 24 hours</em>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_GET['message'])) {
    echo '<div class="flash-message">';
    echo $_GET['message'];
    echo '</div>';
}
?>