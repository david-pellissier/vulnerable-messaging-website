<!-- Permet d'afficher un message d'information à l'utilisateur sur les pages -->
<?php if(isset($_SESSION['message']) && $_SESSION['message'] != "") { ?>
<div class="info-user" style="background-color:#e3e3e3";>
    <?php echo $_SESSION['message'];
    $_SESSION['message'] = ""; ?>
</div>
<?php }?>