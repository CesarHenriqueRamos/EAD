<div class="box container">
    <h3>Seja Bem-Vindo <?php echo $_SESSION['nome_aluno']; ?></h3>
</div>
<div class="container">
<?php
        if(\models\homeModel::hasCursoById($_SESSION['id_aluno'])){
         $cursos =   \models\homeModel::meusCursos($_SESSION['id_aluno']);
         foreach($cursos as $key =>$value){
            $curso = \models\homeModel::dadosCurso($value['id_curso']);         
            ?>
            <div class="curso w33">
                <div class="img">
                    <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $curso['imagem']; ?>" alt="">
                </div>
                <h2><?php echo $curso['nome'];?></h2>
                <a href="campus?curso=<?php echo $curso['id']?>">Acessar</a>
            </div>
        <?php } ?>
    <div class="clear"></div>
    <?php }else{ ?>
            echo 'Não tem Curso';
       <?php } ?>
</div>