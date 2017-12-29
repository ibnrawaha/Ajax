<?php 
	$conn = mysqli_connect('localhost','root','','cms');

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Complete Ajax Training</title>
	
	<style type="text/css">
		th, td {
			min-width:200px;
			text-align: center;
			margin: 5px;
			border: 1px solid ;
		}
		
		td > input {
			width:95%;
			height:100%;
		}

		tr {
			background-color: lightgray;
			height: 10px;
			
		}

		.msg{
			min-height:50px;
		}
	</style>

 </head>
 <body>
 	<h1>Complete Ajax Training</h1>


	<h4>Add User</h4>
	<form id="addUser">
		<input type="text" id="name">
		<input type="text" id="email">
		<button>Add User</button>
	</form>
	
	<div id="container">Empty</div>

	<script type="text/javascript">




		/**
		 * Load Mysql Table
		 */
		window.onload = function() { getTable() }
		/**
		 * [getTable description]
		 * @return {[type]} [description]
		 */
		function getTable(){
		    
			var xhr = new XMLHttpRequest();

			xhr.open('GET','complete.php',true);

			xhr.onload = function(){
				document.getElementById('container').innerHTML = xhr.responseText;

			}

			xhr.send();

		}; // MYSLQ Table Loaded


		

		/**
		 * [addUser description]
		 * @param {[type]} e [description]
		 */
		document.getElementById('addUser').addEventListener('submit', addUser);
		function addUser(e){
			e.preventDefault();

			var xhr = new XMLHttpRequest();

			var name = document.getElementById('name').value;
			var email = document.getElementById('email').value;
			var params = "name="+name+"&email="+email ;

			xhr.open('POST','complete.php',true);

			// MUST Add When submitting a form
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if(xhr.status == 200){

					document.getElementById('container').innerHTML = xhr.responseText;
				}
			}

			xhr.send(params);


		};


		/**
		 * [delUser description]
		 * @param  {[type]} value [description]
		 * @return {[type]}       [description]
		 */
		function delUser(value){

			var delParam = "delValue="+value;						
			
			var xhr = new XMLHttpRequest();

			xhr.open('POST','complete.php',true);

			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				document.getElementById('container').innerHTML = xhr.responseText;
				
			}

			xhr.send(delParam);
		}


		/**
		 * [editUser description]
		 * @param  {[type]} value [description]
		 * @return {[type]}       [description]
		 */
		function editUser(value){

			var params = "edit="+value;

			var xhr = new XMLHttpRequest();

			xhr.open('POST','complete.php',true);

			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){

				var edit = document.getElementById('container').innerHTML = xhr.responseText;

				// console.log(edit);

			}

			xhr.send(params);

		}

		function applyEdit(id){
			var xhr = new XMLHttpRequest();

			// return console.log(editName);
			
			var editName = document.getElementById('editName'+id).value;
			var editEmail = document.getElementById('editEmail'+id).value;
			var apply = document.getElementById('applyEdit').value;

			var params = "name="+editName+"&email="+editEmail+"&apply="+apply+"&id="+id;

			xhr.open('POST','complete.php',true);

			// MUST Add When submitting a form
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if(xhr.status == 200){

					document.getElementById('container').innerHTML = xhr.responseText;
				}
			}

			xhr.send(params);
		}

/*
		// document.getElementsByName('editUserForm').addEventListener('submit', applyEdit(this.value));
		function applyEdit(value){
			// e.preventDefault();
			console.log('here');
			var xhr = new XMLHttpRequest();

			var name = document.getElementById('editName').value;
			var email = document.getElementById('editEmail').value;
			var params = "name="+editName+"&email="+editEmail ;

			xhr.open('POST','complete.php',true);

			// MUST Add When submitting a form
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if(xhr.status == 200){

					// document.getElementById('container').innerHTML = xhr.responseText;
				}
			}

			xhr.send(params);


		};
*/

	</script>
 </body>
 </html>