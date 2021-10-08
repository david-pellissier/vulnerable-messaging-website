<?php if(isset($message) && $message != "") { ?>
<div class="info-user" style="background-color:#e3e3e3";>
    <?php echo $message; ?>
</div>
<?php  $message = ""; }?>