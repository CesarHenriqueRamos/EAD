<?php
$id = $_GET['curso'];
$video = @$_GET['id'];
$curso = \models\homeModel::dadosCurso($id);
$modulos = \models\homeModel::modulosCurso($id);
$videoAula = \models\homeModel::video($video);
?>
<div class="box1">
    <div class="container">
        <h2>Curso de <?php echo $curso['nome']?></h2>
    </div>    
</div>
<div class="menu">
<?php
foreach($modulos as $key =>$value){
    $aulas = \models\homeModel::aulasCurso($id,$value['id']);
 ?> 
 <div class="modulo-aula">
 <div id="modulo">
    <h2><?php echo $value['nome'] ?></h2>
 </div>
 <?php foreach($aulas as $key => $value){?>
 <a href="?curso=<?php echo $id?>&id=<?php echo $value['id']?>"><?php
    if($video == $value['id']){
        echo ">>";
    }
    echo $value['nome']?></a>
 <?php }?>
 </div>  
<?php } ?>
</div>
<div class="aula">
    <div class="container">
        <div class="video-aula">
            <iframe src="<?php echo $videoAula['link_aula'] ;?>" frameborder="0"></iframe>
        </div>
    </div>
   
</div>
<div class="clear"></div>