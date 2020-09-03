<div class="cursos">
    <div class="container">
    <h2>Nosso Cursos</h2>
    <hr>
        <?php 
        $dados = \models\homeModel::cursos();
        foreach($dados as $key => $value){?>
            <div class="curso w33">
                <div class="img">
                    <img src="<?php INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['imagem']; ?>" alt="">
                </div>
                <h2><?php echo $value['nome'];?></h2>
                <a href="<?php INCLUDE_PATH_PAINEL ?>editar-curso?editar=<?php echo $value['id']?>">Editar Curso</a>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>
</div>