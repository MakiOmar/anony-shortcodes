<?php if ( !defined('ABSPATH') ) exit();?>

<div class="anoshc-posts-grid-<?= $style ?> anoshc-posts-grid">
	
	<?php foreach ($data as $p) : extract($p) ?>
	
	
	<div class="post-grid-item">
			
			
		<a href="<?= $permalink ?>" class="thumb-link thumb"><img src="<?= $thumbnail_img ?>"></a>
			
		
		<div class="terms">
		
			<h4><a href="<?= $_1st_category_url ?>"><?= $_1st_category_name ?></a></h4>
			
			<span class="excerpt-toggle"><i class="fa fa-angle-down"></i></span>	
		
		</div>
		
		<div class="post-item-body">
			<h2 class="post-title">
				<a href="<?= $permalink ?>"><?= $title ?></a>
			</h2>
			
			<p class="excerpt"><?= $excerpt ?></p>
		</div>
		
		<div class="meta">
			<div class="meta-info">
				<?= $gravatar ?>
				
				<div class="puplication-info">
					<p class="author"><?= $author ?></p>
					<p class="date"><?= $date ?></p>
				</div>
			</div>
			
			<?php include ANOSHC_TMPLS. '/social-share.php' ?>
			
			
		</div>
		
	</div>
	
	<?php endforeach  ?>
	

</div>