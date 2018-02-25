<?php
$active = 'listings';
require_once '../models/model.php';
require_once '../utils/db_config.php';
session_start();

$data = $_SESSION['listing'];

?>
<!doctype html>
<html>
    <?php include "head.php"?>
    <body>
        <?php include "header.php";?>
        <div class="container item-container">
            <div class="item-left" style='background: url(<?php echo $data['image_url'] ?>);'></div>
            <div class="item-right">
                <div class="item-title">
                    <?php echo $data['title'] ?>
                </div>
                <div class="item-date">
                    Posted on <?php echo $data['list_date'] ?>
                </div>
                <div class="item-price">
                    $<?php echo $data['price'] ?>
                </div>

                <div class="item-description">
                    <div class="description-title">DESCRIPTION</div>
                    <?php echo $data['description'] ?>
                </div>

                <div class="item-footer">
                    <a href="contact-seller.php?seller_id=<?php echo $data['user_id'] ?>">
                        <button type="button" class="btn btn-outline-dark contact-seller-button">
                            <i class="fas fa-envelope "></i>
                            <span style="font-size: 1rem; margin-right: 10px;">Contact Seller</span>
                        </button>
                    </a>
                </div>
            </div>            
        </div>
    </body>
    <?php include "footer.php";?>
</html>