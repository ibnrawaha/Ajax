<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Json 1</title>
</head>
<body>
	<h1>Ajax From Json 1</h1>
	
	<button id="btn">Get JSON</button>
	
	<div id="msg"></div>

	<script>
		document.getElementById('btn').addEventListener('click', myFunc);

		function myFunc(){
			
			var xhr = new XMLHttpRequest(); 

			xhr.open('GET','user.json', true);

			xhr.onload = function(){
				if (xhr.status == 200){
					var user = JSON.parse(xhr.responseText);
					var output = "";
					output += "<ul>"
					output += "<li>ID:"+user.id+"</li>";
					output += "<li>Name:"+user.name+"</li>";
					output += "<li>Email:"+user.email+"</li>";
					output += "</ul>"
					document.getElementById('msg').innerHTML = output;
				}
			}

			xhr.send();

		}

	</script>

</body>
</html>