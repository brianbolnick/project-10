<?php
    putenv("SENDGRID_API_KEY=<SECRET KEY GOES HERE>");
    $_ENV['SENDGRID_API_KEY'] = getenv("SENDGRID_API_KEY");    
?>