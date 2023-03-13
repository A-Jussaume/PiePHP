<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>

<fieldset id="show">
<form>
    <div>
    <?php
    echo "BIENVENUE " . $_SESSION['email'] . " !!!";
    ?>
    </div>
</form>
</fieldset>