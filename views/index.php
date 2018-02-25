<?php $active = 'index';?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body class='custom-body'> 
        <?php 
            include "header.php";
            if (isset($_GET['message'])) {
                echo '<div class="flash-message">';
                echo $_GET['message'];
                echo '</div>';
            }
        ?>
        <div class="container home-container" >
            <h1 class="home-title">Classifieds for College Students.</h1>
            <a href="../controllers/GetListings.php">
                <button type="button" class="btn btn-outline-dark home-listing-button">
                    <span style="font-size: 2rem; margin-right: 10px;"> Shop Now</span>
                    <i class="fas fa-arrow-right "></i>
                </button>
            </a>
        </div>
    </body>
    <?php include "footer.php";?>
</html>
