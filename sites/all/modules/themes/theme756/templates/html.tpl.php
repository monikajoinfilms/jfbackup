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

  <?php print $head; ?>
  
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
  	<!--This code written by Yogesh Kushwaha 08 Aug 2013. Below both lines are additional lines for jwplayer 
	<script type="text/javascript" src="<?php echo base_path().'/jwplayer/jwplayer.js'; ?>" ></script>
	<script type="text/javascript">jwplayer.key="86oU2XeUivgcS/pkIyuQc62OqcZD2IF2ivVeKQ==";</script>-->
    <!--Code ends -->

  <?php print $scripts; ?>

       <script>
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

</script><style type="text/css" media="screen">
    
    .slide-out-div {
       padding: 20px;
        width: 250px;
        background: #f2f2f2;
        border: #29216d 2px solid;
    }
    


#edit-field-my-profession-tid
{

width:240px}</style>

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