<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="font-family: 'Lato', sans-serif !important;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
        <img src="./img/so-logo-black.png" style="width: 125px; height: auto;" alt="" class="nav-image">
    </a>

    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
        <span class="navbar-text">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?php echo ($active == 'index') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="index.php">Home</a>
                </li>
                <?php echo ($active == 'listings') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="listings.php">For Sale</a>
                </li>
                <?php echo ($active == 'contact') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="contact.php">Contact</a>
                </li>
                <?php echo ($active == 'login') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="login.php">Log In</a>
                </li>
<?php echo ($active == 'signup') ? '<li class="nav-item active">' : '<li class="nav-item">' ?>
                    <a class="nav-link header-link" href="signup.php">Sign Up</a>
                </li>
            </ul>
        </span>
    </div>
</nav>
