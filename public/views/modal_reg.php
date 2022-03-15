<form name='registration' class="modal_win_content registration" method='POST'>
    <input name="login" class="modal_win_input" type="text" placeholder="Enter login" required="required" pattern="^[А-Яа-яЁё\s\-]+$">
    <input name="email" class="modal_win_input" type="email" placeholder="Enter email" required="required" pattern="^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$">
    <input name="phone" class="modal_win_input" type="phone" placeholder="Enter phone" required="required" pattern="^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$">
    <input name="password" class="modal_win_input" type="password" placeholder="Enter password" required="required" minlength="6">
    <input name="password_repeat" class="modal_win_input" type="password" placeholder="Repeat password" required="required" minlength="6">
    <div style="color: white"><input name="permission" type="checkbox" style="margin:5px" required="required"><label for="permission">Согласие на продажу почки</label></div>
    <button class="submit submit_reg modal_win_submit_btn">Submit</button>
    <p class="msg msg-reg"></p>
</form>