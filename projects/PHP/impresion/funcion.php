<?
function randomNumber($digitos)
{
  $devuelvenum = mt_rand(1, 9);
  while (strlen($devuelvenum) < $digitos) {
    $devuelvenum .= mt_rand(0, 9);
  }

  
  return $devuelvenum;
}

?>