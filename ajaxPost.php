<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax POST</title>
</head>
<body>
	<h1>Ajax Post To MySql</h1>
	
	<form id="postForm">
		<input type="text" id="name" placeholder="NAME">
		<input type="" id="email" placeholder="EMAIL">
		<button id="submit">Post Data</button>
	</form>
	
	<div id="msg"></div>

	<script>
		document.getElementById('postForm').addEventListener('submit', myFunc);

		function myFunc(e){
			e.preventDefault();

			var name = document.getElementById('name').value;
			var email = document.getElementById('email').value;
			var params = 'name='+name+'&email='+email ;
			
			var xhr = new XMLHttpRequest(); 

			xhr.open('POST','post.php' , true);

			// MUST Add When submitting a form
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

			xhr.onload = function(){
				if (xhr.status == 200){
					document.getElementById('msg').innerHTML = xhr.responseText;
				}
			}

			xhr.send(params);

		}

	</script>

</body>
</html>