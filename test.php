<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<title>
			explorar texto
		</title>
		<script type="text/javascript">
			function explorar(element) {
				element = document.getElementById(element);
				if (element.firstChild) {
					var explorador = element.firstChild.nodeValue;
					if (explorador.length == 0)
						return 0;
					var fontSize = element.style.fontSize;
					if (explorador.split(" ").length > 1) {
						explorador = explorador.split(" ");
						var maxLength = 0, item = '';
						for (var i = 0; i < explorador.length; i++) {
							if (explorador[i].length > maxLength) {
								maxLength = explorador[i].length;
								item = explorador[i];
							}
						};
						explorador = item;
					}
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
					return total_pixel;
				}
				return 0;
			}
		</script>
	</head>
	<body >
		<div>
			<button onclick="alert(explorar('explorando'))">
				explorar
			</button>... 
			<span style="font-size: 30px; "id="explorando">Prueba testtest aaa</span>
		</div>
		resultado: </br/>
		<textarea id="resultado" cols="30" rows="10"></textarea>
	</body>
</html>