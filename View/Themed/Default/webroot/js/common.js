/* ========================================================================
 * Created By CakeReady Team
 * Date : 25 March 2015
 * ========================================================================
 */
var loading = '<div style=" text-align:center;" id="wait"><img alt="" style="width:26px; padding-left:5px;" src="'+baseUrl+'img/graf.gif"></div>';
forgetPasswordForm();
table_toolbar();
addSubscriber();

function forgetPasswordForm()
{
	jQuery('.login-form').show();
	jQuery('.forget-form').hide();
	
	jQuery('#back-btn').click(function(){
		jQuery('.login-form').show();
		jQuery('.forget-form').hide();
	});
	
	jQuery('#forget-password').click(function(){
		jQuery('.login-form').hide();
		jQuery('.forget-form').show();
		forgetPassowrdFormAjax();
	});		
}
function validateEmail(email)
{
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	if(emailReg.test(email)) {
		return true;
	} else {
		return false;
	}
}
function forgetPassowrdFormAjax()
{
	jQuery("#FrgetPassAdmin" ).submit(function( event ) {
		jQuery('.user-msg-login').html(loading);
		event.preventDefault();
		url = baseUrl+'admin/users/forget_password/'; 
		
		var email=	jQuery('.email').val();	
		var error = '';
		if(jQuery.trim(email) == '')
		{
			error	=	'Please fill email.';
		}
		else if(!validateEmail(email))
			{
				error = 'Pleae supply valid email address.';
			}
		
		if(error == '')
		{
		
			jQuery.ajax({
					url: url,
					type:'POST',
					data: jQuery("#FrgetPassAdmin").serialize(),
					dataType:'json',
					success:function(data)
					{
						if(data.Success == '1')
						{
							 jQuery('.user-msg-login').addClass('success-text').html(data.Message);
						}
						else
							{
								 jQuery('.user-msg-login').addClass('error-text').html(data.Message);
							}
					},
				});
		}
		else
			{
				jQuery('.user-msg-login').addClass('error-text').html(error);
			}
		
		setTimeout(function(){
						jQuery('.user-msg-login').removeClass('error-text').removeClass('success-text').html('Enter your e-mail address below to reset your password.');
					}, 5000); 
	});
}

function table_toolbar()
{
	jQuery(".green").click(function(){
		jQuery(this).parents('.table-wrap').find('.form').toggle('slow');
		jQuery(this).parents('.table-wrap').find('.table-responsive').toggle('slow');
		jQuery(this).toggleClass('gray').toggleClass('green');
	});
	
	
	
		
	jQuery('.red').click(function(){
		jQuery(this).parents('.table-wrap').remove();
	});
	
	jQuery('.close').click(function(){
		jQuery(this).parents('.note').remove();
	});
	
}

function ajaxStateList(){
	jQuery('.Country select').change(function(){
		var countryId = jQuery(this).val();
		jQuery.ajax({
			url: baseUrl+"admin/states/ajax_state_list/"+countryId,
			success:function(data) {
				jQuery('#stateDiv').html(data);
				ajaxCityList();
			}
		})
	})
}

function ajaxCityList(){
	jQuery('.State select').change(function(){
		var countryId = jQuery(this).val();
		jQuery.ajax({
			url: baseUrl+"admin/cities/ajax_city_list/"+countryId,
			success:function(data) {
				jQuery('#cityDiv').html(data);
			}
		})
			
	})
}
/** Subscriber add function **/
function addSubscriber(){
	
	
	jQuery("#UserSubscriberForm" ).submit(function( event ) {
		event.preventDefault();
		
		var email=	jQuery('.emailSuc').val();	
		var error = '';
		if(jQuery.trim(email) == '')
		{
			error	=	'Please fill email.';
		}
		else if(!validateEmail(email))
			{
				error = 'Pleae supply valid email address.';
			}

		 
		 var url = baseUrl+'users/subscriber/'; // the script where you handle the form input.
		
		if(error == '')
		{
		
			jQuery.ajax({
			   type: "POST",
			   url: url,
			   data: jQuery("#UserSubscriberForm").serialize(), // serializes the form's elements.
			   success: function(data)
			   {
				   if(data == 1)
				   {
						message = 'You have successfully subscribed.';
						jQuery('#UserEmail').val('');
						jQuery('.subscribe-message').addClass('success-text').html(message);						
				   }
				   else if(data == 3)
				   {
						message = 'There is some problem. Please try again';	   
						jQuery('.subscribe-message').addClass('error-text').html(message);
					}
					else if(data == 2)
				   {
						message = 'You have already subscribed. Thanks';	   
						jQuery('#UserEmail').val('');
						jQuery('.subscribe-message').addClass('error-text').html(message);
					}
					
					
					
				  
			   }
			 });
		 
		 }
		else
			{
				jQuery('.subscribe-message').addClass('error-text').html(error);
			}
			
		 setTimeout(function(){
						jQuery('.subscribe-message').removeClass('error-text').removeClass('success-text').empty();
					}, 5000); 
	});
	
	
}	

	


	//jQuery('#title').slug();
	ajaxStateList();
	ajaxCityList();
	
	jQuery('#NewsletterStatus').change(function(){ 
  	   var p = jQuery(this).val();
	   if( p == 1)
	   {     
			jQuery('#sendnewsletter').removeClass('disabled');
	   }
	   else
	   {   	
			jQuery('#sendnewsletter').addClass('disabled');
	   }
   });
   
   jQuery('#menuicon').on('click', function(){
		var opened = parseInt(jQuery('#menu').css('left'),10) == 0;
		
		//alert(opened);
		jQuery('#menuicon').animate({'left':(opened ? 0 : -10 )}, 'slow');
		jQuery('#menu').animate({'left':(opened ? -250 : 0 )}, 'slow');
		
		
		
		
		if(opened)
		jQuery('.overlay').fadeOut();
		else
		jQuery('.overlay').css('height',jQuery('body').height()).fadeIn();
	});
   
    jQuery('.overlay').click(function(){
		jQuery('#menu').animate({'left':-240}, 'slow');
		jQuery(this).fadeOut();
	})
   
   /*
   
   
   jQuery('#menu').click(function(){
	 
	   jQuery('#menu').toggle(  
	   		function()
			{
				$('#menu1').animate({left: "-240px"}, "slow");
			},
			function()
			{
				$('#menu1').animate({left: "0px"}, "slow");
			}
		);
	 //  jQuery('#menu1').addClass('SideToggle');
	});
	*/


