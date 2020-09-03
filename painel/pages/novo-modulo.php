<?php
	verificaPermissaoPagina(2);
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Modulo</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
                $curso = $_POST['curso'];
				if($nome == ''){
                    Painel::alert('erro','Necessário Completar Todos os Campos!');
                }else{
                        $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.modulos` VALUES(null,?,?)");
                        $sql->execute(array($curso,$nome));
                        Painel::alert('sucesso','Cadastrado Modulo Com Sucesso!');
                }	
            }
            $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.cursos`");
            $sql->execute();
            $cursos = $sql->fetchAll();
		?>

		<div class="form-group">
			<label>Nome Modulo:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
        <div class="form-group">
			<label>Curso:</label>
			<select name="curso" id="">
                <?php 
                foreach($cursos as $key => $value){
                ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['nome'] ?></option>
        <?php } ?>
            </select>
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->