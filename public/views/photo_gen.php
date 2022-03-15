<?php foreach ($params as $photo): ?>
    <a href="/photo/<?php echo $photo['photo_id'];?>">
        <img class="photo_card" src="<?php echo $photo['photo_path'];?>" width="400" height="auto" data-id="<?php echo $photo['photo_id'];?>">
    </a>
<?php endforeach;
