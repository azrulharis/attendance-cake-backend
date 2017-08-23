/* Created By CakeReady on 17 June 2015 */

/* Create New Content */
	createNewContent();
/* Create New Content */

/* Allow Block */
	allowBlock();
/* Allow Block */

/* Screen Option */
	setScreenOption();
/* Screen Option */

/* permalink on edit */
	permalink();
/* permalink on edit */

jQuery('#ContentTitle').slug();





function createNewContent()
{
	
	jQuery('#PublishDateTime').hide();
	jQuery('#PublishStatusSelect').hide();
	jQuery('#PublishVisibilityOption').hide();
	removeField();
	
	
	jQuery('#PublishStatusEdit').click(function(){
			jQuery('#PublishStatusSelect').show('slow');
			jQuery('#PublishStatusEdit').hide('slow');
			publishStatus();
		});
	
	
	jQuery('#Status').change(function(){
			showStatus();
		});
	
	jQuery('#PublishVisibilityEdit').click(function(){
			jQuery('#PublishVisibilityOption').show('slow');
			jQuery('#PublishVisibilityEdit').hide('slow');
			publishVisibility();
		});
	
	jQuery('#PublishedDateTimeEdit').click(function(){
			jQuery('#PublishDateTime').show('slow');
			jQuery('#PublishedDateTimeEdit').hide('slow');
			publishedDateTime();
		});
	
	
	jQuery('.PublicPasswordRadioButtonClass').click(function(){
				
				var result = jQuery(this).val();
	
				if(result == 'Pu')
				{ jQuery('#ShowVisibility').text('Public'); }
			else if(result == 'PP')
				{ jQuery('#ShowVisibility').text('Password Protected'); }
				else if(result == 'Pr')
						{ jQuery('#ShowVisibility').text('Private'); }
				
				if(result == 'PP') { 
						jQuery('#PublicPasswordTextbox').show('slow');
						jQuery( "#ContentPassword" ).focus(); }
				else
					{ jQuery('#PublicPasswordTextbox').hide('slow'); }
					
				if(result != 'PP') 
				{ 
						jQuery('#PublicPasswordTextbox').val(" ");
				}
				
		});
	
	
		/* Add Custom Field  */
			addCustomField();
		/* Add Custom Field  */
		
		
		

}

function addCustomField()
{
	jQuery('#AddCustomField').click(function(){
											
			var current 		 = jQuery('#CustomFieldContainerRowCount').val();
			current 			 = parseInt(current, 10) ;
			var netElement		 = current + 1;
			var index			 = netElement;
			var ContentMetaName  = jQuery('#ContentMetaName').val();
			var ContentMetaValue = jQuery('#ContentMetaValue').val();
			
			if((jQuery.trim(ContentMetaName) === "") && jQuery.trim(ContentMetaValue === ""))
				{
					alert('Please fill these fields.');	
				}
				else
					{
					if(current == 0)
					{
						var customFieldContainer = '<div class="portlet box green"><div class="portlet-title"><div class="row"><div class="col-md-6 alignbest">Name</div><div class="col-md-6 alignbest">Value</div></div></div><div class="portlet-body form"><div class="form-body" id="customFieldContainer"></div></div></div>';
						
						jQuery("#AppendContainer").append(customFieldContainer);
					}
						
			var result			 = '<div class="Newfild xrow"><div class="row"><div class="col-md-12"><div class="col-md-6"><div class="form-group"><div class="input text"><input type="text" placeholder="Name" id="ContentMetaName_'+netElement+'" class="form-control" name="data[ContentMeta]['+index+'][title]" value="'+ContentMetaName+'"><button  class="btn grey m5 CustomFieldRemoveButton" rel=""   type="button">Delete</button></div></div></div><div class="col-md-6"><div class="form-group"><div class="input textarea"><textarea id="ContentMetaValue_'+netElement+'" class="form-control" cols="3" rows="2" name="data[ContentMeta]['+index+'][value]">'+ContentMetaValue+'</textarea></div></div></div><div class="clearfix"></div></div></div></div>';
			
			jQuery("#customFieldContainer").css("background-color","green").fadeIn('slow',function(){
				jQuery("#customFieldContainer").append(result);
				jQuery("#customFieldContainer").delay( 800 ).fadeIn( 400 ).removeAttr('style');
			});
			jQuery('#ContentMetaName').val(" ");
			jQuery('#ContentMetaValue').val(" ");
			 current = current + 1 ;
			jQuery('#CustomFieldContainerRowCount').val(current);
			
				}
				
			
			removeField();
		});
}

function removeField()
{	

	jQuery('.CustomFieldRemoveButton').click(function(){
		
			var removeId =  jQuery(this).attr('rel');
			
		
			if(removeId != "")
			{
					url= BASE_URL+'admin/content/contents/ajax_delete/'+removeId;
					$.ajax({
						url: url,
						type: 'POST',
						dataType: 'json',
						success:function(data)
						{
							jQuery('.swaprow_'+removeId).css("background-color","red").fadeOut('slow',function(){
								jQuery(this).remove();																			   							});
							
						}
					});
				
			
			}
			else
			{
				jQuery(this).closest('.xrow').css("background-color","red").fadeOut('slow',function(){
																									   
						jQuery(this).remove();																			   
																									   
				});
			}
	
			
			var rowCount = jQuery('#AppendContainer .row').size();
			if(rowCount == 0)
			{
				jQuery('#customFieldContainer').hide('slow').remove();	
			}
	});	
}

