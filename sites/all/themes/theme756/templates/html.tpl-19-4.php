<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
$html_attributes = "lang=\"{$language->language}\" dir=\"{$language->dir}\" {$rdf->version}{$rdf->namespaces}";
?>
<?php print $doctype; ?>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">

<!--[if IE 8 ]><html <?php print $html_attributes; ?> class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html <?php print $html_attributes; ?> class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php print $html_attributes; ?> class="no-js"><!--<![endif]-->
<head<?php print $rdf->profile; ?>>
  <meta name="google-site-verification" content="1tI2QYJg8UTj4QICUYOq3j7OF1ra1s2czCal3hHEf8I" />
  <?php 
	$cssforgender = current_path();
	$ar = arg(0);

	 if($cssforgender == "node"){ ?>
  <meta name="p:domain_verify" content="cfcbeac3ba3ab55ee2d53398789256ff"/>
  <?php }  print $head; ?>
  
  <!--[if lte IE 7]> <div style=' text-align:center; clear: both; padding:0 0 0 15px; position: relative;'> <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div> <![endif]-->
  
  <title><?php print $head_title; ?></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <!--[if LT IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  <!--[if lte IE 8]>
	<style type="text/css">
    	.poll .bar, .poll .bar .foreground { behavior:url(<?php echo base_path().path_to_theme() ?>/js/PIE.php); zoom:1}
	</style>
<![endif]-->

  <?php print $styles; ?>
  <link type="text/css" rel="stylesheet" href="http://www.joinfilms.com/sites/all/themes/theme756/css/style-2.css" media="all" />

  <?php print $scripts; ?>

       
<script type="text/javascript">
$(document).ready(function(){
	$(".trigger").click(function(){
		$(".panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});
</script><script language="javascript">
//document.onmousedown=disableclick;
//status="Right Click Disabled";
//Function disableclick(event)
//{
  //if(event.button==2)
   //{
     //alert(status);
    // return false;    
  // }
//}
</script>
<!-- Google Analytics Content Experiment code -->
<script>function utmx_section(){}function utmx(){}(function(){var
k='80503395-0',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
<!-- End of Google Analytics Content Experiment code -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new
Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46778205-1', 'joinfilms.com');
  ga('send', 'pageview');

</script>
<style type="text/css" media="screen">

 . views-field-field-height .views-label {float: left;
    width: 150px;}
 . views-field-field-height .views-label-field-height {
	 font-weight:bold;
} 

.slide-out-div {
    	padding: 20px;
        width: 250px;
        background: #f2f2f2;
        border: #29216d 2px solid;
    	}
    .imgleft{


float:left;
width:120px;
padding-right:25px;
}.blogdiv{
border-bottom:solid 1px #999999;  margin-bottom: 26px;
    padding-bottom: 30px;padding-top:10px;padding-left:10px;padding-right:10px;
	background:#FFFFFF}
.clear{clear:both}
.imgright{float:left;width:480px;margin-left:15px}
.imgright h2 {

margin-top:-5px}
.imgright h2 a {
text-decoration:none;color:#000;

}

.imgright h2 a:hover{
text-decoration:none;color:#000;

}

	textarea {
		height:200px
		}    .watch_photo_cont  {
        float: left;
        list-style-type: none;
        margin: 0;
        padding: 0 5px;
    }
    .watch_photo_cont  {
       float: left;
    height: 160px;
    margin-bottom: 35px;
    margin-left: 10px;
    margin-right: 5px;
    padding-left: 2px;
    padding-right: 2px;
    position: relative;
    width: 140px;
}
    
    .watch_blkstrip {
        background-image: url("../images/trans_blk.png");
        background-repeat: repeat;
        color: #EBEBEB;
        font-family: Arial,Helvetica,sans-serif;
        font-size: 10px;
        left: 0px;
        margin: 0;
        padding: 1px;
        position: absolute;
        top: 101px;
        width: 124px;
    }
    .watch_blkstrip span {
        float: right;
        margin-right: 5px;
    }
    .watch_cap {
        float: left;
        font-family: Arial,Helvetica,sans-serif;
        font-size: 12px;
        line-height: 15px;
        margin: 3px 0;width: 120px;
    }
    .imgbrd_nostack {
        border: 1px solid #CCCCCC;
        padding: 5px;
    }
.photo a img {  border: 1px solid #CCCCCC;
    padding: 5px;}

.deep-paal-block{
    border:6px solid #dadada;
    float:left;
    width:32%;
    height:94px;
    background-color:#ffffff;
    }
    
.block-text{
    color:#676767;
    font-size:12px;
    float:left;
    text-transform:uppercase;
    font-weight:bold;
    font-family:"Arial Black", Gadget, sans-serif;
    //padding-top:10px;
    width:180px;
    vertical-align:middle;
    }
    
.block-image{
    float:left;
    width:94px;
    margin-right:14px;
    overflow:hidden;}
    
.deep-paal-block .register-link{
    padding:5px;
    background-color:#b6dd20;
    padding:5px;
    width:115px;
    margin:33px 0 0 35%;
    }

.deep-paal-block .register-link a{
    text-decoration:none;
    color:#ffffff;
    text-align:center;
    font-size:16px;
    font-weight:bold;
    width:auto;}
#rightBorder{
    border-right:2.5px;}
#d-container{margin-left:15px;}
</style>


	<?php
		/* 
			Author: Yogesh Kushwaha
			Title : Hiding title of node.
			Date  : 3-4-2014 
		*/
		switch(arg(0))
		{
			case 'news':
				?>
				<style>h1#page-title{display:none;}</style>
            	<?php
				break;
			case 'reality-show':
				?>
				<style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'audition-bank':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'location-bank':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'showcase':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'celebrity-speaks':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'contest-winner':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'contests':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			case 'true-facts':
				?>
                <style>h1#page-title{display:none;}</style>
                <?php
				break;
			}   
             
    ?>
	<!-- Code Ends here -->


<?php 
	/* print "1 -".arg(0);
	   print "<br>2 -".arg(1);
	   print "<br>3 -".arg(2);
	   print "<br>4 -".arg(3);
	   for gallery navigation image center position*/
  if(arg(0) == 'gallery'){
?>
		<style>
			.flex-direction-nav li a{top:25% !important;}
		</style>
     <?php 
  }
		if($cssforgender == "audition-bank"){?>
        <style>
	 #edit-field-audition-category-value-1 {
  width:150px;height:25px
}
	 #edit-city {
  width:100px;height:21px
}

</style>
     
  <?php } ?>
	 <?php if($cssforgender == "location-bank"){?>
     <script type="text/javascript">
		$(window).load(function() {
			$('.flexslider').flexslider({
              slideshowSpeed: 100,
        animationSpeed: 100});
		});
	</script>
<?php	 }
	 if($ar == "gallery"){?>
    <style>
		.flexslider .slides img {
			display: block;
			max-height: 500px;
			max-width: 100%;
			}
    </style>
	 
	 <?php }
	if ($user->roles[2] == 'authenticated user' && $user->roles[3] != 'administrator') {
	    // some stuffs here.
		?>
		<script type="text/javascript">
			$(document).ready(function(e) {
				$('li:contains(Track)').hide();
				$('li:contains(Nodes)').hide();
				$('li:contains(HybridAuth)').hide();
				$('li:contains(Contact)').hide();
			});
        </script>
        <?php
		}
	if($user->roles[1] == 'anonymous user')
	  {
		?>
		<script type="text/javascript">
			$(document).ready(function(e) {
				$('li:contains(Track)').hide();
				$('li:contains(Nodes)').hide();
				$('li:contains(HybridAuth)').hide();
				$('li:contains(Contact)').hide();
				$('li:contains(View)').hide();
			});
        </script>
        <?php
		}
		 
	?>
 
 <?php
	if( $cssforgender == "user/register"){?>
		<style>
			.form-submit{
				width:200px;
				}
		</style>
<?php
		}
	if($cssforgender == "talent-bank"){
		?><script>
  $( document ).ready(function() {$( "#edit-field-my-profession-tid" ).change(function() {
var profession = $( "#edit-field-my-profession-tid" ).val();

if(profession ==  88)
{
$('#edit-field-body-type-value-wrapper').show();
$('#edit-field-film-industry-tid-wrapper').show();
$('#edit-field-film-industry-tid-wrapper').show();
$('#edit-field-hair-color-value-wrapper').show();
$('#edit-field-skin-color-value-wrapper').show()
$('#edit-field-trained-value-wrapper').show()
$('#edit-field-age-value-wrapper').show()
$('#edit-field-2gender-value-wrapper').show()
$('#edit-field-medium-value-wrapper').show()
$('#edit-field-age-value-1-wrapper').show()


}else{

$('#edit-field-body-type-value-wrapper').hide();
$('#edit-field-film-industry-tid-wrapper').hide();
$('#edit-field-film-industry-tid-wrapper').hide();
$('#edit-field-hair-color-value-wrapper').hide();
$('#edit-field-skin-color-value-wrapper').hide()
$('#edit-field-trained-value-wrapper').hide()
$('#edit-field-age-value-wrapper').hide()
$('#edit-field-2gender-value-wrapper').hide()
$('#edit-field-medium-value-wrapper').hide()
$('#edit-field-age-value-1-wrapper').hide()

}
});});
  
  
  
  </script>
		<style>
#edit-field-body-type-value-wrapper{display:none;}
#edit-field-film-industry-tid-wrapper{display:none;}
#edit-field-film-industry-tid-wrapper{display:none;}
#edit-field-hair-color-value-wrapper{display:none;}
#edit-field-skin-color-value-wrapper{display:none;}
#edit-field-trained-value-wrapper{display:none;}
#edit-field-age-value-wrapper{display:none;}
#edit-field-2gender-value-wrapper{display:none;}
#edit-field-medium-value-wrapper{display:none;}
#edit-field-age-value-1-wrapper{display:none;}
		.form-select{width:150px}
		.form-text{width:150px}
		#edit-field-2gender-value-wrapper{display:none;width:130px;}
		</style>
	<?php } ?>
    
	<?php 
	if($cssforgender == "node/145178")
	{
		?>
			<style>
				h1{display:none;}
				#edit-name--2, #edit-pass,#edit-field-first-name-und-0-value,
				#edit-field-last-name-und-0-value, #edit-mail {width:90%;}
				#user-login-form div .item-list ul li.first{display:none;}
				#user-login-form{ height:390px;}
				fieldset.captcha legend{display:none !important;}
				fieldset.captcha{width:85% !important;}
				fieldset.captcha div.description{display:none;}
				div.description{ display:none;}
				.hybridauth-widget{margin-left:355px !important;}
				.hybridauth-widget-wrapper h3{margin-left:415px; padding-top:5px; color:#000;}
				.pane-block-101{ height:425px; padding:5px 30px 10px 30px;}
				.panel-col-top{border-bottom:1px solid #dadada; margin-bottom:20px !important;}
				#header{background:none;}
				.pane-hybridauth-hybridauth h2{display:none;}
				.pane-user-login{padding:5px 30px 10px 30px;}
				.panel-pane{
					border-radius:3px;
					-moz-border-radius:3px;
					-webkit-border-radius:3px;
					background-color: #FFF;
					}
				h2.pane-title{color:#000;}
				
			</style>
		<?php
		}
	global $user;
	
	if($user && $user->uid != 0)
	{
		?>
        <style>
			#block-system-user-menu .menu li.login{ display:none;}
		</style>
        <?php
		}
	?>
</head>
<body id="body"  class="<?php print $classes; ?>" <?php print $attributes;?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
        <div class="panel">
<section class="block block-webform contextual-links-region block-odd" id="block-webform-client-block-142581">
    
  <div class="content">
    <form accept-charset="UTF-8" id="webform-client-form-142581" method="post" action="/node/142581" enctype="multipart/form-data" class="webform-client-form"><div><div id="webform-component-name" class="form-item webform-component webform-component-textfield">
  <label for="edit-submitted-name">Name <span title="This field is required." class="form-required">*</span></label>
 <input type="text" class="form-text required" maxlength="128" size="60" value="" name="submitted[name]" id="edit-submitted-name">
</div>
<div id="webform-component-email" class="form-item webform-component webform-component-email">
  <label for="edit-submitted-email">Email <span title="This field is required." class="form-required">*</span></label>
 <input type="email" maxlength="128" size="22" name="submitted[email]" id="edit-submitted-email" class="email form-text form-email required">
</div>
<div id="webform-component-contact-numbers" class="form-item webform-component webform-component-textfield">
  <label for="edit-submitted-contact-numbers">Contact Numbers </label>
 <input type="text" class="form-text" maxlength="128" size="60" value="" name="submitted[contact_numbers]" id="edit-submitted-contact-numbers">
</div>
<div id="webform-component-message" class="form-item webform-component webform-component-textarea">
  <label for="edit-submitted-message">Message </label>
 <div class="form-textarea-wrapper resizable textarea-processed resizable-textarea"><textarea class="form-textarea" rows="5" cols="70" name="submitted[message]" id="edit-submitted-message"></textarea><div class="grippie"></div></div>
</div>
<input type="hidden" value="" name="details[sid]">
<input type="hidden" value="1" name="details[page_num]">
<input type="hidden" value="1" name="details[page_count]">
<input type="hidden" value="0" name="details[finished]">
<input type="hidden" value="form-02OLt2ExOPI1guH_Y9KmuQvtWircLKASCZMCqesAbME" name="form_build_id">
<input type="hidden" value="webform_client_form_142581" name="form_id">
<div id="edit-actions--2" class="form-actions form-wrapper"><input type="submit" class="form-submit" value="Submit" name="op" id="edit-submit--2"></div></div></form>  </div><!-- /.content -->

</section>
</div>
<a class="trigger" href="#">FeedBack</a>
</body>
</html>