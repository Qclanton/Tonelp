var $j = jQuery.noConflict();

function check(elements) { 
	var result = {
		'passed': true,
		'error_fields': [],
	}	
	


	var length = elements.length;
	var element = null;
	
	for (var i=0; i<length; i++) {
		element = elements[i];
	  
	  	if (typeof element.value == 'undefined' || element.value == '') {
			result.error_fields.push(element.name);
			result.passed = false;
		}
	}	

	return result; 	
}

function markEmptyFields(error_fields) {
	// Mark fields which doesn't pass check
	$j('input').removeClass('consistency-check-failed');
	
	var length = error_fields.length;
	var field = null;

	for (var i=0; i<length; i++) {
		field = error_fields[i];
		
		$j('input[name="' + field + '"]').addClass('consistency-check-failed');
	}	
}
