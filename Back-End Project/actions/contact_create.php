<?php
    if(mail($_POST['email'], "Customer contact from " . $_POST['name'] . " " . $_POST['surname'], $_POST['text'])) {
        $message = "Email sent";
    } else {
        $message = "Email not sent some error happened";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sent mail</title>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href="../">Return to home</a>
            </div>
        </div>
    </body>
</html>