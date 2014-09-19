	    	function modalAlert(message){
				$('#modal_alert').removeClass('hide');
				$('#modalalert_body').html(message);				
				setInterval(function(){$('#modal_alert').addClass('hide');}, 5000);			    		
	    	}
	    	function modalOn(title, controller){
	    		$("#main_modal .modal-title").html(title);
	    		$("#main_modal .modal-body").load(controller, function(){$("label").addClass('label label-default');});
	    		$("#main_modal").modal('show');	    		
	    	}
	    	function mainAlert(message){
				$('#mainalert_body').html(message);				
	    		$("#main_alert").removeClass('hide');				
				setInterval(function(){$('#main_alert').addClass('hide');}, 5000);				    		
	    	}
	    	
			function checkAccess(var_array, admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0 || data == 1){
						admin_fxn.apply(this, var_array);
					}
					else{
						alert('Please log in again with the proper privileges.');
						window.location.replace('log_in/log_out');	    	
					}
				});										
			}