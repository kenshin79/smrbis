			function showMain(tab, table, main_page, model, clue){
				if(clue.length >= 2){
				$(tab).load('pricelist/showMain', {'main_page':main_page, 'model':model, 'clue':clue}, function(){
					$(table).DataTable();
					$("th, td").addClass('text-center');
					
				});					
				}

			}
	    	function showCostPrice(itemId, itemName){
	    		$("#items_results").load('pricelist/showCostPrice', {'itemId':itemId, 'itemName':itemName}, function(){
	    			$("#costs_table").DataTable();
	    			$("#prices_table").DataTable();
	    			$("th, td").addClass('text-center');
	    		});
	    	}				
			function newEntry_form(title, folder, view){
				modalOn(title, 'pricelist/newForm/'+folder+'/'+view);
			}

	    	function editSku(skuId, skuName, skuCount, skuDesc){
				$('#main_modal .modal-title').html("Edit SKU");
				$('#main_modal .modal-body').load('pricelist/editSku', 
					{'skuId':skuId, 'skuName':skuName, 'skuCount':skuCount, 'skuDesc':skuDesc}, function(){$("label").addClass('label label-default');});
				$('#main_modal').modal('show');		    		
	    	}
	    	function editCategory(categoryId, categoryName, categoryDesc){
				$('#main_modal .modal-title').html("Edit Category");
				$('#main_modal .modal-body').load('pricelist/editCategory', 
					{'categoryId':categoryId, 'categoryName':categoryName, 'categoryDesc':categoryDesc}, function(){$("label").addClass('label label-default');});
				$('#main_modal').modal('show');			    		
	    	}
	    	function editSupplier(supplierId, supplierName, supplierAddress, supplierTelephone, supplierMobile, supplierEmail){
				$('#main_modal .modal-title').html("Edit Supplier");
				$('#main_modal .modal-body').load('pricelist/editSupplier', 
					{'supplierId':supplierId, 'supplierName':supplierName, 'supplierAddress':supplierAddress, 'supplierTelephone':supplierTelephone, 'supplierMobile':supplierMobile, 'supplierEmail':supplierEmail}, function(){$("label").addClass('label label-default');});
				$('#main_modal').modal('show');			    		
	    	}	 
	    	function editCustomer(customerId, customerName, customerAddress, customerTelephone, customerMobile, customerEmail){
				$('#main_modal .modal-title').html("Edit Customer");
				$('#main_modal .modal-body').load('pricelist/editCustomer', 
					{'customerId':customerId, 'customerName':customerName, 'customerAddress':customerAddress, 'customerTelephone':customerTelephone, 'customerMobile':customerMobile, 'customerEmail':customerEmail}, function(){$("label").addClass('label label-default');});
				$('#main_modal').modal('show');			    		
	    	}		    
	    	function editItem(itemId, itemName, itemCategory, itemDesc){
				$('#main_modal .modal-title').html("Edit Item");
				$('#main_modal .modal-body').load('pricelist/editItem', 
					{'itemId':itemId, 'itemName':itemName, 'itemCategory':itemCategory, 'itemDesc':itemDesc}, function(){$("label").addClass('label label-default');});
				$('#main_modal').modal('show');			    		
	    	}	    	
	    	function editCostNotes(costId, notes, itemId, itemName){
				$('#main_modal .modal-title').html("Edit Cost Notes");
				$('#main_modal .modal-body').load('pricelist/editCostNotes', 
					{'costId':costId, 'notes':notes, 'itemId':itemId, 'itemName':itemName}, function(){$("label").addClass('label label-default');});
				$('#main_modal').modal('show');		    		
	    	}	
	    	function editPrice(priceId, rprice, wprice, notes, itemId, itemName, skuName){
				$('#main_modal .modal-title').html("Edit Price per "+skuName+" (SKU)");
				$('#main_modal .modal-body').load('pricelist/editPrice', 
					{'priceId':priceId, 'rprice':rprice, 'wprice':wprice, 'notes':notes, 'itemId':itemId, 'itemName':itemName}, 
					function(){$("label").addClass('label label-default');});
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
	    					showMain('#sku_results', '#sku_table', 'sku/sku_main', 'Sku_model', skuName);
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
	    					showMain('#categories_results', '#categories_table', 'categories/categories_main', 'Categories_model', categoryName);
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
	    					showMain('#suppliers_results', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model', supplierName);
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
	    					showMain('#customers_results', '#customers_table', 'customers/customers_main', 'Customers_model', customerName);
	    					mainAlert("Successfully updated Customer - '"+customerName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating Customer -"+customerName+"!");
	    				}
	    			});
	    		}	
	    	}		    	

			function updateItem(itemId, itemName, itemCategory, itemDesc){
				if(itemName == ""){
					modalAlert("Item should not be empty!");
				}
	    		else{
	    			$.ajax({
	    				url: 'pricelist/updateItem',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'itemId':itemId, 'itemName':itemName, 'itemCategory':itemCategory, 'itemDesc':itemDesc}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showMain('#items_results', '#items_table', 'items/items_main', 'Items_model', itemName);
	    					mainAlert("Successfully updated Item - '"+itemName+"'!");
	    				}
	    				else{
	    					modalAlert("Failed updating Item -"+itemName+"!");
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
	    							showMain('#sku_results', '#sku_table', 'sku/sku_main', 'Sku_model', skuName);
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
	    							showMain('#categories_results', '#categories_table', 'categories/categories_main', 'Categories_model', categoryName);
	    							mainAlert("Successfully deleted Category - '"+categoryName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Category - '"+categoryName+"'!");
	    						}	    					
	    			});
	    		}
	    	}
	    	function deleteItem(itemId, itemName){
	    		if(confirm("Delete this Item '"+itemName+"'?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteItem',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'itemId': itemId}
	    					}).done(function(data){
	    						if(data){
	    							showMain('#items_results', '#items_table', 'items/items_main', 'Items_model', itemName);
	    							mainAlert("Successfully deleted Item - '"+itemName+"'!");
	    						}
	    						else{
	    							mainAlert("Error deleting Item - '"+itemName+"'!");
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
	    							showMain('#suppliers_results', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model', supplierName);
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
	    							showMain('#customers_results', '#customers_table', 'customers/customers_main', 'Customers_model', customerName);
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
	    						showMain('#sku_results', '#sku_table', 'sku/sku_main', 'Sku_model', skuName);
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
	    						showMain('#categories_results', '#categories_table', 'categories/categories_main', 'Categories_model', categoryName);
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
	    						showMain('#suppliers_results', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model', supplierName);
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
	    						showMain('#customers_results', '#customers_table', 'customers/customers_main', 'Customers_model', customerName);
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
	    	function addItem(itemName, itemCategory, itemDesc){
	    		
	    		if(itemName==""){
	    			modalAlert("Please enter Item Name!");	    			
	    		}
	    		else{
	    		$.ajax({
	    			url: 'pricelist/nameUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'name':itemName, 'model':"Items_model"}
	    		}).done(function(duplicate){
	    			if(duplicate==0){
	    				modalAlert("Item - '"+itemName+"' exists in database!");
	    			}	    		
	    			else{
	    				$.ajax({
	    					url:'pricelist/addItem',
	    					type:'post',
	    					dataType:'text',
	    					data:{'itemName':itemName, 'itemCategory':itemCategory, 'itemDesc':itemDesc}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');
	    						showMain('#items_results', '#items_table', 'items/items_main', 'Items_model', itemName);
	    						mainAlert("Success added Item - '"+itemName+"'!");    						
	    					}
	    					else{
	    						modalAlert("Failed to add Item - "+itemName+"!");    								
							}	
	    				});
	    			}
	    		});	    			
	    			
	    		}
	    	}
	    	
  
			function newItemCost_form(itemId, itemName, title, controller){
				$("#main_modal .modal-body").load( controller, {'itemId':itemId, 'itemName':itemName}, function(){
					$("#main_modal .modal-title").html("Add "+title+" for '"+itemName+"'");
					$(".datepicker").datepicker();
					$("label").addClass('label label-default');
					$("#main_modal").modal('show');		
				});			
								
			}	
  		    	
	    	function addItemCost(itemId, itemName, skuId, supplierId, cost, costDate, notes){
	    		if($.isNumeric(cost)){
	    		$.ajax({
	    			url:'pricelist/itemCostUnique',
	    			type:'post',
	    			dataType:'text',
	    			data: {'itemId':itemId, 'skuId':skuId, 'supplierId':supplierId, 'costDate':costDate}
	    		}).done(function(duplicate){
	    			if(duplicate == 1){
	    				modalAlert("Item cost is duplicate!");	    				
	    			}
	    			else{
	    				$.ajax({
	    					url: 'pricelist/addItemCost',
	    					type: 'post',
	    					dataType: 'text',
	    					data: {'itemId':itemId, 'skuId':skuId, 'supplierId':supplierId, 'cost':cost, 'costDate':costDate, 'notes':notes}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');	    						
	    						showCostPrice(itemId, itemName);
	    						mainAlert("Success added cost for '"+itemName+"'!");    		    						
	    					}
	    					else{
	    						modalAlert("Failed to add cost for '"+itemName+"'!");    				    						
	    					}
	    				});
				
	    			}
	    		});	    			
	    		}
	    		else{
	    				modalAlert("Cost is not valid!");	    		    			
	    		}


	    	}
	    	function addItemPrice(itemId, itemName, skuId, rprice, wprice, priceDate, notes){
	    		if($.isNumeric(rprice) && ($.isNumeric(wprice))){
	    		$.ajax({
	    			url:'pricelist/itemPriceUnique',
	    			type:'post',
	    			dataType:'text',
	    			data: {'itemId':itemId, 'skuId':skuId}
	    		}).done(function(duplicate){
	    			if(duplicate == 1){
	    				modalAlert("Item price per unit is duplicate!");	    				
	    			}
	    			else{
	    				$.ajax({
	    					url: 'pricelist/addItemPrice',
	    					type: 'post',
	    					dataType: 'text',
	    					data: {'itemId':itemId, 'skuId':skuId, 'rprice':rprice, 'wprice':wprice, 'priceDate':priceDate, 'notes':notes}
	    				}).done(function(data){
	    					if(data){
	    						$("#main_modal").modal('hide');	    						
	    						showCostPrice(itemId, itemName);
	    						mainAlert("Success added price for '"+itemName+"'!");    		    						
	    					}
	    					else{
	    						modalAlert("Failed to add price for '"+itemName+"'!");    				    						
	    					}
	    				});
				
	    			}
	    		});	    			
	    		}
	    		else{
	    				modalAlert("Cost is not valid!");	    		    			
	    		}

	    		
	    	}
	    	function deleteCost(costId, itemId, itemName){
	    		if(confirm("Delete this entry?") == false){
	    			return false;
	    		}
	    		else{
	    			$.ajax({url:'pricelist/deleteCost',
	    					type:'post',
	    					dataType: 'text',
	    					data: {'costId':costId}
	    					}).done(function(data){
	    						if(data){
	    							showCostPrice(itemId, itemName);
	    							mainAlert("Success deleted Item cost entry!");    	
	    						}
	    						else{
	    							mainAlert("Error deleting item cost entry!");
	    						}	    					
	    			});
	    		}	    		
	    	}	   	   
			function updateCostNotes(costId, notes, itemId, itemName){
	    			$.ajax({
	    				url: 'pricelist/updateCostNotes',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'costId':costId, 'notes':notes}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showCostPrice(itemId, itemName);
	    					mainAlert("Successfully updated item cost notes !");
	    				}
	    				else{
	    					modalAlert("Failed updating item cost notes!");
	    				}
	    			});
	   		}
	   		function updatePrice(itemId, itemName, priceId, rprice, wprice, notes, priceDate){
	    			$.ajax({
	    				url: 'pricelist/updatePrice',
	    				type: 'post',
	    				dataType: 'text',
	    				data:{'priceId':priceId, 'rprice':rprice, 'wprice':wprice, 'notes':notes, 'priceDate':priceDate}
	    			}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	    					showCostPrice(itemId, itemName);
	    					mainAlert("Successfully updated item price !");
	    				}
	    				else{
	    					modalAlert("Failed updating item price!");
	    				}
	    			});	   			
	   		}			    	 	
	    	function searchItem(search_term){
	    		if(search_term.length >= 3){
	    			$("#search_results").load('frontpage/searchTerm', {'search_term':search_term}, function(){
	    				$("#search_table").DataTable();
	    				
	    			});
	    		}
	    	}
	    	function showOrders(){
	    		$("#sales_target").load('sales/showAll', function(){
	    			$("#orders_table").DataTable(
	    				{'order':[0, 'desc']}
	    			);
	    			$("th, td").addClass('text-center');
	    		});
	    	}
	    	function newOrder_form(){
	    		$("#main_modal .modal-title").html("New Order Form");
	    		$("#main_modal .modal-body").load('sales/newOrder');
	    		$("#main_modal").modal('show');	    	    		
	    	}
			function addOrder(customerId, saleType){
				$.ajax({
					url: 'sales/addOrder',
					type: 'post',
					dataType:'text',
					data:{'customerId':customerId, 'saleType':saleType}
				}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	 						showOrders();
	    					mainAlert("Successfully created new sales order no. "+data+"!");
	    				}
	    				else{
	    					modalAlert("Failed to create new sales order!");
	    				}
	    			});	   					
			}
	    	function deleteOrder(salesorderId){
	    		if(confirm("Delete Sales Order no. "+salesorderId+"?")== true ){
				$.ajax({
					url: 'sales/deleteOrder',
					type: 'post',
					dataType:'text',
					data:{'salesorderId':salesorderId}
				}).done(function(data){
	    				if(data){
	    					$("#main_modal").modal('hide');
	 						showOrders();
	    					mainAlert("Successfully deleted Sales Order no. "+salesorderId+"!");
	    				}
	    				else{
	    					modalAlert("Failed to delete sales order!");
	    				}
	    			});	  	    			
	    		}
	    		
	    	}
	    	function showThisOrder(salesorderId){
	    		$("#sales_target").load('sales/getOrderItems', {'salesorderId':salesorderId}, function(){
	    			$("th, td").addClass('text-center');
	    		});
	    	}	
	    	function newOrderItem_form(salesorderId){
				$("#main_modal .modal-body").load( 'sales/newOrderItem', {'salesorderId':salesorderId}, function(){
					$("#main_modal .modal-title").html("Add Order Item");
					$("#main_modal").modal('show');		
				});		    				    		
	    	} 
	    	function priceDropDown(clue){
	    		if(clue.length>=3){
	    			$("#priceId").load('sales/priceDropDown', {'clue':clue}, function(){
	    				$("#unitPrice").html("");
	    			});
	    		}
	    	} 
	    	function wrDropDown(priceId){
	    		$("#unitPrice").load('sales/wrDropDown', {'priceId':priceId});
	    	}  
	    	function addOrderItem(salesorderId, priceId, unitPrice, quantity, repeat){
	    		if(priceId === "" || unitPrice ===""){
	    			modalAlert("No item and/or price chosen!");
	    		}
	    		else{
	    		$.ajax({
	    			url: 'sales/orderItemUnique',
	    			type:'post',
	    			dataType:'text',
	    			data:{'salesorderId':salesorderId, 'priceId':priceId}
	    		}).done(function (duplicate){
	    			if(duplicate != 0){
	    				modalAlert("Item already in Sales Order (duplicate)!");
	    			}
	    			else{
						if($.isNumeric(quantity) && quantity > 0){
	    					$.ajax({
	    						url: 'sales/addOrderItem',
	    						type:'post',
	    						dataType: 'text',
	    						data: {'salesorderId':salesorderId, 'priceId':priceId, 'unitPrice':unitPrice, 'quantity':quantity}
	    					}).done(function(data){
	    						if(data){
	    							if(repeat == 1){
	 									showThisOrder(salesorderId);   								
	    								newOrderItem_form(salesorderId);
	    								modalAlert("Successfully added an item in Sales Order no. "+salesorderId+"!");	 	    								
	    							}
	    							else{
	    		    					$("#main_modal").modal('hide');		
	 									showThisOrder(salesorderId);
	    								mainAlert("Successfully added an item in Sales Order no. "+salesorderId+"!");	    		    										
	    							}	    							
	    						}
	    						else{
	    							modalAlert("Failed to add item in Sales Order no."+salesorderId+"!");
	    						}
	    					});					
						}
						else{
							modalAlert("Item Quantity should be a number > 0!");
						}	    				
	    			}
	    		});	    			
	    		}



	    	}
	    	function removeOrderItem(salesorderId, priceId){
	    		if(confirm("Remove this item from Sales Order?") == true){
	    			$.ajax({
	    				url: 'sales/removeOrderItem',
	    				type: 'post',
	    				dataType: 'text',
	    				data: {'salesorderId':salesorderId, 'priceId':priceId}
	    			}).done(function(removed){
	    				if(removed){
	    					showThisOrder(salesorderId);
	    					mainAlert("Successfully removed item from Sales Order!");
	    				}
	    				else{
	    					mainAlert("Failed to remove item from Sales Order!");
	    				}
	    			});	    			
	    		}

	    	}	
			function finalizeOrder(salesorderId){
				if(confirm("Finalize this Sales Order?") == true){
					$.ajax({
						url: 'sales/finalizeOrder',
						type: 'post',
						dataType: 'text',
						data: {'salesorderId':salesorderId}
					}).done(function(finalized){
						if(finalized){
							showOrders();
							mainAlert("Successfully finalized Sales Order no. "+salesorderId+"!");
						}
						else{
							mainAlert("Failed to finalize Sales Order no. "+salesorderId+"!");
						}
					});
				}
			}	    	
			function printSalesOrder(salesorderId){
				window.open('sales/printSalesOrder/'+salesorderId );
			}
