			function newUser(){
				modalOn("Add User", "admin/newUser");
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
					mainAlert("Start and End dates should not be empty!");	
				}
				else{
					$('#ulog').load('admin/period_log',
						{'sdate':sdate, 'edate':edate}, function(){
						var message = 'Showing user activity logs from '+sdate+' to '+edate;	
						mainAlert(message);									
						$('#logs_table').DataTable();
						$('.datepicker').datepicker({'format':"yyyy-mm-dd"});	
					});					
				}

			}
			function validateNewUser(uname, pword1, pword2){
				if(uname.length<8 || pword1.length<8){
					modalAlert('Username and Password should be at least 8 characters long!');
					return false;
				}
				else if(pword1!=pword2){
					modalAlert('Passwords do not match!');		
					return false;
				}
				else{
					return true;
				}
			}
			
			function updateUser(uid, uname, access){
				$('#main_modal .modal-title').html("Edit User");
				$('#main_modal .modal-body').load('admin/editUser', 
					{'uid':uid, 'uname':uname, 'access':access});
				$('#main_modal').modal('show');	
			}
			
			function saveUserChanges(uid, uname, access){
				$('#users').load('admin/changeUser', {'uid':uid, 'uname':uname, 'access':access}, function(){
					$('#users_table').DataTable();
					mainAlert('Successfully edited user access!');
				});
				$('#main_modal').modal('hide');			
				
			}
			function deleteUser(uid, uname){
				if(confirm("Delete this user: " + uname + "?")==false){
					return false;
				}
				else{
					$('#users').load('admin/deleteUser', {'uid':uid, 'uname':uname}, function(){
					$('#users_table').DataTable();
					mainAlert('Successfully deleted user - '+uname+'!');			
					});
				}
			}
			function addUser(uname, pword1, pword2, access){
				if (validateNewUser(uname, pword1, pword2)){
					$('#main_modal').modal('hide');		
					$('#users').load('admin/addUser', 
						{'uname':uname, 'pword':pword1, 'access':access}, function(){
							$('#users_table').DataTable();
							mainAlert('Successfully added new user - '+uname+'!');			
						});	
				}
			}

