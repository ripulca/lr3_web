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
    <link rel="stylesheet" type="text/css" href="css/page_style.css">
    <link rel="stylesheet" type="text/css" href="css/rating_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;400&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
    <body>
        <div class="app">
            <?php require 'views/header.php'; ?>
            <main class="main">
                <div class='main_photo_container'>
                    <img src="<?php echo $params['photo']['photo_path'];?>" width="30%" height="auto"/>;
                </div>
                <div class='main_photo_info' style="font-weight:bold; font-size: 30px; text-trnsform: uppercase;">
                    <div class='main_photo_info_interactive'>
                        <div>
                            <p><?php echo $params['photo']['photo_name'];?></p>
                        </div>
                        <div class="main_photo_info_buttons">
                            <div class="rating rating_set">
                                <div class="rating_body">
                                    <div class="rating_active"></div>
                                    <div class="rating_items">
                                        <input type="radio" class="rating_item" name="rating" value="5">
                                        <input type="radio" class="rating_item" name="rating" value="4">
                                        <input type="radio" class="rating_item" name="rating" value="3">
                                        <input type="radio" class="rating_item" name="rating" value="2">
                                        <input type="radio" class="rating_item" name="rating" value="1">
                                    </div>
                                </div>
                                <div class="rating_value">3</div>
                            </div>
                        </div>
                    </div>
                    <p class="photo_author"><?php echo $params['user']['client_login'];?></p>
                </div>
                <div class='main_comments neomorf_flat'>
                    <div>
                        <p><b>testProfile</b></p>
                        <p><?php echo $params['post']['post_author_comment']?></p>
                        <p><?php echo $params['post']['post_date']?></p>
                    </div>
                </div>
            </main>
            <?php require 'views/footer.php'; ?>
            <?php require 'views/modal_win.php'; ?>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/buttons.js"></script>
    <script src="js/modal_win_buttons.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/rating.js"></script>
    </body>
</html>