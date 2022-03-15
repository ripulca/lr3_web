<div class="dark_background">
    <div class="modal_win">
        <div class="modal_win_header">
            <button class="modal_win_btn close">
                <svg width="30" height="30" viewBox="0 0 30 30">
                    <path d="M25.33 8.55l-1.88-1.88-7.45 7.45-7.45-7.45-1.88 1.88 7.45 7.45-7.45 7.45 1.88 1.88 7.45-7.45 7.45 7.45 1.88-1.88-7.45-7.45z"></path>
                </svg>
            </button>
            <div class="modal_change_btns">
                <button class="modal_win_btn sign_in">
                    Sign in
                </button>
                <button class="modal_win_btn sign_up">
                    Sign up
                </button>
            </div>
        </div>
        <?php
        require 'modal_enter.php';
        require 'modal_reg.php';
        require 'modal_add.php';
        ?>
    </div>
</div>