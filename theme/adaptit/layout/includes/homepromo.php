<?php
$haspromotitle = (!empty($PAGE->theme->settings->promotitle));
$haspromocopy = (!empty($PAGE->theme->settings->promocopy));
$haspromocta = (!empty($PAGE->theme->settings->promocta));
$haspromoctaurl = (!empty($PAGE->theme->settings->promoctaurl));

$promotitle = $PAGE->theme->settings->promotitle;
$promocopy = $PAGE->theme->settings->promocopy;
$promocta = $PAGE->theme->settings->promocta;
$promoctaurl = $PAGE->theme->settings->promoctaurl;
?>

<?php if($PAGE->theme->settings->usepromo ==1) { ?>        
<section class="promo box box-dark">        
    <div class="col-md-9">
    <?php if ($haspromotitle) { ?>
    <h1 class="section-heading"><?php echo $promotitle ?></h1>
    <?php } ?>
    <?php if ($haspromocopy) { ?>
    <p><?php echo $promocopy ?></p>  
    <?php } ?>
    </div>  
    <?php if ($haspromocta) {?>
    <div class="col-md-3">
        <a class="btn btn-cta" href="<?php if ($haspromoctaurl) {echo $PAGE->theme->settings->promoctaurl;} ?>"><?php echo $promocta  ?><i class="fa fa-play-circle fa-after"></i></a>  
    </div>
    <?php }?>          
</section><!--//promo-->
<?php }?>