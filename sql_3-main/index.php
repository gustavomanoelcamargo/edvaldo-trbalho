<?php

/*aqui vamos conectar 
com o banco 
de dados*/
$servername = "localhost";
//você deu nome ao banco de dados
$database = "func2c"; //func2c ou func2d
$username = "root";
$password = "";


$conexao = mysqli_connect(
    $servername, $username, 
    $password,$database
);

if (!$conexao){
    die("Falha na conexão".mysqli_connect_error());
}
//echo "conectado com sucesso";

$id = $_POST["id"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$botao = $_POST["botao"];

if(empty($botao)){

}else if($botao == "Cadastrar"){
    $sql = "INSERT INTO funcionarios 
    (id, nome, cpf) VALUES('','$nome', '$cpf')";
}

//aqui vou tratar erros nas operações C.E.R.A
if(!empty($sql)){
    if(mysqli_query($conexao, $sql)){
        echo "Operação realizada com sucesso";
    }else{
        echo "Houve um erro na operação: <br />";
        echo  mysqli_error($conexao);
    }
}

$selecionado = $-GET["id"];

if(!empty($selecionado)){
    $sql_selecionado = "SELECT 8 FROM fincionarios WHERE id &selecionado";

    $resultado  = mysqli_query($conexao, $sql_mostra_cad);

    while($linha = mysqli_fetch_assoc($resultado)){

    $id = $linha["id"];
    $nome = $linha["nome"];
    $cpf = $linha["cpf"];

}

}


//echo $id." ".$nome." ".$cpf." ".$botao;

?>
<html>
    <body>
    <form name = "func" method = "post" >
        <label>ID</label>
        <input type ="text" name = "id"  value="<?php echo $id; ?>"/><br />
        <label>Nome</label>
        <input type ="text" name = "nome" value="<?php echo $nome; ?>" /><br />
        <label>CPF</label>
        <input type ="text" name = "cpf" value="<?php echo $cpf; ?>"/><br />
        <input type ="submit" name = "botao" value = "Cadastrar" />
        <input type ="reset" name = "botao" value = "cancelar" />
    </form>
    <table>
        <tr>
            <td>-</td>
            <td>ID</td>
            <td>Nome</td>
            <td>CPF</td>
        
        </tr>
        <?php>
        $$sql_mostra_cad = "SELECT * FROM funcionarios ORDER BY id desc limit 0,10";
        $resultado  = mysqli_query($conexao, $sql_mostra_cad);

        while($linha = mysqli_fetch_assoc($resultado)){
            echo "
        <tr>
            
            <td><a href='?id=".$linha["id"]."'>Selecionar</a>
            </td
            ><td>".$linha["id"]."</td>
            <td>".$linha["nome"]."</td>
            <td>".$linha["cpf"]."</td>
        </tr>
            ";
        }
        ?>
    </table>
    <!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
