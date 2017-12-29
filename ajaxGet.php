<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Get</title>
</head>
<body>
	<h1>Ajax Get From MySql</h1>
	
	<button id="btn">Get Data</button>
	
	<div id="msg"></div>

	<script>
		document.getElementById('btn').addEventListener('click', myFunc);

		function myFunc(){
			
			var xhr = new XMLHttpRequest(); 

			xhr.open('GET','get.php', true);

			xhr.onload = function(){
				if (xhr.status == 200){
					var user = JSON.parse(xhr.responseText);
					var output = "";
					for (var i in user) {
						output += "<ul>"
						output += "<li>ID:"+user[i].id+"</li>";
						output += "<li>Name:"+user[i].name+"</li>";
						output += "<li>Email:"+user[i].email+"</li>";
						output += "</ul>"
					}
					document.getElementById('msg').innerHTML = output;
				}
			}

			xhr.send();

		}

	</script>

</body>
</html>