<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Simple Admin Panel</title>
    </head>

    <body>

        <div class="container" id="container">
            <div class="info-container user-info">
                <h1>Welcome back,
                    <?php echo $_SESSION['user_name'] ?>
                </h1>
                
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

    <?php

} else {

    header("Location: index.php");

    exit();

}

?>