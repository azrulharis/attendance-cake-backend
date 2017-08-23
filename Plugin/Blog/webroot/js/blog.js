/* Created By CakeReady on 19 June 2015 */
var current 		 = jQuery('#customFieldContainer .Newfild').size();
current 			 = parseInt(current, 10);
index		 = current + 2;

/* Create New Blog */
	createNewBlog();
/* Create New Blog */

/* Allow Block */
	allowBlock();
/* Allow Block */

/* Screen Option */
	setScreenOption();
/* Screen Option */

/* permalink on edit */
	permalink();
/* permalink on edit */

categoryTreeSelected(blogCategoryIds);
addNewBlogCategory();

jQuery('#BlogTitle').slug();





function createNewBlog()
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
						jQuery( "#BlogPassword" ).focus(); }
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
			 index			 = index + 1;
			var BlogMetaName  = jQuery('#BlogMetaName').val();
			var BlogMetaValue = jQuery('#BlogMetaValue').val();
			if((jQuery.trim(BlogMetaName) === "") && jQuery.trim(BlogMetaValue === ""))
				{
					alert('Please fill these fields.');	
				}
				else
					{
					if(current == 0)
					{
					var customFieldContainer = '<div class="form"><div class="form-head"><div class="form-head-lt col-md-6" style="text-align:center;"> Title</div><div class="form-head-lt col-md-6" style="text-align:center;"> Value</div><div style="clear:both"></div></div><div class="form-art" id="customFieldContainer"></div></div></div>';
					jQuery("#AppendContainer").append(customFieldContainer);
					current = current + 1 ;
					}
						
			
			a	=	'<div class="Newfild xrow"><div class="row"><div class="col-md-6"><div class="form-group"><label class="control-label">Title</label><div class="input text">';
			a1	=	'<input type="hidden"  id="BlogMetaId_'+index+'" class="form-control" name="data[BlogMeta]['+index+'][id]" value="">';
			b	=	'<input type="text" placeholder="Name" id="BlogMetaName_'+index+'" class="form-control" name="data[BlogMeta]['+index+'][title]" value="'+BlogMetaName+'">';
			c	=	'<button  class="btn default CustomFieldRemoveButton" rel=""   type="button">Delete</button>';
			d	=	'</div></div></div>';
			e	=	'<div class="col-md-6"><div class="form-group"><label class="control-label">Value</label><div class="input textarea">';
			f	=	'<textarea id="BlogMetaValue_'+index+'" class="form-control" cols="3" rows="2" name="data[BlogMeta]['+index+'][value]">'+BlogMetaValue+'</textarea>';
			j	=	'</div></div></div><div class="clearfix"></div></div></div>';
			
			var result			 = a+a1+b+c+d+e+f+j;
			jQuery("#customFieldContainer").css("background-color","green").fadeIn('slow',function(){
				jQuery("#customFieldContainer").append(result);
				jQuery("#customFieldContainer").delay( 800 ).fadeIn( 400 ).removeAttr('style');
			});
			jQuery('#BlogMetaName').val(" ");
			jQuery('#BlogMetaValue').val(" ");
			// current = current + 1 ;
			//jQuery('#CustomFieldContainerRowCount').val(current);
			
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
					url= baseUrl+'admin/blog/blogs/ajax_delete/'+removeId;
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
			jQuery('#BlogEditSlug').val(slug);
			jQuery('.editPermalinkContainer').show('slow');
	});
	
	jQuery('.editPermalinkOkButton').click(function(){
													
			var slug = jQuery('#BlogEditSlug').val();
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
						else
							{
								jQuery('.X'+outerKey).hide('slow');
								jQuery('.Allow'+outerKey).prop( "checked", false );
							}
					
				});
		});
	
	

}

function categoryTreeSelected(blogCategoryIds)
{
	
		if(jQuery.trim(blogCategoryIds) != '')
		{
			var obj = JSON.parse(blogCategoryIds);
			
			jQuery.each( obj, function( outerKey, outerValue ) {
					jQuery('.blog_categories').each(function() {
						
						if(jQuery(this).val() == outerValue)
							{
								jQuery(this).prop( "checked", true );
							}
						
					});
			});
	
		}
	}
	
function addNewBlogCategory()
{	
	jQuery('.newCategoryDiv').hide();
	jQuery('.addNewBlogCategorylink').click(function(){
			jQuery('.newCategoryDiv').show('slow');							 
	});
	jQuery('.addNewBlogCategoryBtn').click(function(){
			var newCategory =  jQuery('.newCategoryField').val();
			if(newCategory != "")
			{
					url= baseUrl+'admin/blog/blog_categories/ajax_add_category/'+newCategory;
					$.ajax({
						url: url,
						type: 'POST',
						//dataType: 'json',
						success:function(data)
						{
							jQuery('.appendCategory  li:first').prepend(data);
							
							jQuery('.appendCategory').css("background-color","yellow");
								setTimeout(function(){
									jQuery('.appendCategory').removeAttr('style');
									
								}, 500);
							
						}
					});
				
			
			}
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
	

(function() {
    var pre = document.getElementsByTagName('pre'),
        pl = pre.length;
    for (var i = 0; i < pl; i++) {
        pre[i].innerHTML = '<span class="line-number"></span>' + pre[i].innerHTML + '<span class="cl"></span>';
        var num = pre[i].innerHTML.split(/\n/).length;
        for (var j = 0; j < num; j++) {
            var line_num = pre[i].getElementsByTagName('span')[0];
            line_num.innerHTML += '<span>' + (j + 1) + '</span>';
        }
    }
})();

