<?php

  require_once "SqlManager.class.php";

  class StatsHelper
  {
    public static function obterAtividadesPorFilial( )
    {
      $dbconn = new SqlManager();
      $sql = "SELECT f.estado, count(*) as num_atividades FROM filial f INNER JOIN atividade a ON a.cod_filial = f.codigo GROUP BY f.estado ORDER BY f.estado ASC;";
      $query = $dbconn->executeRead($sql);

      $dados = array();
      foreach($query as $row) {
        array_push($dados, array($row['estado'], $row['num_atividades']));
      }

      return $dados;
    }

    public static function obterFuncionariosPorFilial( )
    {
      $dbconn = new SqlManager();
      $sql = "SELECT f.estado, count(*) as num_funcionarios FROM filial f INNER JOIN funcionario fu ON fu.cod_filial = f.codigo GROUP BY f.estado ORDER BY f.estado ASC;";
      $query = $dbconn->executeRead($sql);

      $dados = array();
      foreach($query as $row) {
        array_push($dados, array($row['estado'], $row['num_funcionarios']));
      }

      return $dados; 
    }
  }

?>