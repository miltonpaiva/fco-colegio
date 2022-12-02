<?php
	$project_dir = str_replace(basename(__FILE__), '', $_SERVER['SCRIPT_NAME']);
	$project_url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['SERVER_NAME']}{$project_dir}";
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Assinando com canvas</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

	<script type="text/javascript">
		window.project_url = '<?= $project_url; ?>'
		window.cpf = '<?= $_REQUEST['cpf'] ?? 0; ?>'
	</script>

    <canvas id="quadro" style="border: solid;" ></canvas>
    <br>
    <button onclick="actionPrint(this)">salvar</button>
    <button onclick="window.location.reload()">limpar</button>

</body>

<script type="text/javascript" src="./html2canvas/html2canvas.js"></script>

<!-- SCRIPT PARA DESENHAR A ASSINATURA -->
<script>

    window.onload = function () {

		var largura = (window.innerWidth -100);
		var altura = 300;

		var quadro = document.getElementById("quadro");
		quadro.setAttribute("width", largura);
		quadro.setAttribute("height", altura);

		var ctx = quadro.getContext("2d");

		var desenhando = false;

		quadro.onmousedown = function (evt) {
		    ctx.moveTo(evt.clientX, evt.clientY);
		    desenhando = true;
		}

		quadro.onmouseup = function () {
		    desenhando = false;
		}

		quadro.onmousemove = function (evt) {
		    if (desenhando) {
		        ctx.lineTo(evt.clientX, evt.clientY);
		        ctx.stroke();
		    }
		}
    }

    // FUNÇÃO PARA PEGAR O DESENHO DA ASSINATURA, TRANSFORMAR EM IMAGEM E ENVIAR PARA O SERVIDOR
    function actionPrint(btn, quadroid = 'quadro') {
		let quadro = document.getElementById(quadroid)
    	quadro.style.border = 'none'

	    html2canvas(document.getElementById(quadroid)).then(function(canvas) {
	    	let base64Canvas = canvas.toDataURL("image/jpeg");
	    	sendImage(base64Canvas);
	    });

	    quadro.style.border = 'solid';
    }

	function sendImage(data64) {

		let data = { imageBase64: data64, file_name: window.cpf };
		fetch(window.project_url + "SaveImage.php", {
		  method: "POST",
		  headers: {},
		  body: JSON.stringify(data),
		})
		.then((response) => response.json())
		.then((data) => {
			if (!data.success) {
				alert("não foi possivel gerar a imagem da assinatura \n" + data.message);
				return false;
			}

			alert('assinatura registrada com sucesso!');
		})
		.catch((error) => {
			alert('erro ao gerar imagem, verifique o log do navegador')
			console.error("Error:", error);
			return false;
		});
	}

</script>

</html>
