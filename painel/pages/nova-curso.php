<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Curso</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$decricao = $_POST['descricao'];
				$imagem = $_FILES['imagem'];
				$link = $_POST['link'];
				if($nome == '' || $decricao == '' || $link == ''){
                    Painel::alert('erro','Necessário Completar Todos os Campos!');
                }else{
					if(Painel::imagemValida($imagem) == false){
						Painel::alert('erro','O formato especificado não está correto!');
					}else{
                        $imagem = Painel::uploadFile($imagem);
                        $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.cursos` VALUES(null,?,?,?,?)");
                        $sql->execute(array($nome,$decricao,$imagem,$link));
                        Painel::alert('sucesso','Cadastrado Curso Com Sucesso!');
                    }
                }	
            }
		?>

		<div class="form-group">
			<label>Nome Curso:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
		<div class="form-group">
			<label>Descrição Curso:</label>
			<textarea name="descricao" id="" cols="30" rows="10"></textarea>
		</div><!--form-group-->
		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->
		<div class="form-group">
			<label>Link do Video Promocional:</label>
			<input type="text" name="link">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->