function permalink()
{
	jQuery('.editPermalinkContainer').hide();
	jQuery('.editPermalink').click(function(){
			var slug = jQuery('.permalinkSlugSpan').text();
			jQuery('.permalinkSlugSpan').hide('slow');
			jQuery('.editPermalink').hide('slow');
			jQuery('#ContentEditSlug').val(slug);
			jQuery('.editPermalinkContainer').show('slow');
	});
	
	jQuery('.editPermalinkOkButton').click(function(){
													
			var slug = jQuery('#ContentEditSlug').val();
			jQuery('.permalinkSlugSpan').text(slug);
			jQuery('#slug').val(slug);
			jQuery('.editPermalinkContainer').hide('slow');
			jQuery('.permalinkSlugSpan').show('slow');
			jQuery('.editPermalink').show('slow');
	});
	
	jQuery('.editPermalinkCancelButton').click(function(){
			jQuery('.editPermalinkContainer').hide('slow');
			jQuery('.permalinkSlugSpan').show('slow');
			jQuery('.editPermalink').show('slow');
	});
}


function publishStatus()
{
	jQuery('#PublishStatusOk').click(function(){
			jQuery('#PublishStatusSelect').hide('slow');
			jQuery('#PublishStatusEdit').show('slow');
	});
	
	jQuery('#PublishStatusCancel').click(function(){
			jQuery('#PublishStatusSelect').hide('slow');
			jQuery('#PublishStatusEdit').show('slow');
		});	
}
function showStatus()
{
	
	var statusValue = jQuery('#Status').val();
	if(statusValue == 2)
		{
			jQuery('#ShowStatus').text('Draft');
		}
	else if(statusValue == 1)
		{
			jQuery('#ShowStatus').text('Published');
		}
	else if(statusValue == 4)
		{
			jQuery('#ShowStatus').text('Private');
		}
	else if(statusValue == 5)
		{
			jQuery('#ShowStatus').text('Pending');
		}
	
}
function publishVisibility()
{
	jQuery('#PublishVisibilityOk').click(function(){
			jQuery('#PublishVisibilityOption').hide('slow');
			jQuery('#PublishVisibilityEdit').show('slow');
		});
	
	jQuery('#PublishVisibilityCancel').click(function(){
			jQuery('#PublishVisibilityOption').hide('slow');
			jQuery('#PublishVisibilityEdit').show('slow');
		});	
}


function publishedDateTime()
{
	jQuery('#PublishPublishedonOk').click(function(){
			jQuery('#PublishDateTime').hide('slow');
			jQuery('#PublishedDateTimeEdit').show('slow');
			showDateTime();
		});
	
	jQuery('#PublishPublishedonCancel').click(function(){
			jQuery('#PublishDateTime').hide('slow');
			jQuery('#PublishedDateTimeEdit').show('slow');
		});
	

}

function showDateTime()
{
	var dt 	 = new Date();
	var date = dt.getDate() + "-" + dt.getMonth() + "-" + dt.getFullYear();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	var dateTime = date+" "+time;
	
	var PHPDateTime = jQuery('#PublishDateTimeTextbox').val();
	
	if(PHPDateTime != dateTime)
	{ 
		jQuery('#showDateTime').text('on : '+PHPDateTime); 
	}
}


function allowBlock()
{
	jQuery('.allowField').click(function(){
			
			//var isCheck = jQuery(this).val();
			var result  = jQuery(this).attr('rel');
			
			//var p = getCookie('screenOption'+result);
			
			if (jQuery(this).prop('checked')==true)
			{
					jQuery('.X'+result).show('slow');
					var isCheck = 1;
			}
			else
				{
					var isCheck = 0;
					jQuery('.X'+result).hide('slow');
				}
			
			document.cookie = "isCheck_"+result+"="+isCheck+"; path=/";
		});
}



function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}

function getScreenOptionValue(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(',');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}

function setScreenOption()
{
	var screenOption = [];
	var obj = JSON.parse(screenOptionArray);
	jQuery.each( obj, function( outerKey, outerValue ) {
			jQuery.each( outerValue, function( innerKey, innerValue ) {
				
				var setOptionValue = getCookie('isCheck_'+outerKey);
				setOptionValue = parseInt(setOptionValue, 10) ;
				if(setOptionValue == 1)
					{
						jQuery('.X'+outerKey).show('slow');
						jQuery('.Allow'+outerKey).prop( "checked", true );
					}
					else if(setOptionValue == 0)
						{
							jQuery('.X'+outerKey).hide('slow');
							jQuery('.Allow'+outerKey).prop( "checked", false );
						}
				
			});
	});
}

function numProps(obj) 
{
	  var c = 0;
	  for (var key in obj) 
	  {
		if (obj.hasOwnProperty(key)) ++c;
		break;
		return key;
	  }
}

