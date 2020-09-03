<?php
$id = $_GET['curso'];
$dados = \models\homeModel::dadosCurso($id);
$modulos =  \models\homeModel::modulosCurso($id);
?>
<div class="apresentacao">
    <div class="container">
        <?php if(@$_SESSION['nome_aluno']){?>
        <h2>Ola <?php echo $_SESSION['nome_aluno']; ?> Conheça nosso Curso de <?php echo $dados['nome']?></h2>
        <?php }else{ ?>
            <h2>Ola Visitante Gostaria de Conheça o Nosso Curso de <?php echo $dados['nome']?></h2>
        <?php } ?>
        <div class="video"><iframe src="<?php echo $dados['video_promo']?>" frameborder="0"  allowfullscreen></iframe></iframe></div>
        <div class="w50">
            <h2>Descrição do Curso:</h2>
            <p><?php echo $dados['descricao']; ?></p>
        </div>
        <div class="w50">
            <a href="<?php INCLUDE_PATH ?>?addCurso=<?php echo $id?>"><div class="botao">
            Comprar Curso
        </div></a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="modulos">
        <div class="container">
            <h2>Modulos do Curso:</h2>
            <?php 
                foreach($modulos as $key => $value){
            ?>
            <div class="modulo w25">
                <div class="pacote">
                    <img src="images/product.svg" alt="">
                </div>
                <h3><?php echo $value['nome'] ?></h3>
            </div>
            
            <?php }?>
            <div class="clear"></div>
        </div>
</div>