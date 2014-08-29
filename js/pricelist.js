			function showMain(tab, table, main_page, model){
				$(tab).load('pricelist/showMain', {'main_page':main_page, 'model':model}, function(){
					$(table).DataTable();
				});
			}
			function newEntry_form(title, folder, view){
				modalOn(title, 'pricelist/newForm/'+folder+'/'+view);
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
	    	function editCustomer(customerId, customerName, customerAddress, customerTelephone, customerMobile, customerEmail){
				$('#main_modal .modal-title').html("Edit Customer");
				$('#main_modal .modal-body').load('pricelist/editCustomer', 
					{'customerId':customerId, 'customerName':customerName, 'customerAddress':customerAddress, 'customerTelephone':customerTelephone, 'customerMobile':customerMobile, 'customerEmail':customerEmail});
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
	    					showMain('#sku', '#sku_table', 'sku/sku_main', 'Sku_model');
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
	    					showMain('#categories', '#categories_table', 'categories/categories_main', 'Categories_model');
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
	    					showMain('#suppliers', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model');
	    					mainAlert("Successfully updated Supplier - '"+supplierName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating Supplier -"+supplierName+"!");
	    				}
	    			});
	    		}	
	    	}	   
	    	 	    	    	
	    	function updateCustomer(customerId, customerName, customerAddress, customerTelephone, customerMobile, customerEmail){
				if(customerName == ""){
					modalAlert("Customer name should not be empty!");
				}
	    		else{
	    			$.ajax({
	    				url: 'pricelist/updateCustomer',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'customerId':customerId, 'customerName':customerName, 'customerAddress':customerAddress, 'customerTelephone':customerTelephone, 'customerMobile':customerMobile, 'customerEmail':customerEmail}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showMain('#customers', '#customers_table', 'customers/customers_main', 'Customers_model');
	    					mainAlert("Successfully updated Customer - '"+customerName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating Customer -"+customerName+"!");
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
	    							showMain('#sku', '#sku_table', 'sku/sku_main', 'Sku_model');
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
	    							showMain('#categories', '#categories_table', 'categories/categories_main', 'Categories_model');
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
	    							showMain('#suppliers', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model');
	    							mainAlert("Successfully deleted Supplier - '"+supplierName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Supplier - '"+supplierName+"'!");
	    						}	    					
	    			});
	    		}
	    	}	
	    	function deleteCustomer(customerId, customerName){
	    		if(confirm("Delete this Customer '"+customerName+"'?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteCustomer',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'customerId': customerId}
	    					}).done(function(data){
	    						if(data){
	    							showMain('#customers', '#customers_table', 'customers/customers_main', 'Customers_model');
	    							mainAlert("Successfully deleted Customer - '"+customerName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Customer - '"+customerName+"'!");
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
	    			url: 'pricelist/nameUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'name': skuName, 'model':"Sku_model"}
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
	    						showMain('#sku', '#sku_table', 'sku/sku_main', 'Sku_model');
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
	    			url: 'pricelist/nameUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'name': categoryName, 'model':"Categories_model"}
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
	    						showMain('#categories', '#categories_table', 'categories/categories_main', 'Categories_model');
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
	    			url: 'pricelist/nameUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'name':supplierName, 'model':"Suppliers_model"}
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
	    						showMain('#suppliers', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model');
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
	    	function addCustomer(customerName, customerAddress, customerTelephone, customerMobile, customerEmail){
	    		
	    		if(customerName==""){
	    			modalAlert("Please enter Customer's Name!");	    			
	    		}
	    		else{
	    		$.ajax({
	    			url: 'pricelist/nameUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'name':customerName, 'model':"Customers_model"}
	    		}).done(function(duplicate){
	    			if(duplicate==0){
	    				modalAlert("Customer - '"+customerName+"' exists in database!");
	    			}	    		
	    			else{
	    				$.ajax({
	    					url:'pricelist/addCustomer',
	    					type:'post',
	    					dataType:'text',
	    					data:{'customerName':customerName, 'customerAddress':customerAddress, 'customerTelephone':customerTelephone, 'customerMobile':customerMobile, 'customerEmail':customerEmail}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');
	    						showMain('#customers', '#customers_table', 'customers/customers_main', 'Customers_model');
	    						mainAlert("Success added Customer - '"+customerName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add Customer - "+customerName+"!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}	    	