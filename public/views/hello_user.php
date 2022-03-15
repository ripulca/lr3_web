<?php if (array_key_exists('client_id', $_SESSION)):?>
    <div class="hello">Привет, <?= $_SESSION['client_login'] ?></div>
    <button class="btn add_photo_btn">Add Photo</button>
    <a class="exit" href=<?= "/exit"?>>Exit</a>
<?php else: ?>
    <button class="header_nav_auth_btn neomorf_flat">Sign in/Sign up</button>
<?php endif; ?>