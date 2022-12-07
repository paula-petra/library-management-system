<?php
if(isset($_SESSION['message'])){
    ?>
        <p>
            <?= $_SESSION['message']; ?>
            <a class="msg-icon" id="close-msg"><img src="imgs/icons8-close-50.png"></a>

        </p>

    <?php
}
?>