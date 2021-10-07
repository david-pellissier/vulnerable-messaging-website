<?php if(isset($message) && $message != "") { ?>
<div class="info-user">
    <?php echo $message; ?>
</div>
<?php  $message = ""; }?>