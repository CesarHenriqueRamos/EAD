<?php
	namespace controller;
	use \views\mainView;

	class homeController{
		public function index(){
			if(isset($_GET['deslogar'])){
				unset($_SESSION['login_aluno']);
				unset($_SESSION['nome_aluno']);
				unset($_SESSION['id_aluno']);
				mainView::render('home.php');
				\Painel::redirect(INCLUDE_PATH);
			}
			if(isset($_GET['addCurso'])){
				$id = $_GET['addCurso'];
				$sql = \MySql::connect()->prepare("INSERT INTO `tb_admin.curso_controle` VALUES(null,?,?)");
				$sql->execute(array($_SESSION['id_aluno'],$id));
			}
			if(isset($_GET['cursos'])){
				mainView::render('cursos.php');
			}
			if(isset($_GET['curso'])){
				mainView::render('curso.php');
			}
			if(isset($_POST['acao'])){
				$login = $_POST['login'];
				$senha = $_POST['senha'];
				$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.alunos` WHERE email=? AND senha=?");
				$sql->execute(array($login,$senha));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					$_SESSION['login_aluno'] = $login;
					$_SESSION['nome_aluno'] = $info['nome'];
					$_SESSION['id_aluno'] = $info['id'];
				}else{
					\Painel::alertJS('Login ou Senha Incorretos');
					\Painel::redirect(INCLUDE_PATH);
				}
			}
			if(@$_SESSION['login_aluno']){
				mainView::render('area_aluno.php');
			}
			if(isset($_GET['login'])){
				mainView::render('home.php');
				\Painel::redirect(INCLUDE_PATH);
				
			}
			if(!isset($_SESSION['login_aluno'])){
				mainView::render('cursos.php');
			}else{
				mainView::render('area_aluno.php');
			}	
			
		}
		public function aulaCurso(){
			if(!isset($_SESSION['login_aluno'])){
				mainView::render('home.php');
				\Painel::redirect(INCLUDE_PATH);
			}else{
				if(isset($_GET['curso'])){
				mainView::render('aulas.php');
				}
			}
			
		}
	}
?>