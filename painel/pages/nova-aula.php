<?php
    verificaPermissaoPagina(2);
        $id_curso =  isset($_GET['curso']) ? $_GET['curso'] : 1;
    if(@$_GET['curso']){
        
        $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.modulos` WHERE id_curso = ?");
        $sql->execute(array($id_curso));
        $modulos = $sql->fetchAll();
        
    }else{
        $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.modulos` WHERE id_curso = ?");
        $sql->execute(array($id_curso));
        $modulos = $sql->fetchAll();
    }

?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Adicionar Aula</h2>
    <form action="" method="get">
        <?php 
        $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.cursos`");
        $sql->execute();
        $cursos = $sql->fetchAll();
        ?>
        <div class="form-group">
            <label>Curso:</label>
            <select name="curso" id="">
                <?php 
                foreach($cursos as $key => $value){
                ?>
                <option <?php if($id_curso == $value['id']) echo 'selected' ?> value="<?php echo $value['id'] ?>"><?php echo $value['nome'] ?></option>
        <?php } ?>
            </select>
        </div><!--form-group-->
        <div class="form-group">
            <input type="submit" value="Cadastrar!">
        </div><!--form-group-->

    </form>
	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
                $modulo = $_POST['modulo'];
                $link = $_POST['link'];
				if($nome == '' || $link == ""){
                    Painel::alert('erro','Necessário Completar Todos os Campos!');
                }else{
                        $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.aulas` VALUES(null,?,?,?,?)");
                        $sql->execute(array($modulo,$nome,$link,$id_curso));
                        Painel::alert('sucesso','Cadastrado Modulo Com Sucesso!');
                }	
            }


		?>

		<div class="form-group">
			<label>Nome Aula:</label>
			<input type="text" name="nome">
		</div><!--form-group-->
        <div class="form-group">
			<label>Modulo da Aula:</label>
			<select name="modulo" id="">
                <?php 
                foreach($modulos as $key => $value){
                ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['nome'] ?></option>
        <?php } ?>
            </select>
        </div><!--form-group-->
        <div class="form-group">
			<label>Link da Aula:</label>
			<input type="text" name="link">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->