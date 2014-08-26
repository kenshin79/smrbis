
	    	function showSku(){
	    		$("#sku").load('pricelist/showSku', function(){
	    			$("#sku_table").DataTable();
	    		});
	    	}
	    	function showCategories(){
	    		$("#categories").load('pricelist/showCategories', function(){
	    			$("#categories_table").DataTable();
	    		});
	    	}
	    	function showSuppliers(){
	    		$('#suppliers').load('pricelist/showSuppliers', function(){
	    			$("#suppliers_table").DataTable();
	    		});
	    	}
	    	function newSku_form(){
	    		modalOn("Add SKU","pricelist/newSkuForm");
	    	}
	    	function newCategory_form(){
	    		modalOn("Add Category", "pricelist/newCategoryForm");
	    	}
	    	function newSupplier_form(){
	    		modalOn("Add Supplier", "pricelist/newSupplierForm");
	    	}
	    	function editSku(skuId, skuName, skuCount, skuDesc){
				$('#main_modal .modal-title').html("Edit SKU");
				$('#main_modal .modal-body').load('pricelist/editSku', 
					{'skuId':skuId, 'skuName':skuName, 'skuCount':skuCount, 'skuDesc':skuDesc});
				$('#main_modal').modal('show');		    		
	    	}
	    	function editCategory(categoryId, categoryName, categoryDesc){
				$('#main_modal .modal-title').html("Edit Category");
				$('#main_modal .modal-body').load('pricelist/editCategory', 
					{'categoryId':categoryId, 'categoryName':categoryName, 'categoryDesc':categoryDesc});
				$('#main_modal').modal('show');			    		
	    	}
	    	function editSupplier(supplierId, supplierName, supplierAddress, supplierTelephone, supplierMobile, supplierEmail){
				$('#main_modal .modal-title').html("Edit Supplier");
				$('#main_modal .modal-body').load('pricelist/editSupplier', 
					{'supplierId':supplierId, 'supplierName':supplierName, 'supplierAddress':supplierAddress, 'supplierTelephone':supplierTelephone, 'supplierMobile':supplierMobile, 'supplierEmail':supplierEmail});
				$('#main_modal').modal('show');			    		
	    	}	    	
	    	function updateSku(skuId, skuName, skuCount, skuDesc){
				if(skuName=="" || skuCount==""){
					modalAlert("SKU and Quantity cannot be empty!");
				}
				else if(!$.isNumeric(skuCount)){
	    			modalAlert("SKU Quantity must be a number!");
	    		}
	    		else{
	    			$.ajax({
	    				url: 'pricelist/updateSku',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'skuId':skuId, 'skuName':skuName, 'skuCount':skuCount, 'skuDesc':skuDesc}
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
	    	function updateCategory(categoryId, categoryName, categoryDesc){
				if(categoryName == ""){
					modalAlert("Category should not be empty!");
				}
	    		else{
	    			$.ajax({
	    				url: 'pricelist/updateCategory',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'categoryId':categoryId, 'categoryName':categoryName, 'categoryDesc':categoryDesc}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showCategories();
	    					mainAlert("Successfully updated Category - '"+categoryName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating Category -"+categoryName+"!");
	    				}
	    			});
	    		}	
	    	}	
	    	function updateSupplier(supplierId, supplierName, supplierAddress, supplierTelephone, supplierMobile, supplierEmail){
				if(supplierName == ""){
					modalAlert("Supplier name should not be empty!");
				}
	    		else{
	    			$.ajax({
	    				url: 'pricelist/updateSupplier',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'supplierId':supplierId, 'supplierName':supplierName, 'supplierAddress':supplierAddress, 'supplierTelephone':supplierTelephone, 'supplierMobile':supplierMobile, 'supplierEmail':supplierEmail}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showSuppliers();
	    					mainAlert("Successfully updated Supplier - '"+supplierName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating Supplier -"+supplierName+"!");
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
	    	function deleteCategory(categoryId, categoryName){
	    		if(confirm("Delete this Category '"+categoryName+"'?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteCategory',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'categoryId': categoryId}
	    					}).done(function(data){
	    						if(data){
	    							showCategories();
	    							mainAlert("Successfully deleted Category - '"+categoryName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Category - '"+categoryName+"'!");
	    						}	    					
	    			});
	    		}
	    	}
	    	function deleteSupplier(supplierId, supplierName){
	    		if(confirm("Delete this Supplier '"+supplierName+"'?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteSupplier',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'supplierId': supplierId}
	    					}).done(function(data){
	    						if(data){
	    							showSuppliers();
	    							mainAlert("Successfully deleted Supplier - '"+supplierName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Supplier - '"+supplierName+"'!");
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

	    	function addCategory(categoryName, categoryDesc){
	    		
	    		if(categoryName==""){
	    			modalAlert("Please enter Category Name!");	    			
	    		}
	    		else{
	    		$.ajax({
	    			url: 'pricelist/categoryUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'categoryName': categoryName}
	    		}).done(function(duplicate){
	    			if(duplicate==0){
	    				modalAlert("Category - '"+categoryName+"' exists in database!");
	    			}	    		
	    			else{
	    				$.ajax({
	    					url:'pricelist/addCategory',
	    					type:'post',
	    					dataType:'text',
	    					data:{'categoryName':categoryName, 'categoryDesc':categoryDesc}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');
	    						$("#categories").load('pricelist/showCategories', function(){
	    							$("#categories_table").DataTable();
	    						});
	    						mainAlert("Success added Category - '"+categoryName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add Category - "+categoryName+"!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}
	    	
	    	function addSupplier(supplierName, supplierAddress, supplierTelephone, supplierMobile, supplierEmail){
	    		
	    		if(supplierName==""){
	    			modalAlert("Please enter Supplier's Name!");	    			
	    		}
	    		else{
	    		$.ajax({
	    			url: 'pricelist/supplierUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'supplierName':supplierName}
	    		}).done(function(duplicate){
	    			if(duplicate==0){
	    				modalAlert("Supplier - '"+supplierName+"' exists in database!");
	    			}	    		
	    			else{
	    				$.ajax({
	    					url:'pricelist/addSupplier',
	    					type:'post',
	    					dataType:'text',
	    					data:{'supplierName':supplierName, 'supplierAddress':supplierAddress, 'supplierTelephone':supplierTelephone, 'supplierMobile':supplierMobile, 'supplierEmail':supplierEmail}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');
	    						$("#suppliers").load('pricelist/showSuppliers', function(){
	    							$("#suppliers_table").DataTable();
	    						});
	    						mainAlert("Success added Supplier - '"+supplierName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add Supplier - "+supplierName+"!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}