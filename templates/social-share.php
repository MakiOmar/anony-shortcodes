<?php if ( !defined('ABSPATH') ) exit();?>

<div class="share <?= $socials_style ?>-socials">
				
	<a href="#" class="share-icon"><i class="fa fa-share-alt fa-2x" aria-hidden="true"></i></a>
	
	<a href="https://www.facebook.com/sharer.php?u=<?= $permalink ;?>&amp;t=<?= $title ?>" target="_blank" class="facebook-icon">
		<i class="fa fa-facebook-f fa-3x"></i>
	</a>
	
	<a href="https://twitter.com/home/?status=<?= $title ?> : <?= $permalink ;?>" target="_blank" class="twitter-icon">
		<i class="fab fa-twitter fa-3x"></i>
	</a>
	
	<a href="https://www.linkedin.com/cws/share?url=<?= $permalink; ?>" target="_blank" class="linkedin-icon">
		<i class="fa fa-linkedin  fa-3x" aria-hidden="true"></i>
	</a>
</div>