<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Calculador de Hashes</title>
  <style>
    body {
      width: 40%;
      margin: auto;
    }

    div {
      background-color: #0F7DAC;
      color: white;
    }

    form {
      text-align: center;
    }
  </style>
</head>

<body>
  <div>

    Calculadora de Hashes. Un hash consiste en aplicar una función matemática a una entrada de datos, dando como resultado una cadena alfanumérica. Es teóricamente imposible de resolver a la inversa.
    <form method="post" action="hashear_palabra.php">
      <p>Introduce una palabra:</p>
      <input type="text" name="palabra" placeholder="Palabra">
      <input type="submit" value="HAZLO!">
    </form>
    <pre>
    <?php
    $data = $_POST['palabra'];

    foreach (hash_algos() as $v) {
      $r = hash($v, $data, false);
      printf("%-12s %3d %s\n", $v, strlen($r), $r);
    }

    ?>
    </pre>
  </div>
</body>

</html>