	    	function modalAlert(message){
				$('#modal_alert').removeClass('hide');
				$('#modalalert_body').html(message);				
				setInterval(function(){$('#modal_alert').addClass('hide');}, 5000);			    		
	    	}
	    	function modalOn(title, controller){
	    		$("#pricelist_modal .modal-title").html(title);
	    		$("#pricelist_modal .modal-body").load(controller);
	    		$("#pricelist_modal").modal('show');	    		
	    	}
	    	function mainAlert(message){
	    		$("#pricelist_alert").removeClass('hide');
				$('#alert_body').html(message);				
				setInterval(function(){$('#pricelist_alert').addClass('hide');}, 5000);				    		
	    	}
	    	function showSku(){
	    		$("#sku").load('pricelist/showSku', function(){
	    			$("#sku_table").DataTable();
	    		});
	    	}
	    	function newSku_form(){
	    		modalOn("Add SKU","pricelist/newSkuForm");
	    	}
	    	function editSku(skuId, skuName, skuCount, skuDesc){
	    		
	    	}
	    	function addSku(skuName, skuCount, skuDesc){
	    		
	    		if(skuName=="" || skuCount==""){
	    			modalAlert("Please enter SKU and Quantity!");	    			
	    		}
	    		else{
	    		$.ajax({
	    			url: 'pricelist/skuUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'skuName': skuName}
	    		}).done(function(duplicate){
	    			if(duplicate==0){
	    				modalAlert("Sku - '"+skuName+"' exists in database!");
	    			}	    		
	    			else{
	    				$.ajax({
	    					url:'pricelist/addSku',
	    					type:'post',
	    					dataType:'text',
	    					data:{'skuName':skuName, 'skuCount':skuCount, 'skuDesc':skuDesc}
	    				}).done(function(data){
	    					if(data){
	    						$("#pricelist_modal").modal('hide');
	    						$("#sku").load('pricelist/showSku', function(){
	    							$("#sku_table").DataTable();
	    						});
	    						mainAlert("Success added SKU - '"+skuName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add SKU - "+skuName+"!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}
	    	function forcedLogout(){
				alert('Please log in again with the proper privileges.');
				window.location.replace('log_in/log_out');	    		
	    	}
	    
			function checkAccess(admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0 || data == 1){
						admin_fxn();
					}
					else{
						forcedLogout();
					}
				});
				
			}
			function checkAccess3(var1, var2, var3, admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0 || data == 1){
						admin_fxn(var1, var2, var3);
					}
					else{
						forcedLogout();
					}
				});					
			}	
			function checkAccess4(var1, var2, var3, var4, admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0 || data == 1){
						admin_fxn(var1, var2, var3);
					}
					else{
						forcedLogout();
					}
				});					
			}						
						    	