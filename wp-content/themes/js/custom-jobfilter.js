jQuery(document).ready(function($) {
	/* $('.result').on('click',function(){
		$(this).next().simplePopup();
	}); */
	/* $(document).on('click','.modal',function(){
		$(this).next().simplePopup();
	});	 */
	jQuery('.filter-job').on('change', function() {
		var job_location = $(".job_location").val(); 
		var job_designation = $(".job_designation").val(); 
		var job_department = $(".job_department").val(); 
		if(job_location != 0 && job_designation != 0 && job_department != 0){
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_location : job_location,
					job_designation : job_designation,
					job_department : job_department,
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(job_location != 0 && job_designation != 0 && job_department == 0){
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_location : job_location,
					job_designation : job_designation,
					job_department_null : job_department,
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(  job_location != 0 && job_designation == 0 && job_department != 0){
			//alert('job_designation_only');
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_designation_null : job_designation,
					job_location : job_location,
					job_department : job_department,
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(job_location == 0 && job_designation != 0 && job_department != 0 ){
			//alert('both');
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_location_null : job_location,
					job_designation : job_designation,
					job_department : job_department
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(job_location != 0 && job_designation == 0  && job_department == 0 ){
			//alert('both');
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_location_only : job_location
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(job_location == 0 && job_designation != 0 && job_department == 0){	
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_designation_only : job_designation,
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(job_location == 0 && job_designation == 0 && job_department != 0){
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_department_only : job_department
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
		if(job_location == 0 && job_designation == 0 && job_department == 0){
			jQuery.ajax({
				url : ajax_object.ajaxurl,
				type : 'post',
				data : {
					action : 'ajax_action_jobfilter',
					job_location_null : job_location,
					job_designation_null : job_designation,
					job_department_null : job_department
				},
				success : function( response ) {
					$( ".result" ).replaceWith( ''+response+'' );
					return;			
				},
				error : function( response ) {
					return;			
				}
			});
		}
	});
});