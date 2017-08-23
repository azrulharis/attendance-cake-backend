 function check_uncheck()
 {
		jQuery('#checkall').click(function(e){
			jQuery('.subscribe span').addClass('checked');	
			jQuery('input[type=checkbox]').prop( "checked", true );
		});
		jQuery('#uncheckall').click(function(){
			jQuery('.subscribe span').removeClass('checked');
			jQuery('input[type=checkbox]').prop( "checked", false );		
		});
  } 

 function fetch_newsletters(cat_id)
 {
		jQuery('#NewsletterNewsletterId').empty();	
		url=baseUrl+'admin/newsletter/newsletters/getnewsletters/'+cat_id;
				jQuery.ajax({
					type: 'POST',
					url: url,
					success : function(data)
					{
						jQuery("#NewsletterDiv").empty().append(data);
					},
					error : function(data)
					{
					}
				});
  } 
