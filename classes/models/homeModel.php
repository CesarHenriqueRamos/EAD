<?php
	namespace models;

	class homeModel{
		public static function hasCursoById($idAluno){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.curso_controle` WHERE aluno_id=?");
			$sql->execute(array($idAluno));
			if($sql->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
		}
		public static function meusCursos($idAluno){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.curso_controle` WHERE aluno_id=?");
			$sql->execute(array($idAluno));
			return $dado = $sql->fetchAll();
		}

		public static function cursos(){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.cursos`");
			$sql->execute();
			return $dados = $sql->fetchAll();
		}
		public static function dadosCurso($id){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.cursos` WHERE id=?");
			$sql->execute(array($id));
			return $dados = $sql->fetch();
		}
		public static function modulosCurso($id){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.modulos` WHERE id_curso=?");
			$sql->execute(array($id));
			return $dados = $sql->fetchAll();
		}
		public static function aulasCurso($id,$modulo){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.aulas` WHERE id_curso=? AND modulo_id = ?");
			$sql->execute(array($id,$modulo));
			return $dados = $sql->fetchAll();
		}
		public static function video($id){
			$sql = \MySql::connect()->prepare("SELECT * FROM `tb_admin.aulas` WHERE id=?");
			$sql->execute(array($id));
			return $dados = $sql->fetch();
		}
	}
?>