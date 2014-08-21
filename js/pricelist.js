
	    	function showSku(){
	    		$("#sku").load('pricelist/showSku', function(){
	    			$("#sku_table").DataTable();
	    		});
	    	}
	    	function showBrands(){
	    		$("#brands").load('pricelist/showBrands', function(){
	    			$("#brands_table").DataTable();
	    		});
	    	}
	    	function newSku_form(){
	    		modalOn("Add SKU","pricelist/newSkuForm");
	    	}
	    	function newBrands_form(){
	    		modalOn("Add Brand", "pricelist/newBrandForm");
	    	}
	    	function editSku(skuId, skuName, skuCount, skuDesc){
				$('#main_modal .modal-title').html("Edit SKU");
				$('#main_modal .modal-body').load('pricelist/editSku', 
					{'skuId':skuId, 'skuName':skuName, 'skuCount':skuCount, 'skuDesc':skuDesc});
				$('#main_modal').modal('show');		    		
	    	}
	    	function updateSku(skuId, skuName, skuCount, skuDesc){
				if(!$.isNumeric(skuCount)){
	    			modalAlert("SKU Quantity must be a number!");
	    		}
	    		else{
	    			$.ajax({
	    				url: 'pricelist/updateSku',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'skuId':skuId, 'skuCount':skuCount, 'skuDesc':skuDesc}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showSku();
	    					mainAlert("Successfully updated SKU - '"+skuName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating SKU -"+skuName+"!");
	    				}
	    			});
	    		}	
	    	}
	    	function deleteSku(skuId, skuName){
	    		if(confirm("Delete this SKU '"+skuName+"'?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteSku',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'skuId': skuId}
	    					}).done(function(data){
	    						if(data){
	    							showSku();
	    							mainAlert("Successfully deleted SKU - '"+skuName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting SKU - '"+skuName+"'!");
	    						}	    					
	    			});
	    		}
	    	}
	    	function deleteBrand(brandId, brandName){
	    		if(confirm("Delete this Brand '"+brandName+"'?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteBrand',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'brandId': brandId}
	    					}).done(function(data){
	    						if(data){
	    							showBrands();
	    							mainAlert("Successfully deleted Brand - '"+decodeURI(brandName)+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Brand - '"+brandName+"'!");
	    						}	    					
	    			});
	    		}
	    	}	    	
	    	function addSku(skuName, skuCount, skuDesc){
	    		
	    		if(skuName=="" || skuCount==""){
	    			modalAlert("Please enter SKU and Quantity!");	    			
	    		}
	    		else if(!$.isNumeric(skuCount)){
	    			modalAlert("SKU Quantity must be a number!");
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
	    						$("#main_modal").modal('hide');
	    						$("#sku").load('pricelist/showSku', function(){
	    							$("#sku_table").DataTable();
	    						});
	    						mainAlert("Success added SKU - '"+skuName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add SKU - '"+skuName+"'!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}

	    	function addBrand(brandName, brandDesc){
	    		
	    		if(brandName==""){
	    			modalAlert("Please enter Brand Name!");	    			
	    		}
	    		else{
	    		$.ajax({
	    			url: 'pricelist/brandUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'brandName': brandName}
	    		}).done(function(duplicate){
	    			if(duplicate==0){
	    				modalAlert("Brand - '"+brandName+"' exists in database!");
	    			}	    		
	    			else{
	    				$.ajax({
	    					url:'pricelist/addBrand',
	    					type:'post',
	    					dataType:'text',
	    					data:{'brandName':brandName, 'brandDesc':brandDesc}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');
	    						$("#brands").load('pricelist/showBrands', function(){
	    							$("#brands_table").DataTable();
	    						});
	    						mainAlert("Success added Brand - '"+brandName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add Brand - "+brandName+"!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}