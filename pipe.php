<?php 
  $url = !empty($_GET['url']) ? $_GET['url'] : "http://www.metacritic.com/game/playstation-3/journey";

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
  $pagina = curl_exec($ch);
  curl_close($ch);
  
  //$pagina = file($url);
  //$pagina = implode("", $pagina);
  $pagina = preg_replace('/\n/', '', $pagina);

  preg_match_all('/<span class="score_value" property="v:average">([0-9]+)<\/span>/', $pagina, $result);
  preg_match_all('/<a.+?property="v:itemreviewed">(.+?)<\/a>/', $pagina, $titulo);

  $titulo = $titulo[1][0];
  $result = $result[1][0];


  echo "${titulo} - ${result} de 100";

  // close cURL resource, and free up system resources

?>
