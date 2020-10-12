<?php if ( !defined('ABSPATH') ) exit(); ?>
<div class="circle-data-wrapper">
	<?php foreach ($data as $index => $p) :
		$active = ($index === 0) ? 'active' : '';
		extract($p) ;?>
		
		<div class="dataItem <?= $active ?> dataItem<?= $index + 1 ?>">
			<h2><?= $title ?></h2>
			<p><?= $content ?></p>
		</div>
		
	<?php endforeach ?>
	

	
</div>

<div class="holderCircle circle-data-wrapper">

	<div class="dotCircle">
		<?php foreach ($data as $index => $p) : 
			$active = ($index === 0) ? 'active' : '';
			extract($p) ;?>
		
			<span class="itemDot <?= $active ?> itemDot<?= $index + 1 ?>" data-tab="<?= $index + 1 ?>">
				<img src="<?= $thumb_img_full ?>" />
				<span class="forActive"></span>
				<input class="type-url" type="hidden" value="value1"/>
			</span>
		
		<?php endforeach ?>

	</div>

	<div class="contentCircle">
		<?php foreach ($data as $index => $p) : 
			$active = ($index === 0) ? 'active' : '';
			extract($p) ;?>
        
			<div class="CirItem <?= $active ?> CirItem<?= $index + 1 ?>">
				<h2><?= $title ?></h2>	
			</div>
		
		<?php endforeach ?>

	</div>

</div>
