<form  name='add_photo' id='add_photo' class="modal_win_content add_photo" enctype="multipart/form-data" method='POST'>
    <input name="photo_name" class="modal_win_input" type="text" placeholder="Enter photo name" required pattern="^[А-Яа-яЁё\s\-]+$">
    <input name="photo_comment" class="modal_win_input" type="text" placeholder="Enter photo comment" pattern="^[А-Яа-яЁё\s\-]+$">
    <input name="photo" class="modal_win_input" type="file" placeholder="Download photo" required>
    <button name="submit_photo" class="submit submit_photo modal_win_submit_btn">Submit</button>
    <p class="msg msg-photo"></p>
</form>