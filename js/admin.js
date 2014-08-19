			function newUser(){
				$('#admin_modal .modal-title').html("Add User");
				$('#admin_modal .modal-body').load('admin/newUser');
				$('#admin_modal').modal('show');	
				
			}				
			function load_logs(){
				$('#ulog').load('admin/recent_log', function(){
						$('#logs_table').DataTable();
						$('.datepicker').datepicker({'format':"yyyy-mm-dd"});	
				});		

			}		

			function load_users(){
				
				$('#users').load('admin/users_list', function(){
					$('#users_table').DataTable();
				});				
			}		

			function periodLogs(sdate, edate){
				if(sdate==="" || edate===""){
					$('#admin_alert').removeClass('hide');
					$('#alert_body').html('Start and End dates should not be empty!');
					setInterval(function(){$('#admin_alert').addClass('hide');}, 5000);							
				}
				else{
					$('#ulog').load('admin/period_log',
						{'sdate':sdate, 'edate':edate}, function(){
						$('#admin_alert').removeClass('hide');
						$('#alert_body').html('Showing user activity logs from '+sdate+' to '+edate);									
						$('#logs_table').DataTable();
						$('.datepicker').datepicker({'format':"yyyy-mm-dd"});	
					});					
				}

			}
			function validateNewUser(uname, pword1, pword2){
				if(uname.length<8 || pword1.length<8){
					$('#modal_alert').removeClass('hide');
					$('#modalalert_body').html('Username and Password should be at least 8 characters long!');
					setInterval(function(){$('#modal_alert').addClass('hide');}, 5000);
					return false;
				}
				else if(pword1!=pword2){
					$('#modal_alert').removeClass('hide');
					$('#modalalert_body').html('Passwords do not match!');
					setInterval(function(){$('#modal_alert').addClass('hide');}, 5000);					
					return false;
				}
				else{
					return true;
				}
			}
			
			function updateUser(uid, uname, access){
				$('#admin_modal .modal-title').html("Edit User");
				$('#admin_modal .modal-body').load('admin/editUser', 
					{'uid':uid, 'uname':uname, 'access':access});
				$('#admin_modal').modal('show');	
				
			}
			function saveUserChanges(uid, uname, access){
				$('#users').load('admin/changeUser', {'uid':uid, 'uname':uname, 'access':access}, function(){
					$('#users_table').DataTable();
					$('#admin_alert').removeClass('hide');
					$('#alert_body').html('Successfully edited user access!');
					setInterval(function(){$('#admin_alert').addClass('hide');}, 5000);
				});
				$('#admin_modal').modal('hide');			
				
			}
			function deleteUser(uid, uname){
				if(confirm("Delete this user: " + uname + "?")==false){
					return false;
				}
				else{
					$('#users').load('admin/deleteUser', {'uid':uid, 'uname':uname}, function(){
					$('#users_table').DataTable();
					$('#admin_alert').removeClass('hide');
					$('#alert_body').html('Successfully deleted user - '+uname+'!');				
					setInterval(function(){$('#admin_alert').addClass('hide');}, 5000);							
					});
				}
			}
			function addUser(uname, pword1, pword2, access){
				if (validateNewUser(uname, pword1, pword2)){
					$('#admin_modal').modal('hide');		
					$('#users').load('admin/addUser', 
						{'uname':uname, 'pword':pword1, 'access':access}, function(){
							$('#users_table').DataTable();
							$('#admin_alert').removeClass('hide');
							$('#alert_body').html('Successfully added new user - '+uname+'!');				
							setInterval(function(){$('#admin_alert').addClass('hide');}, 5000);						
						});	
				}
			}


			function checkAccess(admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0){
						admin_fxn();
					}
					else{
						alert('Please log in again with the proper privileges.');
						window.location.replace('log_in/log_out');
					}
				});
				
			}
			function checkAccess2(var1, var2, admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0){
						admin_fxn(var1, var2);
					}
					else{
						alert('Please log in again with the proper privileges.');
						window.location.replace('log_in/log_out');
					}
				});			
			}
			
			function checkAccess3(var1, var2, var3, admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0){
						admin_fxn(var1, var2, var3);
					}
					else{
						alert('Please log in again with the proper privileges.');
						window.location.replace('log_in/log_out');
					}
				});					
			}

			function checkAccess4(var1, var2, var3, var4, admin_fxn){
				$.ajax({
					url:'welcome/checkAccess',
					dataType:'text'
				}).done(function(data){
					if(data == 0){
						admin_fxn(var1, var2, var3, var4);
					}
					else{
						alert('Please log in again with the proper privileges.');
						window.location.replace('log_in/log_out');
					}
				});					
			}	