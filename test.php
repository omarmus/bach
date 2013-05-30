<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>
			explorar texto
		</title>
		<script type="text/javascript">
			function explorar(element){
				var explorador = document.getElementById(element).firstChild.nodeValue;
				var fontSize = document.getElementById(element).style.fontSize;
				temporal = document.createElement("span");
				letras = new Array(explorador.length);
				for (var i = 0, total = letras.length; i < total; i ++) {
					letras[i] = document.createElement("span");
					letras[i].style.fontSize =  fontSize;
					letras[i].appendChild(document.createTextNode(explorador.charAt(i)));
					temporal.appendChild(letras[i]);
				}
				document.body.appendChild(temporal);
				var total_pixel = 0;
				document.getElementById("resultado").value="";
				for (var i = 0, total = temporal.childNodes.length; i < total; i ++) {
					document.getElementById("resultado").value += explorador.charAt(i) + " = " + temporal.childNodes[i].offsetWidth + " px\n";
					total_pixel += temporal.childNodes[i].offsetWidth;
				}
				document.body.removeChild(temporal);
				alert(total_pixel)
			}
		</script>
	</head>
	<body >
		<div>
			<button onclick="explorar('explorando')">
				explorar
			</button>... 
			<span style="font-size: 30px; "id="explorando"> este texto</span>
		</div>
		resultado: </br/>
		<textarea id="resultado" cols="30" rows="10"></textarea>
	</body>
</html>