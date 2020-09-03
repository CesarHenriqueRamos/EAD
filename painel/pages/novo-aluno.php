<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
                $senha = $_POST['password'];
                $email = $_POST['email'];
				$imagem = $_FILES['imagem'];

				if($nome == '' || $senha == '' || $email == ""){
                    Painel::alert('erro','Necessário Completar Todos os Campos!');
                }else if($imagem['name'] == ''){
					Painel::alert('erro','A Imagem Precisa Estar Selecionada!');
				}else{
                    if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro','O formato especificado não está correto!');
					}else{
                        $imagem = Painel::uploadFile($imagem);
                        $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.alunos` VALUES(null,?,?,?,?)");
                        $sql->execute(array($nome,$email,$senha,$imagem));
                        Painel::alert('sucesso','Cadastrado Aluno Com Sucesso!');
                    }
                }
				
				
			}
		?>

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password">
		</div><!--form-group-->
        
		<div class="form-group">
			<label>Email:</label>
			<input type="email" name="email">
		</div><!--form-group-->
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->