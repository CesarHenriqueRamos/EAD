<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Curso</h2>

	<form method="post" enctype="multipart/form-data">

        <?php
        $id = (int)$_GET['editar'];
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				$decricao = $_POST['descricao'];
                $imagem = $_FILES['imagem'];
                $link = $_POST['link'];
				if($nome == '' || $decricao == ''){
                    Painel::alert('erro','Necessário Completar Todos os Campos!');
                }else{
                    if($imagem['name'] != ''){
                        if(Painel::imagemValida($imagem)){
                            Painel::deleteFile($imagem_atual);
                            $imagem = Painel::uploadFile($imagem);
                            $sql = MySql::connect()->prepare("UPDATE `tb_admin.cursos` SET nome=?,descricao=?,imagem=?,video_promo =? WHERE id=?");
                            $sql->execute(array($nome,$decricao,$imagem,$link,$id));
                            Painel::alert('sucesso','Curso Editado Com Sucesso!');
                        }else{
                            Painel::alert('erro','O formato especificado não está correto!');
                        }
                    }else{
                            $sql = MySql::connect()->prepare("UPDATE `tb_admin.cursos` SET nome=?,descricao=?, video_promo = ? WHERE id=?");
                            $sql->execute(array($nome,$decricao,$link,$id));
                            Painel::alert('sucesso','Curso Editado Com Sucesso!');
                    }
                }	
            }
            $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.cursos` WHERE id = ?");
            $sql->execute(array($id));
            $dados = $sql->fetch();
		?>

		<div class="form-group">
			<label>Nome Curso:</label>
			<input type="text" name="nome" value="<?php echo $dados['nome'];?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Nome Curso:</label>
			<textarea name="descricao" id="" cols="30" rows="10">
            <?php echo $dados['descricao'];?>
            </textarea>
		</div><!--form-group-->
		<div class="form-group">
			<label>Imagem</label>
            <input type="file" name="imagem"/>
            <input type="hidden" name="imagem_atual" value="<?php echo $dados['imagem']; ?>">
		</div><!--form-group-->
        <div class="form-group">
			<label>Link do Video Promocional:</label>
			<input type="text" name="link" value="<?php echo $dados['video_promo']; ?>">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Editar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->