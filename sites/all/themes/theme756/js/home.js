// JavaScript Document
$(document).ready(function(){

	$(".trigger").click(function(){

		$(".panel").toggle("fast");

		$(this).toggleClass("active");

		return false;

	});

});
/////////////////// analytics code
 
///////////////////////////
function paySmsAlert(uid)
{
	  
		var pack;
		var name;
		var email;
		var number;
	  $("#smsAlertButton").click(function(){
		
		pack = $("#edit-submitted-choose-pack").val();
		name = $("#edit-submitted-name").val();
		email = $("#edit-submitted-email").val();
		moNumber = $("#edit-submitted-contact-numbers").val();
		
		if(name=='')
		{
			alert('Please Enter Your Full Name');
			return false;
			}
		if(email=='')
		{
			alert('Please Enter Email');
			return false;
			}
		if(moNumber=='')
		{
			alert('Please Enter valid mobile number');
			return false;
			}
		
		if(pack!='')
		{
			window.location.href =('http://www.joinfilms.com/core-file/index.php?userId='+uid+'&amount='+pack+'&name='+name+'&email='+email+'&mobile='+moNumber);
			}
		else
		{
			alert('Please choose one package');
			window.location.href =('http://www.joinfilms.com/login/register');
			}
	  });
	 
	}
	$(document).ready(function(){
  			$(".login").click(function(){
   			window.location.href = 'http://www.joinfilms.com/login/register?destination=';
  			});
		});