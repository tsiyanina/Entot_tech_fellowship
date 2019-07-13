jQuery(document).ready(function($){

  /* For WordPress 5 below version*/  
	$( '#page_template' ).on('change',function() {
		var pageTemplate = $('#page_template').val();

		  if(pageTemplate == 'template-team.php'){
		  	$('#fotography_team_categories_settings').show('swing');
		  }
		  else{
		  	$('#fotography_team_categories_settings').hide('swing');
		  }

		  if(pageTemplate == 'template-testimonial.php'){		  	
		  	$('#fotography_testimonial_categories_settings').show('swing');
		  }
		  else{
		  	$('#fotography_testimonial_categories_settings').hide('swing');
		  }

	    })

 	 /* For WordPress 5 above version*/  
	  $( 'body' ).on('change','#inspector-select-control-1',function() {
		var pageTemplate = $(this).val();

		  if(pageTemplate == 'template-team.php'){
		  	$('#fotography_team_categories_settings').show('swing');
		  }
		  else{
		  	$('#fotography_team_categories_settings').hide('swing');
		  }

		  if(pageTemplate == 'template-testimonial.php'){		  	
		  	$('#fotography_testimonial_categories_settings').show('swing');
		  }
		  else{
		  	$('#fotography_testimonial_categories_settings').hide('swing');
		  }

	    }).change();
		var pageTemplate = $('#fotography_team_categories_settings select').attr('data-ptemplate');
			if(pageTemplate == 'template-team.php') {
   			$('#fotography_team_categories_settings').show('swing');
	   		}
	   		else{
   				$('#fotography_team_categories_settings').hide();	
		}
        var pageTemplate = $('#fotography_testimonial_categories_settings select').attr('data-ptemplate');
			if(pageTemplate == 'template-testimonial.php') {
   			$('#fotography_testimonial_categories_settings').show('swing');
	   		}
	   		else{
   				$('#fotography_testimonial_categories_settings').hide();	
		}

      /* For WordPress 5 below version*/  

	    $('#post-formats-select').on('click',function() {
	   		var post_type = $('input[name="post_format"]:checked').val();
			if(post_type == 'image') {
	   			$('#fotography_gallery_single_page').show('swing');
	   		}
	   		else {
	   			$('#fotography_gallery_single_page').hide('swing');	
	   		}   		
	   	});
 	 /* For WordPress 5 above version*/  

	   	$('body').on('change', '#post-format-selector-0',function() {
	   		var post_type = $(this).val();
			if(post_type == 'image') {
	   			$('#fotography_gallery_single_page').show('swing');
	   		}
	   		else {
	   			$('#fotography_gallery_single_page').hide('swing');	
	   		}   		
	   	});

	   	var post_type = $('input[name="post_format"]:checked').val();
			if(post_type == 'image') {
	   			$('#fotography_gallery_single_page').show('swing');
	   		}
	   		else{
	   			$('#fotography_gallery_single_page').hide();	
	   		}
   		var gpost_type = $('#fotography_gallery_single_page .form-table').attr('data-pformat');
			if(gpost_type == 'image') {
   			$('#fotography_gallery_single_page').show('swing');
	   		}
	   		else{
   				$('#fotography_gallery_single_page').hide();	
		}
	  
	$('#customize-control-fotography_blog_page_archive_section').on('change',function(){
       var radioOption = $(this).find('input[type="radio"]:checked').val();
       if(radioOption == 'gridview'){
           $('#customize-control-fotography_blog_grid_archive_section').show('swing');
       } else {
           $('#customize-control-fotography_blog_grid_archive_section').hide('swing');
       }
   }).change();   
});