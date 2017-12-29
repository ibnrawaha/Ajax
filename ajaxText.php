<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Text</title>
</head>
<body>
	<h1>Ajax From Text</h1>
	
	<button id="btn">Get Text</button>
	
	<div id="msg"></div>

	<script>
		document.getElementById('btn').addEventListener('click', myFunc);

		function myFunc(){
			
			var xhr = new XMLHttpRequest(); 

			xhr.open('GET','text.txt', true);

			xhr.onload = function(){
				if (xhr.status == 200){
					document.getElementById('msg').innerHTML = xhr.responseText;
				}
			}

			xhr.send();

		}

	</script>

</body>
</html>