<?php
    $coded = file_get_contents("php://input");
    $image = base64_decode($coded);
    file_put_contents("./imagenes/100.jpg", $image);
    ?>