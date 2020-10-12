<?php if ( !defined('ABSPATH') ) exit();?>

<div class="anony-menu-owl-carousel owl-carousel owl-theme">

<?php foreach ($slider_data as $item) :
	extract($item); ?>
	
    <div class="item">
    	<a href="<?= $url ?>">
	    	<?php if(!empty($icon_url)) : ?> <span class="category-icon-wrapper"><img src="<?= $icon_url ?>" alt="<?= $name ?>" class="category-icon"/></span> <?php endif ?>
	    	<?= $name ?>
	    </a>
	</div>
	
<?php endforeach ?>

</div>

