<?php 

	require_once 'classes/usuarios.php';
	$u = new Usuario;

?>

<html lang="pt-br">

<head>

<meta charset="utf-8"/>
<title>Login</title>
<link rel="stylesheet" href="css/estilo.css">

</head>

<body>
<div id="corpo-form-Cad">
<h1>Cadastrar</h1>
<form method="POST">

<input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
<input type="text" name="telefone" placeholder="Telefone" maxlength="30"> 
<input type="email" name="email" placeholder="E-mail" maxlength="40">
<input type="password" name="senha" placeholder="Senha" maxlength="15">
<input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
<input type="submit" value="Acessar">

</form>
</div>

<?php 

//verificar se clicou no botao

if(isset($_POST['nome'])){
	
	$nome = addslashes($_POST['nome']);
	$telefone = addslashes($_POST['telefone']);
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);
	//verificar se esta preenchido
	if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
		
		$u->conectar("projeto_login", "localhost", "root", "121212");
		if($u->msgErro == ""){
			
			if($senha == $confirmarSenha){
				
				if($u->cadastrar($nome,$telefone,$email,$senha)){
					
					echo "Cadastrado com Sucesso!";
					
				}else{
					
					echo "Email Já Cadastrado!";
					
				}
				
			}else{
				
				echo "Senha e Confirmar Senha não Correspondem!";
				
			}
						
			
		}else{
			
			echo "Erro: ".$u->msgErro;
			
			
		}
		
	}else {
		
		echo "Preencha Todos os Campos!!";		
		
	}
	
}



?>

</body>



</html>