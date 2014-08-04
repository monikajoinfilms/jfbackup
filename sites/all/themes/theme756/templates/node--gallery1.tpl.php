<div id="node-<?php print $node->nid; ?>" class="node-gallery">

	<?php

		$imgcount = count($node->field_gallery['und']);
	$url_heading = 	str_replace ( " " , "-" , $node->field_url_title['und'][0]['taxonomy_term']->name );
print_r($node->field_url_title['und'][0]['taxonomy_term']->name );
	//echo "<br /><br />";//[0]['tid']
$url_parh_gallery = "gallery/".$url_heading;

//echo "<br /><br />";//[0]['tid']
		for ($i = 0; $i < $imgcount; $i++) {

    	$image_uri = $node->field_gallery['und'][$i]['uri'];

			// url

			$masthead_raw = image_style_url('size124x124', $image_uri);
			

	?>

      <a href="<?php print $url_parh_gallery; ?>" rel="" >

    

     <img class="image<?php print ($i + 1);?>" src="<?php print $masthead_raw; ?>" />

      </a>

    <?php } ?>

    <div style="padding-top:125px;"><?php print $title; ?></div>



</div>