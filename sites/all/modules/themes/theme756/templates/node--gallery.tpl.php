<div id="node-<?php print $node->nid; ?>" class="node-gallery">
	<?php
		$imgcount = count($node->field_gallery['und']);
		for ($i = 0; $i < $imgcount; $i++) {
    	$image_uri = $node->field_gallery['und'][$i]['uri'];
			// url
			$masthead_raw = image_style_url('size124x124', $image_uri);
	?>
      <a href="<?php print file_create_url($node->field_gallery['und'][$i]['uri']); ?>" rel="group-<?php print $node->nid; ?>" class="fancybox">
    
     <img class="image<?php print ($i + 1);?>" src="<?php print $masthead_raw; ?>" />
      </a>
    <?php } ?>
	<br /><br /><br /><br /><br />
    <div style="padding-top:55px;"><?php print $title; ?></div>

</div>