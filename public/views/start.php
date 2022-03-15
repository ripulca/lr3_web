<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/page_style.css">
    <link rel="stylesheet" type="text/css" href="css/header_style.css">
    <link rel="stylesheet" type="text/css" href="css/main_style.css">
    <link rel="stylesheet" type="text/css" href="css/footer_style.css">
    <link rel="stylesheet" type="text/css" href="css/modal_win_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
    <body>
        <div class="app">
            <?php require 'views/header.php'; ?>
            <main class="main">
                <div class="main_info">
                    <div class="main_img_container">
                        <div class="main_info_container neomorf_flat"></div>
                    </div>
                    <div class="main_info_text">
                        <div>Find your ideal photo</div>
                        <div>We provide free high quality photos from all over the world</div>
                    </div>
                </div>
                <div class="main_photos_container">
                    <?php require 'views/first_view_photos.php'; ?>
                </div>
                <div class="main_btn_container">
                    <button class="add_content_btn">
                        Показать еще
                    </button>
                </div>
            </main>
            <?php require 'views/footer.php'; ?>
            <?php require 'views/modal_win.php'; ?>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/buttons.js"></script>
    <script src="js/modal_win_buttons.js"></script>
    </body>
</html>