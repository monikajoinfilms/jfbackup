<?php
	function hide_field($data)
	{
		if($data['text'] == 0)
		{
			?>
			<style>.field-name-field-text-profile2{display:none}</style>
			<?php
			}
		if($data['image'] == 0)
		{
			?>
			<style>.field-name-field-portfolio-image{display:none;}</style>
			<?php
			}
		if($data['video'] == 0)
		{
			?>
			<style>.field-name-field-video-profile2{display:none;}</style>
			<?php
			}
			?>
			<style>
			.form-item-profile-main-field-portfolio-image-und-<?php print $data['image']; ?>{display:none;}
			.form-item-profile-main-field-video-profile2-und-<?php print $data['video']; ?>{ display:none;}
			.form-item-profile-main-field-text-profile2-und-<?php print $data['text']; ?>{display:none;}
			</style>
			<?php
			}

	
	//Find Active profile
	function find_active_profile()
	{

		global $user;
		print_r($user->roles);
		$data = array();
		if($user->roles[17])
		{
			$data['image'] = 30;
			$data['video'] = 5;
			$data['text'] = 0;
			hide_field($data);
			}
		else if($user->roles[18])
		{
			$data['image'] = 15;
			$data['video'] = 2;
			$data['text'] = 0;
			hide_field($data);
			}
		else if($user->roles[24])
		{
			$data['image'] = 5;
			$data['video'] = 5;
			$data['text'] = 0;
			hide_field($data);
			}
		else if($user->roles[22])
		{
			$data['image'] = 3;
			$data['video'] = 2;
			$data['text'] = 0;
			hide_field($data);
			}
		else if($user->roles[21])
		{

			$data['image'] = 5;
			$data['video'] = 5;
			$data['text'] = 0;
			hide_field($data);
			}
		else if($user->roles[19])
		{

			$data['image'] = 3;
			$data['video'] = 2;
			$data['text'] = 0;
			hide_field($data);
			}
			
		else if($user->roles[27])
		{
			print "You did it!";
			$data['image'] = 5;
			$data['text'] = 20;
			$data['video'] = 1;
			hide_field($data);
			}
		else if($user->roles[26])
		{
			$data['image'] = 3;
			$data['text'] = 10;
			$data['video'] = 0;
			$this->hideField($data);
			}
	    else if($user->roles[25])
		{
			$data['image'] = 5;
		  	$data['text'] = 20;
		  	$data['video'] = 1;
		  	hide_field($data);
			}
		else if($user->roles[23])
		{
			$data['image'] = 3;
		  	$data['text'] = 10;
		  	$data['video'] = 0;
		  	hide_field($data);
			}
		else
		{
			$data['image'] = 1;
			hide_field($data);
			}
	

//print values - 
		$uid = user_load($user->uid);
		$profile_main = profile2_load_by_user($uid, 'main');
		$value = field_view_field('profile2', $profile_main, 'field_my_profession', 'value');
		
		$profession_r = drupal_render($value);
		$profession = explode(' ', $profession_r);
		$comma_separated = implode(",", $profession);
		$final_arr = explode(';', strip_tags($comma_separated));		    
		$final_arr = explode(':', $final_arr[0]);
		$a = str_replace(',',' ', $final_arr[1]);
		$data = array(
					'Copy Writer',
					'Cinematographer',
					'Script Writer',
					'Dialogue Writer',
					'Screen Play Writer',
					'Story Writer',
					'Actor',
					'Model',
					'Anchor',
					'Writer',
					'Singer',
					'Lyrics Writer',
					'Dubbing Artist',
					'Cameraman', 
					'Director',
					'Producer',
					'Film Maker',
					'Music Composer',
					'Dancer',
					'Stand up comedian',
					'Mimicry Artist',
					'Look-a-Like',
					'DJ',
					'RJ',
					'Casting Director',
					'Choreographer',
					'Fashion Designer',
					'Photographer',
					'Makeup Man',
					'Stuntman',
					'Lighting Manager',
					'Action Director',
					'Editor',
					'Art Director',
					'Lighting Technician',
					'Color Correction',
					'Graphic Designer',
					'Hair Stylist',
					'Location Manager',
					'Other Crew',
					'Production Executive',
					'Production Manager',
					'Special Effects',
					'Technician'
					);
		$i = sizeof($data);
		$choosen_profession = array();;
		for($i; $i>=0; $i--)
		{
			if(strpos($a, $data[$i]) !== FALSE)
			{
				$choosen_profession = $data[$i];
			}
		}
	print_r($choosen_profession);
    }//end of funtion

?>