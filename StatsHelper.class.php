<?php

  require_once "SqlManager.class.php";

  class StatsHelper
  {
    public static function obterSegmentosDeIdadeDeVoluntarios( )
    {
      $dbconn = new SqlManager();
      $sql = "
        SELECT 
          SUM(CASE WHEN idades.idade < 18 THEN 1 ELSE 0 END) AS i18,
          SUM(CASE WHEN idades.idade BETWEEN 18 AND 24 THEN 1 ELSE 0 END) AS i1824,
          SUM(CASE WHEN idades.idade BETWEEN 25 AND 34 THEN 1 ELSE 0 END) AS i2534,
          SUM(CASE WHEN idades.idade BETWEEN 35 AND 44 THEN 1 ELSE 0 END) AS i3544,
          SUM(CASE WHEN idades.idade BETWEEN 45 AND 54 THEN 1 ELSE 0 END) AS i4554,
          SUM(CASE WHEN idades.idade BETWEEN 55 AND 64 THEN 1 ELSE 0 END) AS i5564,
          SUM(CASE WHEN idades.idade > 64 THEN 1 ELSE 0 END) AS i65
        FROM (
          SELECT DATE_PART('year', AGE(data_nasc)) as idade FROM voluntario
        ) as idades;
      ";
      $query = $dbconn->executeRead($sql);

      $rows = $query->fetch();
      $idades = array();
      array_push($idades, array('Menores de 18 anos', $rows['i18']));
      array_push($idades, array('De 18 a 24 anos', $rows['i1824']));
      array_push($idades, array('De 25 a 34 anos', $rows['i2534']));
      array_push($idades, array('De 35 a 44 anos', $rows['i3544']));
      array_push($idades, array('De 45 a 54 anos', $rows['i4554']));
      array_push($idades, array('De 55 a 64 anos', $rows['i5564']));
      array_push($idades, array('65 anos ou mais', $rows['i65']));

      return $idades;
    }

    public static function obterSegmentosDeEscolaridadeDeVoluntarios( )
    {
      $dbconn = new SqlManager();
      $sql = "SELECT formacao, count(*) FROM voluntario GROUP BY formacao;";
      $query = $dbconn->executeRead($sql);

      $dados = array();
      foreach($query as $row) {
        array_push($dados, array($row['formacao'], $row['count']));
      }

      return $dados;
    }

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

    public static function obterLinguasENiveis( )
    {
      $dbconn = new SqlManager();
      $sql = "SELECT nome, nivel, count(*) FROM fala INNER JOIN lingua ON codigo = cod_ling GROUP BY nome, nivel;";
      $query = $dbconn->executeRead($sql);

      $dados = array();
      foreach($query as $row) {
        array_push($dados, array($row['nome'], $row['nivel'], $row['count']));
      }

      return $dados; 
    }
  }

?>